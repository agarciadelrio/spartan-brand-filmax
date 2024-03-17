import Alpine from 'alpinejs';

export function App() {
  return {
    scrolling:false,
    ShowingGlobalLogo:false,
    ShowMainMenu:true,
    ShowInfo:Alpine.$persist(false),
    wrapper:null,
    openSearch:Alpine.$persist(''),
    init() {
      this.wrapper = this.$refs.Wrapper
      //console.log('APP')
      //console.log(this.$root)
      //console.log(this.wrapper)
      this.wrapper.onscroll = this.onScroll.bind(this)
      this.wrapper.onscrollend = this.onScrollEnd.bind(this)
      setTimeout(()=> {
        const sect = document.querySelector('[x-ref="buttonsPing"]')
        sect?.remove()
      },5000)
    },
    onScroll() {
      if(!this.scrolling) {
        //console.log('SCROLLING')
        this.scrolling = true
        this.ShowingGlobalLogo = false
      }
      if(this.wrapper.scrollTop>5 && this.ShowMainMenu) {
        this.ShowMainMenu = false
      }
    },
    onScrollEnd() {
      //console.log('END SCROLL', this.wrapper.scrollTop)
      this.scrolling = false
      if(this.wrapper.scrollTop>5) {
        this.ShowingGlobalLogo = true
        this.ShowMainMenu = false
      } else {
        this.ShowMainMenu = true
      }
    },
    onMouseMove(event,idn) {
      //console.log(event.screenY)
      if(event.screenY > 200 && this.ShowMainMenu) {
        //console.log('MOVE',event)
        this.ShowMainMenu = false
        this.ShowingGlobalLogo = true
      }
    },
    onMouseMovePhantom(el) {
      if(!this.ShowMainMenu) {
        this.ShowMainMenu = true
        this.ShowingGlobalLogo = false
      }
    },
    showEventInfo() {
      this.ShowInfo = !this.ShowInfo
    },
    setSearch(value) {
      //console.log('setSearch', value)
      this.openSearch = value
      if(this.openSearch==='open') {
        setTimeout(() => {
          this.$refs.search.focus()
        }, 500)
      }
    },
    letsSearch() {
      this.openSearch = 'close'
      setTimeout(() => {
        this.$refs.search.blur()
      }, 500)
    },
    goToSupport() {
      this.$refs.supportSection?.scrollIntoView({
        behavior: 'instant' //smooth instant auto
      });
    },
    goToMain() {
      const sect = document.querySelector('[x-ref="main_section"]')
      sect?.scrollIntoView({
        behavior: 'smooth' //smooth instant auto
      });
    },
    openConfigDialog() {
      alert('SISTEMA DE CONFIGURACIÓN')
    },
  }
}