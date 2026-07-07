const menuButton = document.querySelector(".menu-button");
const globalNav = document.querySelector(".global-nav");
const entryPanel = document.querySelector(".entry-panel");
const entryClose = document.querySelector(".entry-close");

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

entryClose?.addEventListener("click", () => {
  entryPanel?.classList.add("is-hidden");
  // 閉じた要素にフォーカスが残るとbodyへ飛ぶため、常設CTAへフォーカスを移す
  document.querySelector(".side-cta-primary")?.focus();
});
