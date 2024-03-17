export function Preload(imdbids) {
  return {
    imdbids,
    length:0,
    count:0,
    dialog:null,
    div:null,
    init() {
      this.div = this.$el.closest('div')
      this.dialog = this.$el.closest('dialog')
      this.length = this.imdbids.length
      if(this.length>0) {
        if(this.length>5) this.length = 5
        this.count = this.length
        this.$el.value = 0
        //console.log('imdbids',this.count, this.imdbids)
        this.imdbids.forEach(i => {
          const img = new Image()
          img.src = `https://www.bizcochito.es/img/${i}-en-pos.webp`
          img.onload = this.counter.bind(this)
          img.onerror = this.counter.bind(this)
        });
      } else {
        this.dialog.remove()
      }
    },
    counter(e) {
      this.$el.value += 100/this.length
      this.count--;
      if(this.count<=1) {
        this.div.classList.add('animate-fadeOut')
        this.div.onanimationend = () => {
          console.log('OAE')
          this.div.classList.add('hidden')
          this.dialog.classList.add('animate-fadeOut')
          this.dialog.onanimationend = () => {
            this.dialog.remove()
          }
        };
      }
    }
  }
}