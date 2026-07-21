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

  // 共通フォームへ導線元の種別・対象プロジェクトを引き継ぐ
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
