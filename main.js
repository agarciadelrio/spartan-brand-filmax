import '../../../node_modules/@glidejs/glide/src/assets/sass/glide.core.scss';
import '../../../node_modules/@glidejs/glide/src/assets/sass/glide.theme.scss';
import './scss/brand.scss';
//import 'aos/dist/aos.css';
//import AOS from 'aos';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect'
import persist from '@alpinejs/persist'
import anchor from '@alpinejs/anchor'
import { GlideJs } from './components/filmax_glide_js.js';
import { Preload } from './components/preload.js';
import { MainMenu } from './components/main_menu.js';
import { App } from './components/app.js';
import { SmoothScroll } from './components/smooth_scroll.js';
import { MovieGrid } from './components/movie_grid.js';
import { ToolTip } from './components/tool_tip.js';
//AOS.init();
Alpine.plugin(persist)
Alpine.plugin(intersect)
Alpine.plugin(anchor)
Alpine.data('ToolTip', ToolTip)
Alpine.data('Preload', Preload)
Alpine.data('MainMenu', MainMenu)
Alpine.data('GlideJs', GlideJs)
Alpine.data('SmoothScroll', SmoothScroll)
Alpine.data('MovieGrid', MovieGrid)
Alpine.data('App', App)
Alpine.start()
