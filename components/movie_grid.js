export function MovieGrid(nimages=0) {
  return {
    nimages,
    slc:0,
    childrenSrc:[],
    container:null,
    grid:null,
    movie_title: 'The Movie Title',
    showingTitle:true,
    currentIndex:0,
    init() {
      this.grid = this.$root.querySelector('.MovieGrid')
      this.container = this.$root
      this.container.style.transition = 'background-image 900ms ease-in-out'
      //console.log('CONT', this.container)
      this.childrenSrc = [...this.$root.querySelectorAll('img')];
      this.setBgImg(0)
      this.grid.onscroll = () => {
        if(this.showingTitle) {
          this.showingTitle = false
        }
      }
    },
    onScrollEnd(evt) {
      const pictures = [...this.$root.querySelectorAll('picture')]
      const childW = Math.max(...pictures.map(p => p.clientWidth))
      const center = (this.grid.clientWidth - childW)/2
      if(this.nimages>0) {
        let ind = 0
        pictures.every((c,i) =>  {
          if(Math.floor(center - c.getBoundingClientRect().x)==0) {
            ind = i
            return false
          }
          return true
        })
        this.setBgImg(ind)
        this.showingTitle = true
      }
    },
    setBgImg(ind) {
      this.currentIndex = ind
      this.childrenSrc.forEach(c => {
        c.classList.remove('active')
        c.parentNode.classList.remove('active')
      })
      this.childrenSrc[ind].classList.add('active')
      this.childrenSrc[ind].parentNode.classList.add('active')
      this.container.style.backgroundImage = `url(${this.childrenSrc[ind].src})`
      this.movie_title = this.childrenSrc[ind].alt
    },
    onPosterClick(ind) {
      console.log('onPosterClick')
      this.showingTitle = false
      const pictures = [...this.$root.querySelectorAll('picture')]
      const childW = Math.max(...pictures.map(p => p.clientWidth))
      this.grid.scrollTo({ left:childW * ind, behavior: 'smooth'});
    },
    onScrollerGo(dir) {
      //console.log('DIR',dir)
      this.showingTitle = false
      this.grid.scrollBy({ left: 50*dir, behavior: 'smooth' });
    }

  }
}
