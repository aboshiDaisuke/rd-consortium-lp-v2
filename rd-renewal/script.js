(() => {
  "use strict";

  // JSが有効なときだけ .reveal を初期非表示にする（CSS側は .js .reveal で限定）
  document.documentElement.classList.add("js");

  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // ヒーロー背景動画（自動再生 / 低モーション対応）
  const heroVideo = document.querySelector(".hero-video");
  if (heroVideo instanceof HTMLVideoElement) {
    if (prefersReducedMotion) {
      heroVideo.pause();
      heroVideo.removeAttribute("autoplay");
    } else {
      const play = () => {
        heroVideo.play().catch(() => {
          /* autoplay ブロック時は poster のまま */
        });
      };
      if (heroVideo.readyState >= 2) play();
      else heroVideo.addEventListener("loadeddata", play, { once: true });
    }
  }

  /* ============================================================
     背景「氷の渦」— HAL名古屋風モザイク（吸い込みアニメ）
     ============================================================ */
  function buildIceVortex(target) {
    const size = 1400;
    const cx = size / 2;
    const cy = size / 2;
    const rings = 22;
    const maxR = size / 2;
    const maxTiles = 480;
    let tiles = "";
    let tileCount = 0;

    for (let r = 1; r <= rings && tileCount < maxTiles; r += 1) {
      const radius = (r / rings) * maxR;
      const circumference = 2 * Math.PI * radius;
      const tileSize = 6 + r * 1.1;
      const count = Math.max(6, Math.floor(circumference / (tileSize * 2.2)));
      const opacity = 0.1 + (r / rings) * 0.28;

      for (let i = 0; i < count && tileCount < maxTiles; i += 1) {
        const angle = (i / count) * Math.PI * 2 + r * 0.15;
        const x = cx + Math.cos(angle) * radius;
        const y = cy + Math.sin(angle) * radius;
        const rot = (angle * 180) / Math.PI;
        tiles += `<rect x="${(-tileSize / 2).toFixed(1)}" y="${(-tileSize / 2).toFixed(1)}" width="${tileSize.toFixed(1)}" height="${tileSize.toFixed(1)}" rx="${(tileSize * 0.22).toFixed(1)}" fill="#bdd6f5" opacity="${opacity.toFixed(2)}" transform="translate(${x.toFixed(1)},${y.toFixed(1)}) rotate(${rot.toFixed(1)})" />`;
        tileCount += 1;
      }
    }

    const svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 ${size} ${size}">${tiles}</svg>`;
    target.style.backgroundImage = `url("data:image/svg+xml;utf8,${encodeURIComponent(svg)}")`;
  }

  function initMotionBackground() {
    const root = document.querySelector(".motion-bg");
    if (!root || root.dataset.enhanced === "1") return;
    root.dataset.enhanced = "1";
    root.innerHTML = "";

    // 吸い込みループ用に同一渦を2層 + 逆回転1層
    const vortexA = document.createElement("div");
    vortexA.className = "motion-vortex motion-vortex--a";
    const vortexB = document.createElement("div");
    vortexB.className = "motion-vortex motion-vortex--b";
    const vortexC = document.createElement("div");
    vortexC.className = "motion-vortex motion-vortex--c";
    root.appendChild(vortexA);
    root.appendChild(vortexB);
    root.appendChild(vortexC);
    buildIceVortex(vortexA);
    // 同じSVGを共有（再生成コストを避ける）
    const bg = vortexA.style.backgroundImage;
    vortexB.style.backgroundImage = bg;
    vortexC.style.backgroundImage = bg;

    // 中心へ収束する同心リング
    const flowA = document.createElement("div");
    flowA.className = "motion-flow";
    const flowB = document.createElement("div");
    flowB.className = "motion-flow motion-flow--b";
    root.appendChild(flowA);
    root.appendChild(flowB);

    // 中心グロー
    const core = document.createElement("div");
    core.className = "motion-core";
    root.appendChild(core);
  }

  // ハンバーガーメニュー開閉
  const menuButton = document.querySelector(".menu-button");
  const globalNav = document.querySelector(".global-nav");

  menuButton?.addEventListener("click", () => {
    const isOpen = globalNav.classList.toggle("is-open");
    menuButton.setAttribute("aria-expanded", String(isOpen));
  });

  globalNav?.addEventListener("click", (event) => {
    if (event.target instanceof HTMLAnchorElement) {
      globalNav.classList.remove("is-open");
      menuButton?.setAttribute("aria-expanded", "false");
    }
  });

  // スクロールリベイル
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

  document.addEventListener("DOMContentLoaded", initReveal);

  // 数値ブロックがあるページでは、表示時に一度だけカウントアップ
  function initStructureCounts() {
    const counters = document.querySelectorAll(".structure-number[data-count]");
    if (!counters.length) return;

    const showFinal = (element) => {
      const target = Number(element.dataset.count || 0);
      const suffix = element.dataset.suffix || "";
      element.textContent = `${String(target).padStart(2, "0")}${suffix}`;
    };

    if (!("IntersectionObserver" in window) || prefersReducedMotion) {
      counters.forEach(showFinal);
      return;
    }

    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        const element = entry.target;
        const target = Number(element.dataset.count || 0);
        const suffix = element.dataset.suffix || "";
        const startedAt = performance.now();

        const tick = (now) => {
          const progress = Math.min((now - startedAt) / 900, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          element.textContent = `${String(Math.round(target * eased)).padStart(2, "0")}${suffix}`;
          if (progress < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
        observer.unobserve(element);
      });
    }, { threshold: 0.45 });

    counters.forEach((counter) => observer.observe(counter));
  }

  document.addEventListener("DOMContentLoaded", () => {
    initMotionBackground();
    initStructureCounts();
  });

  // 静的HTML版でも、導線元に応じて共通フォームの種別と対象名を引き継ぐ
  const params = new URLSearchParams(window.location.search);
  const contactType = document.querySelector("[data-contact-type]");
  const contactSubject = document.querySelector("[data-contact-subject]");
  const type = params.get("type");
  const subject = params.get("subject");

  if (contactType instanceof HTMLSelectElement && type) {
    const hasType = Array.from(contactType.options).some((option) => option.value === type);
    if (hasType) contactType.value = type;
  }
  if (contactSubject instanceof HTMLInputElement && subject) {
    const subjectLabels = {
      "rd-engineer": "R&Dプロジェクトエンジニア",
      "sensing-project": "省電力センシングプロジェクト"
    };
    contactSubject.value = subjectLabels[subject] || subject;
  }
})();
