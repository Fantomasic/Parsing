<?php
session_start();
require 'vendor/autoload.php';
require 'сonnection.php';
$app = new \atk4\ui\App('Parsing');
$app->initLayout('Centered');
$html=file_get_contents('https://www.elkor.lv/rus/elektronika-1/speles/datorspeles/?game_age_restriction=5305');
phpQuery::newDocument($html);
$title = pq('#products-grid-table')->text();
$title = explode('Компьютерная игра',$title);
foreach ($title as $game) {
    $money = '';
    $echo = str_replace("Добавить в корзину"," ",$game);
    $echo = str_replace("Платёж в месяц","",$echo);
    $echo = str_replace(",",".",$echo);
    $echo = str_replace(' €',"",$echo);
    if ($echo !== " ") {
      for ($i = strlen($echo); $i >= 0; $i--){
          if (is_numeric($echo[$i]) OR $echo[$i]=='.') {
            $money = $echo[$i].$money;
          }
          if ((10<$money and $money<100) AND $echo[$i-1] !== '.') {
            break;
          }
      }
      $echo = str_replace($money,"",$echo);
      $app->add(['Label',$echo,'big blue']);
      $app->add(['Label',$money.' €','small red']);
      $app->add(['ui'=>"hidden divider"]);
      $g=new Games ($db);
      $g['name']=$echo;
      $g['price']=$money;
      $g->save();

    }
}
phpQuery::unloadDocuments($html);
