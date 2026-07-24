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

  // 背景図形にごく弱い奥行きを加える
  function initAmbientParallax() {
    if (prefersReducedMotion) return;
    const wires = document.querySelectorAll(".wire");
    if (!wires.length) return;

    let queued = false;
    const update = () => {
      wires.forEach((wire, index) => {
        const rate = 0.018 + index * 0.012;
        wire.style.translate = `0 ${Math.round(window.scrollY * rate)}px`;
      });
      queued = false;
    };

    window.addEventListener("scroll", () => {
      if (queued) return;
      queued = true;
      requestAnimationFrame(update);
    }, { passive: true });
    update();
  }

  document.addEventListener("DOMContentLoaded", initStructureCounts);
  document.addEventListener("DOMContentLoaded", initAmbientParallax);

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
