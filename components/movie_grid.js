export function MovieGrid(nimages=0) {
  return {
    nimages,
    slc:0,
    childrenSrc:[],
    container:null,
    grid:null,
    movie_title: 'The Movie Title',
    showingTitle:true,
    init() {
      this.grid = this.$root.querySelector('.MovieGrid')
      this.container = this.$root
      this.container.style.transition = 'background-image 900ms ease-in-out'
      //console.log('CONT', this.container)
      this.childrenSrc = [...this.$root.querySelectorAll('img')]
      //console.log('MovieGrid', this.childrenSrc)
      this.setBgImg(0)
      this.grid.onscroll = () => {
        if(this.showingTitle) {
          this.showingTitle = false
        }
      }
    },
    onScrollEnd(evt) {
      if(this.nimages>0) {
        const element = evt.currentTarget
        const w = [...this.$el.children].reduce((a, c) => a + c.offsetWidth, 0)
        this.slc = element.clientWidth / (this.nimages + 4);
        //console.log('onScrollEnd',this.nimages,this.slc, element.scrollLeft, this.$el.clientWidth, w)

        let ind = Math.floor(element.scrollLeft/(this.slc*3))
        //console.log(mod)
        this.setBgImg(ind)
        this.showingTitle = true
      }
    },
    setBgImg(ind) {
      this.childrenSrc.forEach(c => c.classList.remove('active'))
      this.childrenSrc[ind].classList.add('active')
      this.container.style.backgroundImage = `url(${this.childrenSrc[ind].src})`
      this.movie_title = this.childrenSrc[ind].alt
    },
    onScrollerGo(dir) {
      //console.log('DIR',dir)
      this.showingTitle = false
      this.grid.scrollBy({ left: 50*dir, behavior: "smooth" });
    }

  }
}
