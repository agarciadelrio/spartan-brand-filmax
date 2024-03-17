import Glide, { Controls, Breakpoints, Autoplay } from '@glidejs/glide/dist/glide.modular.esm'

export function GlideJs(options={
  type: 'carousel',
  startAt: 0,
  perView: 1,
  autoplay: 1000,
}) {
  return {
    options,
    glide:null,
    container:null,
    lastSlide:null,
    init() {
      this.container = this.$el.closest('.GlideContainer')
      this.container.style.transition = 'background-image 900ms ease-in-out'
      //console.log('opt', this.options)
      this.options.breakpoints = {
        390: { perView: 1, gap: 0 },
        768: { perView: 2, gap: 0 },
        1920: { perView: 5, gap: 0 },
      }
      this.options.gap = 0
      this.glide = new Glide(this.$el, this.options)

      this.glide.on(['mount.after', 'run'], (e) => {
        if(this.lastSlide) {
          this.lastSlide.style.setProperty('--opacity', '65%');
          this.lastSlide.style.setProperty('--scale', '95%');
        }
        var currentSlideElement = this.$el.querySelectorAll('li')[this.glide.index];
        const imdbid = currentSlideElement.dataset.imdbid
        const img = new Image()
        img.src = `https://www.bizcochito.es/Films/Poster/${imdbid}.webp`
        //img.src = `https://www.bizcochito.es/img/${imdbid}-en-pos.webp`
        img.onload = () => {
          currentSlideElement.style.setProperty('--opacity', '100%');
          currentSlideElement.style.setProperty('--scale', '100%');
          this.container.style.backgroundImage = `url(${img.src})`
        }
        this.lastSlide = currentSlideElement
      })
      this.$nextTick(() => {
        //this.glide.mount({ Controls, Breakpoints })
        this.glide.mount({ Controls, Breakpoints, Autoplay })
      })
    }
  }
}