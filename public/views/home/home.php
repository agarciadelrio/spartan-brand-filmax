<?php
if(isset($_GET['json'])) {
  toJSON([
    Site::$titles,
    Site::$data
  ]);
  //toJSON(Data::getEvents());
}
$this->page_title = 'FILMAX';
$this->body_class = 'relative Home';
$this->logo = '/brand/assets/icons/icon.svg';
function HomePage() {
  return Set([
    //PreLoaders(),
    Div(['x-data' => 'MainMenu'], Set([
      MainMenu(),
      SecondaryMenu(),
    ])),
    MainGrid(),
    MainFooter(),
    //QuickShop(),
  ]);
}