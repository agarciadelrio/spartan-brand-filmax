<?php

trait RouterTrait {

  static function isLogin() {
    if(Router::$action=='login') {
      if($_SESSION['uuid']??FALSE) return;
      $page = new Page('home/login','Login');
      $page->render();
    }
  }

  static function isTitle() {
    $slug = '/'.Router::$action;
    foreach(Data::getTitleIndex() as $title) {
      if(in_array($slug, $title->slugs)) {
        $page = new Page('title/title','Title', $title);
        $page->render();
      }
    }
  }

  static function routing() {
    self::isAPI();
    self::isHome();
    self::isTitle();
    self::isTest();
    self::isLogin();
  }
}