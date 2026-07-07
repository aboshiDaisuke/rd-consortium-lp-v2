(() => {
  "use strict";

  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* ============================================================
     背景「氷の渦」— モザイクタイル生成
     ============================================================ */
  function buildVortexBackground() {
    const el = document.getElementById("bgVortex");
    if (!el) return;

    const size = 1400;
    const cx = size / 2;
    const cy = size / 2;
    const rings = 22;
    const maxR = size / 2;
    let tiles = "";
    let tileCount = 0;
    const maxTiles = 480;

    for (let r = 1; r <= rings && tileCount < maxTiles; r++) {
      const radius = (r / rings) * maxR;
      const circumference = 2 * Math.PI * radius;
      const tileSize = 6 + r * 1.1;
      const count = Math.max(6, Math.floor(circumference / (tileSize * 2.2)));
      const opacity = 0.08 + (r / rings) * 0.22;

      for (let i = 0; i < count && tileCount < maxTiles; i++) {
        const angle = (i / count) * Math.PI * 2 + r * 0.15;
        const x = cx + Math.cos(angle) * radius;
        const y = cy + Math.sin(angle) * radius;
        const rot = (angle * 180) / Math.PI;
        tiles += `<rect x="${(-tileSize / 2).toFixed(1)}" y="${(-tileSize / 2).toFixed(1)}" width="${tileSize.toFixed(1)}" height="${tileSize.toFixed(1)}" rx="${(tileSize * 0.2).toFixed(1)}" fill="#bdd6f5" opacity="${opacity.toFixed(2)}" transform="translate(${x.toFixed(1)},${y.toFixed(1)}) rotate(${rot.toFixed(1)})" />`;
        tileCount++;
      }
    }

    const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${size} ${size}">${tiles}</svg>`;
    const encoded = "data:image/svg+xml;utf8," + encodeURIComponent(svg);
    el.style.backgroundImage = `url("${encoded}")`;
    el.style.backgroundSize = "contain";
  }

  /* ============================================================
     浮遊ワイヤーフレーム図形の生成
     ============================================================ */
  const SHAPE_SVGS = {
    triangle: `<svg viewBox="0 0 100 90" xmlns="http://www.w3.org/2000/svg">
      <polygon points="50,6 94,80 6,80" fill="none" stroke="#a9c6ec" stroke-width="2.5"/>
      <polygon points="50,30 74,68 26,68" fill="none" stroke="#a9c6ec" stroke-width="1.5" opacity=".6"/>
    </svg>`,
    cube: `<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
      <polygon points="30,20 80,20 80,70 30,70" fill="none" stroke="#a9c6ec" stroke-width="2.5"/>
      <polygon points="10,35 60,35 60,85 10,85" fill="none" stroke="#a9c6ec" stroke-width="2.5" opacity=".85"/>
      <line x1="30" y1="20" x2="10" y2="35" stroke="#a9c6ec" stroke-width="2"/>
      <line x1="80" y1="20" x2="60" y2="35" stroke="#a9c6ec" stroke-width="2"/>
      <line x1="80" y1="70" x2="60" y2="85" stroke="#a9c6ec" stroke-width="2"/>
      <line x1="30" y1="70" x2="10" y2="85" stroke="#a9c6ec" stroke-width="2"/>
    </svg>`,
    ring: `<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
      <ellipse cx="50" cy="50" rx="44" ry="20" fill="none" stroke="#a9c6ec" stroke-width="3"/>
      <ellipse cx="50" cy="60" rx="44" ry="20" fill="none" stroke="#a9c6ec" stroke-width="3" opacity=".6"/>
      <line x1="6" y1="50" x2="6" y2="60" stroke="#a9c6ec" stroke-width="3"/>
      <line x1="94" y1="50" x2="94" y2="60" stroke="#a9c6ec" stroke-width="3"/>
    </svg>`,
    diamond: `<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
      <polygon points="50,5 95,50 50,95 5,50" fill="none" stroke="#a9c6ec" stroke-width="2.5"/>
      <polygon points="50,25 75,50 50,75 25,50" fill="none" stroke="#a9c6ec" stroke-width="1.5" opacity=".6"/>
    </svg>`,
  };

  const SHAPE_LAYOUT = [
    { type: "triangle", top: "6%",  left: "4%",  w: 70,  dur: 13, delay: 0,    depth: .03 },
    { type: "cube",     top: "10%", left: "88%", w: 90,  dur: 16, delay: 1.2,  depth: .05 },
    { type: "diamond",  top: "24%", left: "42%", w: 60,  dur: 11, delay: .6,   depth: .02 },
    { type: "ring",     top: "34%", left: "10%", w: 80,  dur: 15, delay: 2,    depth: .04 },
    { type: "triangle", top: "46%", left: "80%", w: 65,  dur: 12, delay: .3,   depth: .06 },
    { type: "cube",     top: "58%", left: "6%",  w: 75,  dur: 14, delay: 1.8,  depth: .03 },
    { type: "diamond",  top: "68%", left: "60%", w: 55,  dur: 10, delay: .9,   depth: .05 },
    { type: "ring",     top: "78%", left: "24%", w: 85,  dur: 17, delay: 1.5,  depth: .02 },
    { type: "triangle", top: "88%", left: "72%", w: 60,  dur: 13, delay: .5,   depth: .04 },
    { type: "cube",     top: "96%", left: "40%", w: 70,  dur: 15, delay: 2.2,  depth: .06 },
  ];

  function buildFloatingShapes() {
    const container = document.getElementById("bgShapes");
    if (!container) return;

    const frag = document.createDocumentFragment();
    SHAPE_LAYOUT.forEach((s, i) => {
      const wrap = document.createElement("div");
      wrap.className = "bg-shape";
      wrap.style.top = s.top;
      wrap.style.left = s.left;
      wrap.style.width = s.w + "px";
      wrap.style.setProperty("--dur", s.dur + "s");
      wrap.style.setProperty("--delay", s.delay + "s");
      wrap.dataset.depth = s.depth;
      wrap.innerHTML = SHAPE_SVGS[s.type];
      wrap.setAttribute("aria-hidden", "true");
      frag.appendChild(wrap);
    });
    container.appendChild(frag);
  }

  /* ============================================================
     スクロールパララックス
     ============================================================ */
  function initParallax() {
    if (prefersReducedMotion) return;
    const shapes = document.querySelectorAll(".bg-shape");
    if (!shapes.length) return;

    let ticking = false;
    function update() {
      const y = window.scrollY;
      shapes.forEach((el) => {
        const depth = parseFloat(el.dataset.depth) || 0.03;
        el.style.transform = `translateY(${(y * depth).toFixed(1)}px)`;
      });
      ticking = false;
    }
    window.addEventListener(
      "scroll",
      () => {
        if (!ticking) {
          requestAnimationFrame(update);
          ticking = true;
        }
      },
      { passive: true }
    );
  }

  /* ============================================================
     モバイルドロワー
     ============================================================ */
  function initDrawer() {
    const toggle = document.getElementById("drawerToggle");
    const drawer = document.getElementById("mobileDrawer");
    const overlay = document.getElementById("drawerOverlay");
    const closeBtn = document.getElementById("drawerClose");
    if (!toggle || !drawer || !overlay) return;

    function close() {
      toggle.setAttribute("aria-expanded", "false");
      drawer.classList.remove("is-open");
      overlay.classList.remove("is-open");
      drawer.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";
    }
    function open() {
      toggle.setAttribute("aria-expanded", "true");
      drawer.classList.add("is-open");
      overlay.classList.add("is-open");
      drawer.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";
    }

    toggle.addEventListener("click", () => {
      const isOpen = toggle.getAttribute("aria-expanded") === "true";
      isOpen ? close() : open();
    });
    overlay.addEventListener("click", close);
    if (closeBtn) closeBtn.addEventListener("click", close);
    drawer.querySelectorAll("a").forEach((a) => a.addEventListener("click", close));
    document.addEventListener("keydown", (e) => {
      if (e.key === "Escape") close();
    });
  }

  /* ============================================================
     reveal フェードイン（IntersectionObserver）
     ============================================================ */
  function initReveal() {
    const targets = document.querySelectorAll(".reveal");
    if (!targets.length) return;

    if (!("IntersectionObserver" in window) || prefersReducedMotion) {
      targets.forEach((t) => t.classList.add("is-visible"));
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -8% 0px" }
    );
    targets.forEach((t) => io.observe(t));
  }

  /* ============================================================
     数値カウントアップ
     ============================================================ */
  function initCountUp() {
    const targets = document.querySelectorAll(".stat-number[data-count]");
    if (!targets.length) return;

    function animate(el) {
      const target = parseFloat(el.dataset.count);
      const suffix = el.dataset.suffix || "";
      const isDecimal = String(target).includes(".");
      const duration = 1400;
      const start = performance.now();

      if (prefersReducedMotion) {
        el.textContent = target + suffix;
        return;
      }

      function frame(now) {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = target * eased;
        el.textContent = (isDecimal ? value.toFixed(1) : Math.round(value)) + suffix;
        if (progress < 1) requestAnimationFrame(frame);
      }
      requestAnimationFrame(frame);
    }

    if (!("IntersectionObserver" in window)) {
      targets.forEach(animate);
      return;
    }
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animate(entry.target);
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.5 }
    );
    targets.forEach((t) => io.observe(t));
  }

  /* ============================================================
     TOPへ戻る
     ============================================================ */
  function initScrollTop() {
    const btn = document.getElementById("scrollTop");
    if (!btn) return;
    btn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: prefersReducedMotion ? "auto" : "smooth" });
    });
  }

  /* ============================================================
     init
     ============================================================ */
  document.addEventListener("DOMContentLoaded", () => {
    buildVortexBackground();
    buildFloatingShapes();
    initParallax();
    initDrawer();
    initReveal();
    initCountUp();
    initScrollTop();
  });
})();
