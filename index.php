<?php
session_start();
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Parsing');
$app->initLayout('Centered');
$html=file_get_contents('https://www.elkor.lv/rus/elektronika-1/speles/datorspeles/?game_age_restriction=5305');
phpQuery::newDocument($html);
$title = pq('#products-grid-table')->text();
$title = explode('Компьютерная игра',$title);
foreach ($title as $game ) {
  // code...

$echo = str_replace ("Добавить в корзину","",$game);
$echo = str_replace("Платеж в месяц","",$echo);
echo $echo;
}













phpQuery::unloadDocuments($html);
