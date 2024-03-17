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
function PreLoaders() {
  $imdbids = str_replace('"',"'",json_encode(array_keys((array)Site::$titles)));
  //toJSON($imdbids);
  return <<<HTML
  <dialog open class="z-50 fixed top-0 left-0 w-screen h-screen bg-black text-white">
    <div class="w-screen h-screen flex flex-col gap-8 items-center justify-center animate-fadeIn">
      <picture>
        <img src="/brand/logo.svg" alt="Logo" class="h-16">
      </picture>
      <progress x-data="Preload($imdbids)" class="h-px appearance-none bg-white text-white" value="0" max="100"> </progress>
    </div>
  </dialog>
  HTML;
}