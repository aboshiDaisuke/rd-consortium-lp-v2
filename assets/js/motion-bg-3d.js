/* ============================================================
   モーション背景 3D — 「光の渦銀河」(Three.js)
   白基調の紙面を活かしつつ、藤紫〜青〜マゼンタの光粒子が
   差動回転しながら中心へ吸い込まれていく。
   script.js から動的importされ、WebGL不可時は false を返して
   既存のCSS渦へフォールバックする。
   ============================================================ */
import * as THREE from "./three.module.min.js";

export function initMotionBg3D(root) {
  let renderer;
  try {
    renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: "high-performance" });
  } catch (e) {
    return false;
  }

  const isMobile = window.matchMedia("(max-width: 768px)").matches;
  renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, isMobile ? 1.5 : 2));
  renderer.setSize(window.innerWidth, window.innerHeight);
  renderer.setClearColor(0xffffff, 0);

  root.classList.add("motion-bg--3d");
  root.appendChild(renderer.domElement);

  const scene = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(58, window.innerWidth / window.innerHeight, 1, 400);
  const CAM_Z = 52;
  camera.position.set(0, 0, CAM_Z);

  // 渦全体を傾けて楕円の奥行きを出す（中心は画面上40%あたり）
  const galaxy = new THREE.Group();
  galaxy.rotation.x = -0.88;
  galaxy.position.y = 7;
  scene.add(galaxy);

  /* ---------- 共通: 柔らかい光点テクスチャ ---------- */
  const makeDotTexture = (inner = 1, softness = 0.5) => {
    const c = document.createElement("canvas");
    c.width = c.height = 64;
    const ctx = c.getContext("2d");
    const g = ctx.createRadialGradient(32, 32, 0, 32, 32, 32);
    g.addColorStop(0, `rgba(255,255,255,${inner})`);
    g.addColorStop(softness, "rgba(255,255,255,0.35)");
    g.addColorStop(1, "rgba(255,255,255,0)");
    ctx.fillStyle = g;
    ctx.fillRect(0, 0, 64, 64);
    const tex = new THREE.CanvasTexture(c);
    tex.needsUpdate = true;
    return tex;
  };
  const dotTex = makeDotTexture();

  /* ---------- カラーパレット（旧CSS渦と同じ淡い氷色基調） ---------- */
  const COL_OUTER = new THREE.Color("#dbe8f8"); // 淡い氷色
  const COL_MID = new THREE.Color("#bdd6f5");   // 氷色（旧渦のタイル色）
  const COL_INNER = new THREE.Color("#a3b4ea"); // 淡い藤紫
  const ACCENTS = [
    new THREE.Color("#b3a9ef"), // 淡い紫
    new THREE.Color("#e3b9dd"), // 淡いマゼンタ
    new THREE.Color("#b0dcea"), // 淡いシアン
  ];
  const R_MIN = 3.5;
  const R_MAX = 50;
  const FUNNEL_DEPTH = 10;
  const ARMS = 3;          // 螺旋アーム数
  const ARM_TWIST = 2.6;   // 半径→角度のねじれ量（対数螺旋）
  const ARM_SPREAD = 0.42; // アームの太さ（角度ゆらぎ）

  // 対数螺旋アームに沿った初期角度（一部は無所属で散らす）
  const spiralAngle = (r) => {
    if (Math.random() < 0.22) return Math.random() * Math.PI * 2;
    const arm = Math.floor(Math.random() * ARMS);
    const base = (arm / ARMS) * Math.PI * 2 + Math.log(1 + r * 0.35) * ARM_TWIST;
    const g = (Math.random() + Math.random() + Math.random() - 1.5) / 1.5; // 擬似ガウス
    return base + g * ARM_SPREAD;
  };

  const zoneColor = (t) => {
    const c = new THREE.Color();
    if (t > 0.6) c.lerpColors(COL_MID, COL_OUTER, (t - 0.6) / 0.4);
    else c.lerpColors(COL_INNER, COL_MID, t / 0.6);
    return c;
  };

  /* ---------- 主層: 渦銀河パーティクル ---------- */
  const N = isMobile ? 4200 : 7500;
  const pos = new Float32Array(N * 3);
  const col = new Float32Array(N * 3);
  const baseCol = new Float32Array(N * 3);
  const pR = new Float32Array(N);       // 現在半径
  const pA = new Float32Array(N);       // 現在角度
  const pY = new Float32Array(N);       // 面内の厚みオフセット
  const pSpin = new Float32Array(N);    // 個体差（回転倍率）
  const pSuck = new Float32Array(N);    // 個体差（吸い込み倍率）

  const assignColor = (i, t) => {
    let c;
    const roll = Math.random();
    if (roll < 0.05) c = ACCENTS[Math.floor(Math.random() * ACCENTS.length)].clone();
    else c = zoneColor(t);
    // わずかな明度ゆらぎ
    const v = 0.88 + Math.random() * 0.24;
    baseCol[i * 3] = Math.min(1, c.r * v);
    baseCol[i * 3 + 1] = Math.min(1, c.g * v);
    baseCol[i * 3 + 2] = Math.min(1, c.b * v);
  };

  for (let i = 0; i < N; i += 1) {
    // 外周寄りに厚く分布
    const t = Math.sqrt(Math.random());
    pR[i] = R_MIN + t * (R_MAX - R_MIN);
    pA[i] = spiralAngle(pR[i]);
    pY[i] = (Math.random() - 0.5) * (1.6 + pR[i] * 0.055);
    pSpin[i] = 0.75 + Math.random() * 0.5;
    pSuck[i] = 0.7 + Math.random() * 0.6;
    assignColor(i, t);
  }

  const galaxyGeo = new THREE.BufferGeometry();
  galaxyGeo.setAttribute("position", new THREE.BufferAttribute(pos, 3));
  galaxyGeo.setAttribute("color", new THREE.BufferAttribute(col, 3));
  const galaxyMat = new THREE.PointsMaterial({
    size: 0.95,
    map: dotTex,
    vertexColors: true,
    transparent: true,
    opacity: 0.75,
    depthWrite: false,
    sizeAttenuation: true,
  });
  const galaxyPts = new THREE.Points(galaxyGeo, galaxyMat);
  galaxy.add(galaxyPts);

  /* ---------- 光条層: 速く大きい輝点（勢いの主役） ---------- */
  const NS = isMobile ? 130 : 220;
  const sPos = new Float32Array(NS * 3);
  const sCol = new Float32Array(NS * 3);
  const sBase = new Float32Array(NS * 3);
  const sR = new Float32Array(NS);
  const sA = new Float32Array(NS);
  const sY = new Float32Array(NS);
  for (let i = 0; i < NS; i += 1) {
    sR[i] = R_MIN + Math.random() * (R_MAX - R_MIN);
    sA[i] = spiralAngle(sR[i]);
    sY[i] = (Math.random() - 0.5) * 2.2;
    const c = COL_MID.clone().lerp(COL_INNER, Math.random());
    sBase[i * 3] = c.r; sBase[i * 3 + 1] = c.g; sBase[i * 3 + 2] = c.b;
  }
  const sparkGeo = new THREE.BufferGeometry();
  sparkGeo.setAttribute("position", new THREE.BufferAttribute(sPos, 3));
  sparkGeo.setAttribute("color", new THREE.BufferAttribute(sCol, 3));
  const sparkMat = new THREE.PointsMaterial({
    size: 1.9,
    map: dotTex,
    vertexColors: true,
    transparent: true,
    opacity: 0.65,
    depthWrite: false,
    sizeAttenuation: true,
  });
  galaxy.add(new THREE.Points(sparkGeo, sparkMat));

  /* ---------- 塵層: 空間に漂う微光（奥行き） ---------- */
  const ND = isMobile ? 160 : 300;
  const dPos = new Float32Array(ND * 3);
  for (let i = 0; i < ND; i += 1) {
    dPos[i * 3] = (Math.random() - 0.5) * 150;
    dPos[i * 3 + 1] = (Math.random() - 0.5) * 90;
    dPos[i * 3 + 2] = (Math.random() - 0.5) * 60 - 10;
  }
  const dustGeo = new THREE.BufferGeometry();
  dustGeo.setAttribute("position", new THREE.BufferAttribute(dPos, 3));
  const dustMat = new THREE.PointsMaterial({
    size: 2.2,
    map: dotTex,
    color: new THREE.Color("#b9c8f2"),
    transparent: true,
    opacity: 0.28,
    depthWrite: false,
    sizeAttenuation: true,
  });
  const dust = new THREE.Points(dustGeo, dustMat);
  scene.add(dust);

  /* ---------- 更新ロジック ---------- */
  // 差動回転: 内側ほど速い（ケプラー風） / 吸い込み: 内側ほど強く加速
  const angularVel = (r) => 1.35 / (0.9 + r * 0.085);
  const inwardVel = (r) => 1.6 * (0.3 + Math.pow(1 - r / R_MAX, 2.4) * 5.2);
  const funnelY = (r) => -FUNNEL_DEPTH * Math.pow(1 - r / R_MAX, 2.4);

  // 白へ寄せる係数（=フェード）: 外周スポーン時と中心到達時に自然に消える
  const fadeOf = (r) => {
    const fOut = Math.min(1, Math.max(0, (R_MAX - r) / 7));
    const fIn = Math.min(1, Math.max(0, (r - R_MIN) / 5));
    return fOut * fIn;
  };

  const writeParticle = (posArr, colArr, i, r, a, yOff, base3, i3) => {
    posArr[i3] = Math.cos(a) * r;
    posArr[i3 + 1] = yOff + funnelY(r);
    posArr[i3 + 2] = Math.sin(a) * r;
    const f = fadeOf(r);
    colArr[i3] = 1 - (1 - base3[i3]) * f;
    colArr[i3 + 1] = 1 - (1 - base3[i3 + 1]) * f;
    colArr[i3 + 2] = 1 - (1 - base3[i3 + 2]) * f;
  };

  let pointerX = 0;
  let pointerY = 0;
  let targetPX = 0;
  let targetPY = 0;
  const onPointer = (e) => {
    targetPX = (e.clientX / window.innerWidth) * 2 - 1;
    targetPY = (e.clientY / window.innerHeight) * 2 - 1;
  };
  window.addEventListener("pointermove", onPointer, { passive: true });

  const onResize = () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
  };
  window.addEventListener("resize", onResize);

  const clock = new THREE.Clock();
  let rafId = 0;
  let running = true;
  // 外周の平均回転量を積算し、再投入時の位相ずれを補正する
  let globalShear = 0;

  const frame = () => {
    rafId = requestAnimationFrame(frame);
    const dt = Math.min(clock.getDelta(), 0.066);
    const t = clock.elapsedTime;
    globalShear += angularVel(R_MAX * 0.85) * dt;

    // 主層更新
    for (let i = 0; i < N; i += 1) {
      pA[i] += angularVel(pR[i]) * pSpin[i] * dt;
      pR[i] -= inwardVel(pR[i]) * pSuck[i] * dt;
      if (pR[i] < R_MIN) {
        // 外周へ再投入（アーム構造を保つため螺旋に沿わせ、全体回転分を補正）
        pR[i] = R_MAX - Math.random() * 6;
        pA[i] = spiralAngle(pR[i]) + globalShear;
        pY[i] = (Math.random() - 0.5) * (1.6 + pR[i] * 0.055);
        assignColor(i, (pR[i] - R_MIN) / (R_MAX - R_MIN));
      }
      writeParticle(pos, col, i, pR[i], pA[i], pY[i], baseCol, i * 3);
    }
    galaxyGeo.attributes.position.needsUpdate = true;
    galaxyGeo.attributes.color.needsUpdate = true;

    // 光条層更新（1.7倍速）
    for (let i = 0; i < NS; i += 1) {
      sA[i] += angularVel(sR[i]) * 1.7 * dt;
      sR[i] -= inwardVel(sR[i]) * 1.5 * dt;
      if (sR[i] < R_MIN) {
        sR[i] = R_MAX - Math.random() * 10;
        sA[i] = spiralAngle(sR[i]) + globalShear;
      }
      writeParticle(sPos, sCol, i, sR[i], sA[i], sY[i], sBase, i * 3);
    }
    sparkGeo.attributes.position.needsUpdate = true;
    sparkGeo.attributes.color.needsUpdate = true;

    // 全体のうねり
    galaxy.rotation.z += dt * 0.05;
    galaxy.rotation.x = -0.88 + Math.sin(t * 0.22) * 0.05;
    dust.rotation.y -= dt * 0.012;

    // カメラ: 呼吸ズーム + ポインタ視差
    pointerX += (targetPX - pointerX) * 0.035;
    pointerY += (targetPY - pointerY) * 0.035;
    camera.position.x = pointerX * 4.5;
    camera.position.y = -pointerY * 3;
    camera.position.z = CAM_Z + Math.sin(t * 0.3) * 2.2;
    camera.lookAt(0, 4, 0);

    renderer.render(scene, camera);
  };

  const start = () => {
    if (!running) {
      running = true;
      clock.start();
      frame();
    }
  };
  const stop = () => {
    if (running) {
      running = false;
      clock.stop();
      cancelAnimationFrame(rafId);
    }
  };
  document.addEventListener("visibilitychange", () => {
    if (document.hidden) stop();
    else start();
  });

  running = true;
  frame();
  return true;
}
