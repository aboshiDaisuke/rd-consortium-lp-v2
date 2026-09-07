(() => {
  "use strict";

  // JSが有効なときだけ .reveal を初期非表示にする（CSS側は .js .reveal で限定）
  document.documentElement.classList.add("js");

  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

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

  // トップページの構造数値を、表示時に一度だけカウントアップ
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
        const duration = 900;

        const tick = (now) => {
          const progress = Math.min((now - startedAt) / duration, 1);
          const eased = 1 - Math.pow(1 - progress, 3);
          const current = Math.round(target * eased);
          element.textContent = `${String(current).padStart(2, "0")}${suffix}`;
          if (progress < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
        observer.unobserve(element);
      });
    }, { threshold: 0.45 });

    counters.forEach((counter) => observer.observe(counter));
  }

  // 背景図形と巨大文字にごく弱い奥行きを加える
  function initAmbientParallax() {
    if (prefersReducedMotion) return;
    const wires = document.querySelectorAll(".wire");
    const heroGiant = document.querySelector(".hero-giant");
    if (!wires.length && !heroGiant) return;

    let queued = false;
    const update = () => {
      const scrollY = window.scrollY;
      wires.forEach((wire, index) => {
        const rate = 0.018 + index * 0.012;
        wire.style.translate = `0 ${Math.round(scrollY * rate)}px`;
      });
      if (heroGiant instanceof HTMLElement) {
        heroGiant.style.translate = `0 ${Math.round(scrollY * 0.035)}px`;
      }
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

  // 共通フォーム：タブ切り替え + URLパラメータ(type/subject)からの初期状態設定
  const contactTablist = document.querySelector(".contact-tabs");
  if (contactTablist) {
    const tabs = Array.from(contactTablist.querySelectorAll("[data-contact-tab]"));
    const panelOf = (tab) => document.getElementById(tab.getAttribute("aria-controls"));

    const activateTab = (key, focus = false) => {
      tabs.forEach((tab) => {
        const selected = tab.dataset.contactTab === key;
        tab.setAttribute("aria-selected", String(selected));
        tab.tabIndex = selected ? 0 : -1;
        const panel = panelOf(tab);
        if (panel) panel.hidden = !selected;
        if (selected && focus) tab.focus();
      });
    };

    tabs.forEach((tab) => {
      tab.addEventListener("click", () => activateTab(tab.dataset.contactTab));
    });

    contactTablist.addEventListener("keydown", (event) => {
      if (event.key !== "ArrowLeft" && event.key !== "ArrowRight") return;
      const currentIndex = tabs.findIndex((tab) => tab.getAttribute("aria-selected") === "true");
      const delta = event.key === "ArrowRight" ? 1 : -1;
      const next = tabs[(currentIndex + delta + tabs.length) % tabs.length];
      activateTab(next.dataset.contactTab, true);
      event.preventDefault();
    });

    const params = new URLSearchParams(window.location.search);
    let requestedType = params.get("type");
    if (requestedType === "other") requestedType = "inquiry";
    const hasType = tabs.some((tab) => tab.dataset.contactTab === requestedType);
    activateTab(hasType ? requestedType : "inquiry");

    const subject = params.get("subject");
    if (subject) {
      const subjectLabels = {
        "rd-engineer": "R&Dプロジェクトエンジニア",
        "sensing-project": "省電力センシングプロジェクト"
      };
      document.querySelectorAll("[data-contact-subject]").forEach((input) => {
        if (input instanceof HTMLInputElement) input.value = subjectLabels[subject] || subject;
      });
    }
  }
})();
