export function SmoothScroll() {
  return {
    onMouseEnter() {
      const top = this.$el.closest('.Wrapper')
      top.scrollBy({ top: 50, behavior: "smooth" });
      this.$root.remove()
    }
  }
}