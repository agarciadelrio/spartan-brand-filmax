<?php
$this->body_class = 'Home-2';
$this->body_attributes = ['class' => $this->body_class, 'x-cloak' => '', 'x-data' => 'App'];
function TestPage() {
  $imdbids = ['tt15239678','tt21692408','tt26658104',
  'tt11057302','tt15398776','tt14230458','tt18363072','tt21235248',
  'tt12801262','tt14539740','tt20561198'];
  ob_start(); ?>
  <div class="Wrapper">
    <header class="MainMenu snap-start" x-data="MainMenu">
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
      <button class="MenuButton" @click="toogleMenu($el)">
        <svg class="h-1/2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
      </button>
    </header>
    <main class="MainGrid Section" x-data="MovieGrid(<?= count($imdbids) ?>)">
      <nav class="MainFilter">
        <button class="active"><span>HOY</span><small>17</small></button>
        <button><span>ESTRENOS</span><small>45</small></button>
        <button><span>PRÓXIMAMENTE</span><small>150</small></button>
      </nav>
      <div class="MovieTitle absolute w-full top-32 flex items-center justify-center"
        x-show="showingTitle" x-transition.opacity>
        <span class="text-4xl drop-shadow font-bold" x-text="movie_title">EL TÍTULO</span>
      </div>
      <div class="MovieGrid" @scrollend="onScrollEnd">
        <div></div>
        <div class="_gap_"></div>
        <?php foreach($imdbids as $imdb): $title = Site::$titles->$imdb??(object)['locale_name' => $imdb]; ?>
          <picture>
            <img src="https://www.bizcochito.es/Films/Poster/<?= $imdb ?>.webp" alt="<?= $title->locale_name?:$title->name ?>">
          </picture>
        <?php endforeach ?>
        <div class="_gap_"></div>
        <div></div>
      </div>
      <nav class="DirectionButtons">
        <button @click="onScrollerGo(-1)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
        </button>
        <button @click="onScrollerGo(1)">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
        </button>
      </nav>
      <div class="SecondaryFilter">
        <label><input type="checkbox"> 4DX</label>
        <label><input type="checkbox"> ScreenX</label>
        <label><input type="checkbox"> 3D</label>
        <label><input type="checkbox"> CAT</label>
        <label><input type="checkbox"> VOSE</label>
      </div>
      <div class="SmoothScroll" x-data="SmoothScroll" @mouseenter.once="onMouseEnter">
        <picture class="animate-bounce bg-white text-black rounded-full p-3 grid place-content-center shadow shadow-black/50">
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 5.25 7.5 7.5 7.5-7.5m-15 6 7.5 7.5 7.5-7.5" />
          </svg>
        </picture>
      </div>
    </main>
    <section class="Section bg-green-950">
      <h2>PROMOCIONES</h2>
    </section>
    <section class="Section bg-blue-950">
      <h2>FESTIVAL</h2>
    </section>
  </div>
  <?php
  return optimize_html(ob_get_clean());
  }