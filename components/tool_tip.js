export function ToolTip(duration=2000) {
  return {
    open: false,
    duration,
    init() {
      this.$el.onmouseenter = () => {
        this.open = true
        setTimeout(() => {
          this.open = false
        }, this.duration)
      }

      this.$el.onmouseleave= () => {
        this.open = false
      }
    }
  }
}