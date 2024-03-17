<?php
$this->body_class = 'Home-2';
$this->body_attributes = ['class' => $this->body_class, 'x-cloak' => '', 'x-data' => 'App'];
//$this->page_head []= '<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />';
//$this->page_footer []= '<script src="https://unpkg.com/aos@next/dist/aos.js"></script>';
//$this->page_footer []= '<script>AOS.init();</script>';
function TestPage() {
  $languages = ['Castellano', 'Inglés'];
  $versions = ['4DX', 'DIGITAL', 'VOSE', 'SCREENX VOSE'];
  $subtitles_langs = ['ca','es'];
  $audios = ['DIGITAL','DOLBY SURROUND'];
  $projections = ['Digital2D','3D','4DX','ScreenX'];
  $theatres = [];
  $count_theatres = count($theatres);
  $fake_title = (object) [
    'sinopsys' => '"Dune: Parte Dos" se adentrará en el viaje mítico de Paul Atreides cuando se une a Chani y a los Fremen en una guerra de venganza contra los conspiradores que destruyeron a su familia. Tendrá que elegir entre el amor de su vida y el destino del universo conocido mientras lucha por evitar un horrible futuro que solo él puede prever',
    'directors' => 'Denis Villeneuve',
    'writers' => 'Denis Villeneuve, Jon Spaihts, Frank Herbert',
    'year' => '2023',
    'countryReleaseDate' => '01/03/2024',
    'length' => '166 min.',
    'genres' => 'Acción, Aventura',
    'country' => 'Estados Unidos',
    'rated' => '16',
  ];
  $fake_actors = [
    (object)['imdbid' => 'nm3154303', 'name' => 'Timothée Chalamet'],
    (object)['imdbid' => 'nm3918035', 'name' => 'Zendaya'],
    (object)['imdbid' => 'nm0272581', 'name' => 'Rebecca Ferguson'],
    (object)['imdbid' => 'nm2581521', 'name' => 'Austin Butler'],
    (object)['imdbid' => 'nm0000849', 'name' => 'Javier Bardem'],
    (object)['imdbid' => 'nm0000982', 'name' => 'Josh Brolin'],
    (object)['imdbid' => 'nm6073955', 'name' => 'Florence Pugh'],
    (object)['imdbid' => 'nm0001745', 'name' => 'Stellan Skarsgard'],
  ];
  $imdbids = ['tt15239678','tt21692408','tt26658104',
  'tt11057302','tt15398776','tt14230458','tt18363072','tt21235248',
  'tt12801262','tt14539740','tt20561198'];
  ob_start(); ?>

  <div class="Wrapper" x-ref="Wrapper">
    <!--?= PreLoaders(TRUE) ?-->
    <?= MainMenu2() ?>
    <main class="MainGrid Section" x-ref="main_section" x-data="MovieGrid(<?= count($imdbids) ?>)" @mousemove="onMouseMove($event,'MainGrid')">
      <nav class="MainFilter" :class="{capsule:!ShowMainMenu}">
        <button class="active"><span>HOY</span><small>17</small></button>
        <button><span>ESTRENOS</span><small>45</small></button>
        <button><span>PRÓXIMAMENTE</span><small>150</small></button>
        <button @click="setSearch('open')">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
            <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
        </button>
        <input type="text" x-ref="search" placeholder="Buscar..." :class="{open:openSearch==='open'}" @keyup.enter="letsSearch()">
        <span class="search-tools" :class="{open:openSearch==='open'}">
          <button>
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" d="M 8.991 9 L 2.991 15 M 2.991 15 L 8.991 21 M 2.991 15 L 20.203 14.992 L 20.203 6.097 L 15 6.1" style="transform-origin: 11.995px 12px;"/>
              <g transform="matrix(0.730478, 0, 0, 0.730478, 2.645378, 21.637857)"/>
            </svg>
          </button>
          <button @click="setSearch('close')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
              <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </button>
        </span>
      </nav>
      <div class="MovieTitle">
        <span x-show="showingTitle" x-transition.opacity x-text="movie_title">EL TÍTULO</span>
      </div>
      <div class="MovieGrid" @scrollend="onScrollEnd">
        <div></div>
        <div class="_gap_"></div>
        <?php $i=0; foreach($imdbids as $imdb): $title = Site::$titles->$imdb??(object)['locale_name' => $imdb]; ?>
          <picture @click="onPosterClick(<?= $i ?>)">
            <img src="https://www.bizcochito.es/Films/Poster/<?= $imdb ?>.webp" alt="<?= $title->locale_name?:$title->name ?>">
            <button><span><?= __('COMPRAR') ?></span></button>
          </picture>
        <?php $i++; endforeach ?>
        <div class="_gap_"></div>
        <div></div>
      </div>
      <nav class="DirectionButtons">
        <div class="ping" x-ref="buttonsPing"></div>
        <div x-data="ToolTip">
          <button x-ref="button" @click="playTrailer()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
            </svg>
          </button>
          <small x-transition.opacity x-show="open" x-anchor.top="$refs.button">Ver trailer</small>
        </div>
        <div x-data="ToolTip">
          <button x-ref="button" @click="showFrames()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h1.5C5.496 19.5 6 18.996 6 18.375m-3.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-1.5A1.125 1.125 0 0 1 18 18.375M20.625 4.5H3.375m17.25 0c.621 0 1.125.504 1.125 1.125M20.625 4.5h-1.5C18.504 4.5 18 5.004 18 5.625m3.75 0v1.5c0 .621-.504 1.125-1.125 1.125M3.375 4.5c-.621 0-1.125.504-1.125 1.125M3.375 4.5h1.5C5.496 4.5 6 5.004 6 5.625m-3.75 0v1.5c0 .621.504 1.125 1.125 1.125m0 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m1.5-3.75C5.496 8.25 6 7.746 6 7.125v-1.5M4.875 8.25C5.496 8.25 6 8.754 6 9.375v1.5m0-5.25v5.25m0-5.25C6 5.004 6.504 4.5 7.125 4.5h9.75c.621 0 1.125.504 1.125 1.125m1.125 2.625h1.5m-1.5 0A1.125 1.125 0 0 1 18 7.125v-1.5m1.125 2.625c-.621 0-1.125.504-1.125 1.125v1.5m2.625-2.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125M18 5.625v5.25M7.125 12h9.75m-9.75 0A1.125 1.125 0 0 1 6 10.875M7.125 12C6.504 12 6 12.504 6 13.125m0-2.25C6 11.496 5.496 12 4.875 12M18 10.875c0 .621-.504 1.125-1.125 1.125M18 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m-12 5.25v-5.25m0 5.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125m-12 0v-1.5c0-.621-.504-1.125-1.125-1.125M18 18.375v-5.25m0 5.25v-1.5c0-.621.504-1.125 1.125-1.125M18 13.125v1.5c0 .621.504 1.125 1.125 1.125M18 13.125c0-.621.504-1.125 1.125-1.125M6 13.125v1.5c0 .621-.504 1.125-1.125 1.125M6 13.125C6 12.504 5.496 12 4.875 12m-1.5 0h1.5m-1.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M19.125 12h1.5m0 0c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h1.5m14.25 0h1.5" />
            </svg>
          </button>
          <small x-transition.opacity x-show="open" x-anchor.top="$refs.button">Ver fotogramas</small>
        </div>
        <div x-data="ToolTip">
          <button x-ref="button" @click="onScrollerGo(-1)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </button>
          <small x-transition.opacity x-show="open" x-anchor.top="$refs.button">Anterior</small>
        </div>
        <div x-data="ToolTip">
          <button x-ref="button" @click="onScrollerGo(1)">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </button>
          <small x-transition.opacity x-show="open" x-anchor.top="$refs.button">Siguiente</small>
        </div>
        <div x-data="ToolTip">
          <button x-ref="button" @click="showEventInfo()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
          </button>
          <small x-transition.opacity x-show="open" x-anchor.top="$refs.button">+INFO</small>
        </div>
        <div x-data="ToolTip">
          <button x-ref="button" @click="goShop()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
            </svg>
          </button>
          <small x-transition.opacity x-show="open" x-anchor.top="$refs.button">COMPRAR</small>
        </div>
      </nav>
      <div class="SecondaryFilter">
        <label><input type="checkbox"> 4DX</label>
        <label><input type="checkbox"> ScreenX</label>
        <label><input type="checkbox"> 3D</label>
        <label><input type="checkbox"> CAT</label>
        <label><input type="checkbox"> VOSE</label>
      </div>
      <article class="EventInfo" x-show="ShowInfo" x-transition.opacity.duration.300ms>
        <header x-show="showingTitle" x-transition.opacity x-text="movie_title">EL TÍTULO</header>
        <div class="col-span-2 flex flex-col gap-2" x-data="{current2:$persist('profile')}" x-cloak>
          <nav class="flex flex-row gap-0">
            <button @click="current2='sinopsys'" :class="current2=='sinopsys'?'bg-white/50':'bg-transparent'">
              <?= __('Sinopsis') ?>
            </button>
            <button @click="current2='profile'" :class="current2=='profile'?'bg-white/50':'bg-transparent'">
              <?= __('Ficha técnica') ?>
            </button>
            <button @click="current2='formats'" :class="current2=='formats'?'bg-white/50':'bg-transparent'">
              <?= __('Formatos') ?>
            </button>
            <button @click="current2='dates'" :class="current2=='dates'?'bg-white/50':'bg-transparent'">
              <?= __('Horarios') ?>
            </button>
            <?php if($count_theatres): ?>
              <button @click="current2='theatres'" :class="current2=='theatres'?'bg-white/50':'bg-transparent'">
                <?= __('Cines') ?>
              </button>
            <?php endif ?>
          </nav>
          <div class="relative h-full">
            <div class="absolute top-0 w-full profile px-3 space-y-4" x-transition.opacity x-show="current2=='sinopsys'">
              <p class="font-medium"><?= $fake_title->sinopsys ?></p>
              <section class="actors-grid flex flex-col gap-4">
                <header>
                  <span class="text-xl font-semibold"><?= __('Reparto') ?>:</span>
                </header>
                <div class="ActorsGrid">
                  <?php foreach(array_slice($fake_actors,0,8) as $actor): ?>
                    <figure class="w-full flex flex-col gap-3 items-center justify-start">
                      <picture>
                        <img src="https://www.bizcochito.es/Films/Actor/<?= $actor->imdbid ?>.webp" alt="" class="aspect-square rounded-lg bg-neutral-300 shadow-lg shadow-neutral-950">
                      </picture>
                      <figcaption class="text-center text-sm font-thin"><?= $actor->name ?></figcaption>
                    </figure>
                  <?php endforeach ?>
                </div>
              </section>
            </div>
            <div class="absolute top-0 w-full profile px-3" x-transition.opacity x-show="current2=='profile'">
              <dl class="title-profile">
                <dt><?= __('Dirección') ?>:</dt>
                <dd><?= $fake_title->directors ?></dd>
                <dt><?= __('Guión') ?>:</dt>
                <dd><?= $fake_title->writers ?></dd>
                <dt><?= __('Año') ?>:</dt>
                <dd><?= $fake_title->year ?></dd>
                <dt><?= __('Estreno') ?>:</dt>
                <dd><?= $fake_title->countryReleaseDate ?></dd>
                <dt><?= __('Duración') ?>:</dt>
                <dd><?= $fake_title->length ?> min.</dd>
                <dt><?= __('Género') ?>:</dt>
                <dd><?= $fake_title->genres ?></dd>
                <dt><?= __('País') ?>:</dt>
                <dd><?= $fake_title->country ?></dd>
                <dt><?= __('Clasificación') ?>:</dt>
                <dd><?= $fake_title->rated ?></dd>
              </dl>
            </div>
            <div class="absolute top-0 w-full formats px-3" x-transition.opacity x-show="current2=='formats'">
              <section class="list-formats space-y-4">
                <header class="flex flex-col items-start justify-between">
                  <span class="text-xl font-semibold"><?= __('Idiomas, audio y vídeo') ?>:</span>
                </header>
                <dl>
                  <dt><?= __('Idiomas') ?>:</dt>
                  <dd><?= implode(', ', array_map(fn($i) => "<a href=\"#\">$i</a>", $languages)) ?></dd>

                  <dt><?= __('Versiones') ?>:</dt>
                  <dd><?= implode(', ', array_map(fn($i) => "<a href=\"#\">$i</a>", $versions)) ?></dd>

                  <dt><?= __('Subtítulos') ?>:</dt>
                  <dd><?= implode(', ', array_map(fn($i) => "<a href=\"#\">$i</a>", $subtitles_langs)) ?></dd>

                  <dt><?= __('Audio') ?>:</dt>
                  <dd><?= implode(', ', array_map(fn($i) => "<a href=\"#\">$i</a>", $audios)) ?></dd>

                  <dt><?= __('Proyección') ?>:</dt>
                  <dd><?= implode(', ', array_map(fn($i) => "<a href=\"#\">$i</a>", $projections)) ?></dd>
                </dl>
              </section>
            </div>
            <?php if($count_theatres): ?>
              <div class="absolute top-0 w-full theatres px-3 py-2 rounded-xl bg-blur" x-transition.opacity x-show="current2=='theatres'">
                <section class="list-theatres">
                  <header class="flex flex-col items-start justify-between">
                    <span class="text-xl font-semibold"><?= __('Puedes verla en estos Cines') ?>:</span>
                  </header>
                  <div class="flex flex-row gap-5">
                    <?php foreach($theatres as $tht): ?>
                      <div><a href="#"><?= $tht->label ?></a></div>
                    <?php endforeach ?>
                  </div>
                </section>
              </div>
            <?php endif ?>
          </div>
        </div>
        <button class="CTA">
          <span><?= __('COMPRAR ENTRADAS') ?></span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
          </svg>
        </button>
      </article>
    </main>
    <?= JumboPromos() ?>
    <?= JumboFestivals() ?>
    <?= Jumbo4DX() ?>
    <?= JumboScreenX() ?>
    <?= JumboDolby() ?>
    <?= JumboSupport() ?>
    <footer class="Section">
      <?= Set([
        Financing(),
        FooterLead(),
        Colophon(),
      ])
      ?>
    </footer>
  </div>

  <picture class="GlobalLogo" @click="goToMain()"
    x-show="ShowingGlobalLogo" x-transition.opacity.duration.500ms>
    <img src="/brand/logo.svg" alt="Logo">
  </picture>
  <div class="GlobalConfig">
    <div x-data="ToolTip">
      <button x-ref="button" @click="goToSupport()" class="animate">
        <svg class="h-full" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M 21 12 C 21 18.928 13.5 23.258 7.5 19.794 C 4.715 18.187 3 15.215 3 12 C 3 5.072 10.5 0.742 16.5 4.206 C 19.285 5.813 21 8.785 21 12 Z" style="stroke: none;"/>
          <path d="M 21.75 12 C 21.75 15.672 19.644 18.845 16.875 20.444 C 14.106 22.042 10.337 22.225 7.125 20.444 C 4.203 18.699 2.25 15.402 2.25 12 C 2.25 8.328 4.356 5.155 7.125 3.556 C 9.894 1.958 13.663 1.775 16.875 3.556 C 19.797 5.301 21.75 8.598 21.75 12 Z M 16.125 4.856 C 13.337 3.173 10.356 3.423 7.875 4.856 C 5.394 6.288 3.75 8.744 3.75 12 C 3.75 15.028 5.227 17.675 7.875 19.144 C 10.663 20.827 13.644 20.577 16.125 19.144 C 18.606 17.712 20.25 15.256 20.25 12 C 20.25 8.972 18.773 6.325 16.125 4.856 Z" style="fill: rgba(255, 255, 255, 0.8); stroke: none;"/>
          <path d="M 17.066 11.124 C 17.066 8.034 14.668 5.934 12 5.934 C 9.36 5.934 6.934 7.989 6.934 11.158 C 6.596 11.349 6.371 11.709 6.371 12.126 L 6.371 13.251 C 6.371 13.871 6.878 14.377 7.497 14.377 L 8.06 14.377 L 8.06 10.944 C 8.06 8.765 9.822 7.004 12 7.004 C 14.178 7.004 15.94 8.765 15.94 10.944 L 15.94 15.503 L 11.437 15.503 L 11.437 16.629 L 15.94 16.629 C 16.559 16.629 17.066 16.122 17.066 15.503 L 17.066 14.253 C 17.398 14.079 17.629 13.736 17.629 13.33 L 17.629 12.036 C 17.629 11.642 17.398 11.298 17.066 11.124 Z" style="stroke: none; fill: currentColor;"/>
          <circle cx="10.311" cy="11.563" r="0.563" style="stroke: none; fill: currentColor;"/>
          <circle cx="13.689" cy="11.563" r="0.563" style="stroke: none; fill: currentColor;"/>
          <path d="M 15.377 10.454 C 15.107 8.85 13.711 7.623 12.028 7.623 C 10.323 7.623 8.488 9.036 8.634 11.253 C 10.024 10.685 11.071 9.446 11.37 7.938 C 12.107 9.418 13.621 10.437 15.377 10.454 Z" style="stroke: none; fill: currentColor;"/>
        </svg>
      </button>
      <small x-transition.opacity x-show="open" x-anchor.bottom="$refs.button">AYUDA</small>
    </div>
    <div x-data="ToolTip">
      <button x-ref="button" @click="openConfigDialog()">
        <svg class="h-full" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
        </svg>
      </button>
      <small x-transition.opacity x-show="open" x-anchor.bottom-end="$refs.button">CONFIGURACIÓN</small>
    </div>
  </div>
  <?php
  return optimize_html(ob_get_clean());
  }






