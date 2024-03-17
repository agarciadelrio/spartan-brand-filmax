<?php
function MenuItem($item) {
  return "<a class=\"MenuItem\" href=\"#\">$item->label</a>";
}
function MainMenu() {
  return
    Div(['class' => 'MainMenu'],
      Set([
        Pic('/brand/logo.svg','Logo Filmax',['class' => 'MenuLogo']),
        Nav(
          ['class' => 'MenuItems', 'x-ref' => 'items'],
          Set(array_map('MenuItem', Site::getMenu('MobileMenu')->items)),
        ),
        <<<HTML
        <button class="MenuMobile" @click="toogleMenu(\$el)">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
        </button>
        HTML,
      ])
    );
}
function SecondaryMenu(){
  return Div(['class' => 'SecondaryMenu'],
    Nav(
      ['class' => 'MenuItems', 'x-ref' => 'subitems'],
      Set(array_map('MenuItem', Site::getMenu('MobileSubMenu')->items)),
    ),
  );
}
function MainGrid() {
  $slides = implode('', array_map(fn($i) => <<<HTML
    <li style="--opacity:65%;--scale:95%;"
      class="opacity-[var(--opacity)] scale-[var(--scale)] transision-all duration-300" data-imdbid="$i">
      <img class="aspect-poster bg-black shadow-md shadow-black" src="https://www.bizcochito.es/img/$i-en-pos.webp" alt="Poster"/>
    </li>
  HTML, array_slice(array_keys((array)Site::$titles),0,10)));
  return Div([
    'class' => "MainGrid GlideContainer",
  ],<<<HTML
    <div class="Elements">
      <menu>
        <ul class="flex items-center justify-center gap-5">
          <li><button class="underline text-shadow-sm shadow-black font-bold text-2xl text-white hover:underline">HOY</button></li>
          <li><button class="text-shadow-sm shadow-black font-bold text-2xl text-white hover:underline">ESTRENOS</button></li>
          <li><button class="text-shadow-sm shadow-black font-bold text-2xl text-white hover:underline">PRÓXIMAMENTE</button></li>
          <li><input class="filter-shadow-sm shadow-black px-3 py-1 rounded-full" type="search" placeholder="buscar..."></li>
        </ul>
      </menu>
      <div class="min-h-10">
        <div class="relative" x-cloak
          x-data="GlideJs({type: 'slider',focusAt: 'center', startAt: 0, perView: 5, autoplay: 3000,})">
          <div data-glide-el="track">
            <ul class="glide__slides">$slides</ul>
          </div>
          <div data-glide-el="controls">
            <button class="absolute top-0 bottom-0 left-0 px-1" data-glide-dir="<">
              <svg class="w-10 h-10 p-1 rounded-full bg-white/25 hover:bg-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
              </svg>
            </button>
          </div>
          <div data-glide-el="controls">
            <button class="absolute top-0 bottom-0 right-0 px-1" data-glide-dir=">">
              <svg class="w-10 h-10 p-1 rounded-full bg-white/25 hover:bg-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <menu>
        <ul class="flex items-center justify-center gap-5">
          <li><label><input type="checkbox"> <span class="font-semibold text-xl select-none text-shadow-sm shadow-black text-white">4DX</span></label></li>
          <li><label><input type="checkbox"> <span class="font-semibold text-xl select-none text-shadow-sm shadow-black text-white">ScreenX</span></label></li>
          <li><label><input type="checkbox"> <span class="font-semibold text-xl select-none text-shadow-sm shadow-black text-white">3D</span></label></li>
          <li><label><input type="checkbox"> <span class="font-semibold text-xl select-none text-shadow-sm shadow-black text-white">CAT</span></label></li>
          <li><label><input type="checkbox"> <span class="font-semibold text-xl select-none text-shadow-sm shadow-black text-white">VOSE</span></label></li>
        </ul>
      </menu>
    </div>
  HTML);
  //{type: 'slider', focusAt: 'center', perView: 5}
}
function Financing() {
  return <<<HTML
  <figure class="container "><img src="/brand/assets/img/financing.webp" alt="Financing" class="w-full"></figure>
  HTML;
}
function FooterLead() {
  return <<<HTML
    <div class="py-5 bg-[--footer-bg] text-[--footer-text]">
      <div class="container">
        <div class="flex flex-col sm:flex-row">
          <div class="w-full sm:w-1/3 text-left">
            <ul class="list-unstyled">
              <li style="padding-top:0.4rem; padding-bottom: 0.4rem;">
                <a href="/servicios/trabaja-con-nosotros">Trabaja con nosotros</a>
              </li>
              <li style="padding-top:0.4rem; padding-bottom: 0.4rem;">
                <a href="https://filmax.admit-one.eu/?p=schemepurchase" target="_blank" rel="noopener">Únete al programa de fidelidad</a>
              </li>
              <li style="padding-top:0.4rem; padding-bottom: 0.4rem;">
                <a href="/eventos">Espacio para eventos</a>
              </li>
            </ul>
            <section>
              <header>Síguenos</header>
              <div class="social">
                <a aria-label="Ir a Facebook" href="https://www.facebook.com/CinesFilmaxGranvia/"><i class="fab fa-2x fa-facebook m-1"></i></a>
                <a aria-label="Ir a Instagram" href="https://www.instagram.com/cinesfilmaxgranvia/"><i class="fab fa-2x fa-instagram m-1"></i></a>
                <a aria-label="Ir a X" href="https://twitter.com/CinesFilmax"><i class="fa-brands fa-2x fa-x-twitter m-1"></i></a>
                <a aria-label="Ir a YouTube" href="https://www.youtube.com/@cinesfilmaxgranvia2703"><i class="fab fa-2x fa-youtube m-1"></i></a>
              </div>
            </section>
          </div>
          <div class="w-full sm:w-1/3">
            <ul class="list-unstyled">
              <li>
                <form action="/servicios/newsletter" method="POST">
                  <div class="input-group">
                    <label for="email">Suscríbete a nuestro Newsletter y mantente al día de todos nuestros eventos y novedades.</label>
                    <input class="form-control" type="email" id="email" name="email" required="required" placeholder="e-mail">
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">Suscríbeme</button>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
          </div>
          <div class="w-full sm:w-1/3 flex flex-col justify-end">
            <ul class="list-unstyled flex flex-col justify-end">
              <li class="text-right">
                <a href="https://www.cinesfilmax.com/cartelera">Toda la programación</a>
              </li>
              <li class="text-right">
                <a href="https://www.cinesfilmax.com/proximamente">Próximamente</a>
              </li>
              <li class="text-right">
                <a href="/4dx">4DX</a>
              </li>
              <li class="text-right">
                <a href="/screenx">Screen X</a>
              </li>
            </ul>
            <div class="text-right">
              <strong>Cines Filmax Gran Vía 4DX</strong>
              <div>2024 L'Hospitalet de Llobregat</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  HTML;
}
function Colophon() {
  return <<<HTML
    <div class="colophon py-5 bg-[--colophon-bg] text-[--colophon-text]">
      <div class="container">
        <div class="flex flex-row">
          <div class="w-1/2 text-left">
            <a class="mx-1" href="https://www.cinesfilmax.com/politica-de-privacidad">Política de privacidad</a>
            <a class="mx-1" href="https://www.cinesfilmax.com/politica-de-cookies">Política de cookies</a>
            <a class="mx-1" href="https://www.cinesfilmax.com/terminos-y-condiciones">Términos y condiciones</a>
          </div>
          <div class="w-1/2 text-right">
            <span class="muted credit">2024 | <a href="https://www.a1dataservices.eu/" rel="noopener">a1Dataservices</a> </span>
          </div>
        </div>
      </div>
    </div>
  HTML;
}
function MainFooter() {
  return Footer([],Set([
    Financing(),
    FooterLead(),
    Colophon(),
  ]));
}
function QuickShop() {
  return Div(['class' => 'hidden'],'QuickShop');
}
function PreLoaders($fake=false) {
  $imdbids = str_replace('"',"'",json_encode(array_keys((array)Site::$titles)));
  $fake = $fake?'true':'false';
  //toJSON($imdbids);
  return <<<HTML
  <dialog open class="z-50 fixed top-0 left-0 w-screen h-screen bg-black text-white">
    <div class="w-screen h-screen flex flex-col gap-8 items-center justify-center animate-fadeIn">
      <picture x-ref="picture">
        <img src="/brand/logo.svg" alt="Logo" class="h-16">
      </picture>
      <progress x-data="Preload($imdbids,$fake)" class="h-px appearance-none bg-white text-white" value="0" max="100"> </progress>
    </div>
  </dialog>
  HTML;
}
function SmoothSrollBounceIcon() {
  return <<<HTML
    <div class="SmoothScroll" x-data="SmoothScroll" @mouseenter.once="onMouseEnter">
      <picture class="animate-bounce bg-white text-black rounded-full p-3 grid place-content-center shadow shadow-black/50">
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
        </svg>
      </picture>
    </div>
  HTML;
}
function MainMenu2() {
  return <<<HTML
    <div class="MainMenuPhantom" x-show="!ShowMainMenu" @mousemove="onMouseMovePhantom(\$el)"></div>
    <header class="MainMenu snap-start" x-show="ShowMainMenu" x-transition.opacity.duration.300ms x-data="MainMenu">
      <picture class="Logo">
        <img src="/brand/logo.svg" alt="Logo">
      </picture>
      <nav class="MenuNav">
        <a href="#">INICIO</a>
        <a href="#">PROMOCIONES</a>
        <a href="#">EMPRESAS</a>
        <a href="#">CARTELERA</a>
        <a href="#">4DX</a>
        <a href="#">SCREENX</a>
        <a href="#">Sostenibilidad</a>
      </nav>
      <button class="MenuButton" @click="toogleMenu(\$el)">
        <svg class="h-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </header>
  HTML;
}
function JumboPromos() {
  return <<<HTML
    <section class="Section bg-gradient-to-br from-black to-green-950">
      <div class="flex flex-col gap-10 items-center justify-center h-full">
        <h2 class="text-6xl font-black">PROMOS</h2>
        <picture class="h-28 transition-all duration-1000" x-data="{show:false,get klass(){ return this.show?'opacity-100 translate-y-0':'opacity-0 translate-y-10'}}"
          :class="klass" x-intersect:enter="show=true" x-intersect:leave="show=false">
          <img class="h-full" src="/brand/assets/logos/promos.svg" alt="Logo promos" />
        </picture>
      </div>
    </section>
  HTML;
}
function JumboFestivals() {
  return <<<HTML
    <section class="Section bg-gradient-to-br from-black to-cyan-950">
      <div class="flex flex-col gap-10 items-center justify-center h-full">
        <h2 class="text-6xl font-black">FESTIVALS</h2>
        <picture class="h-28 transition-all duration-1000" x-data="{show:false,get klass(){ return this.show?'opacity-100 translate-y-0':'opacity-0 translate-y-10'}}"
          :class="klass" x-intersect:enter="show=true" x-intersect:leave="show=false">
          <img class="h-full" src="/brand/assets/logos/festivals.svg" alt="Logo festivals" />
        </picture>
      </div>
    </section>
  HTML;
}
function Jumbo4DX() {
  return <<<HTML
    <section class="Section bg-gradient-to-br from-black to-purple-950">
      <div class="flex flex-col gap-10 items-center justify-center h-full">
        <h2 class="text-6xl font-black">4DX</h2>
        <picture class="h-28 transition-all duration-1000" x-data="{show:false,get klass(){ return this.show?'opacity-100 translate-y-0':'opacity-0 translate-y-10'}}"
          :class="klass" x-intersect:enter="show=true" x-intersect:leave="show=false">
          <img class="h-full" src="/brand/assets/logos/4dx.svg" alt="Logo 4DX" />
        </picture>
      </div>
    </section>
  HTML;
}
function JumboScreenX() {
  return <<<HTML
    <section class="Section bg-gradient-to-br from-black to-blue-950">
      <div class="flex flex-col gap-10 items-center justify-center h-full">
        <h2 class="text-6xl font-black">ScreenX</h2>
        <picture class="h-28 transition-all duration-1000" x-data="{show:false,get klass(){ return this.show?'opacity-100 translate-y-0':'opacity-0 translate-y-10'}}"
          :class="klass" x-intersect:enter="show=true" x-intersect:leave="show=false">
          <img class="h-full" src="/brand/assets/logos/screenx.svg" alt="Logo ScreenX" />
        </picture>
      </div>
    </section>
  HTML;
}
function JumboSupport() {
  $back = __('Ir al inicio');
  return <<<HTML
    <section x-ref="supportSection" class="Section bg-gradient-to-br from-black to-red-950">
      <div class="flex flex-col gap-10 items-center justify-center h-full">
        <h2 class="text-6xl font-black">ATENCIÓN AL USUARIO</h2>
        <picture class="h-28 transition-all duration-1000" x-data="{show:false,get klass(){ return this.show?'opacity-100 translate-y-0':'opacity-0 translate-y-10'}}"
          :class="klass" x-intersect:enter="show=true" x-intersect:leave="show=false">
          <svg class="h-full" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" d="M 21 12 C 21 18.928 13.5 23.258 7.5 19.794 C 4.715 18.187 3 15.215 3 12 C 3 5.072 10.5 0.742 16.5 4.206 C 19.285 5.813 21 8.785 21 12 Z" style="stroke: none;"/>
            <path d="M 21.75 12 C 21.75 15.672 19.644 18.845 16.875 20.444 C 14.106 22.042 10.337 22.225 7.125 20.444 C 4.203 18.699 2.25 15.402 2.25 12 C 2.25 8.328 4.356 5.155 7.125 3.556 C 9.894 1.958 13.663 1.775 16.875 3.556 C 19.797 5.301 21.75 8.598 21.75 12 Z M 16.125 4.856 C 13.337 3.173 10.356 3.423 7.875 4.856 C 5.394 6.288 3.75 8.744 3.75 12 C 3.75 15.028 5.227 17.675 7.875 19.144 C 10.663 20.827 13.644 20.577 16.125 19.144 C 18.606 17.712 20.25 15.256 20.25 12 C 20.25 8.972 18.773 6.325 16.125 4.856 Z" style="fill: rgba(255, 255, 255, 0.8); stroke: none;"/>
            <path d="M 17.066 11.124 C 17.066 8.034 14.668 5.934 12 5.934 C 9.36 5.934 6.934 7.989 6.934 11.158 C 6.596 11.349 6.371 11.709 6.371 12.126 L 6.371 13.251 C 6.371 13.871 6.878 14.377 7.497 14.377 L 8.06 14.377 L 8.06 10.944 C 8.06 8.765 9.822 7.004 12 7.004 C 14.178 7.004 15.94 8.765 15.94 10.944 L 15.94 15.503 L 11.437 15.503 L 11.437 16.629 L 15.94 16.629 C 16.559 16.629 17.066 16.122 17.066 15.503 L 17.066 14.253 C 17.398 14.079 17.629 13.736 17.629 13.33 L 17.629 12.036 C 17.629 11.642 17.398 11.298 17.066 11.124 Z" style="stroke: none; fill: currentColor;"/>
            <circle cx="10.311" cy="11.563" r="0.563" style="stroke: none; fill: currentColor;"/>
            <circle cx="13.689" cy="11.563" r="0.563" style="stroke: none; fill: currentColor;"/>
            <path d="M 15.377 10.454 C 15.107 8.85 13.711 7.623 12.028 7.623 C 10.323 7.623 8.488 9.036 8.634 11.253 C 10.024 10.685 11.071 9.446 11.37 7.938 C 12.107 9.418 13.621 10.437 15.377 10.454 Z" style="stroke: none; fill: currentColor;"/>
          </svg>
        </picture>
        <button class="text-xl hover:underline" @click="goToMain">$back</button>
      </div>
    </section>
  HTML;
}
function JumboDolby() {
  return <<<HTML
    <section class="Section bg-gradient-to-br from-black to-red-950">
      <div class="flex flex-col gap-10 items-center justify-center h-full">
        <h2 class="text-6xl font-black">DOLBY</h2>
        <picture class="h-28 transition-all duration-1000" x-data="{show:false,get klass(){ return this.show?'opacity-100 translate-y-0':'opacity-0 translate-y-10'}}"
          :class="klass" x-intersect:enter="show=true" x-intersect:leave="show=false">
          <img class="h-full" src="/brand/assets/logos/dolby.svg" alt="Logo dolby" />
        </picture>
      </div>
    </section>
  HTML;
}