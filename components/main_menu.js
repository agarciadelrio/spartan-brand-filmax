export function MainMenu() {
  return {
    toogleMenu(el) {
      el.classList.toggle('rotate-90')
      this.$root.classList.toggle('open')
    }
  }
}