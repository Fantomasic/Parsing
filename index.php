<?php
session_start();
require 'vendor/autoload.php';
$app = new \atk4\ui\App('Parsing');
$app->initLayout('Centered');
$html=file_get_contents('https://www.elkor.lv/rus/elektronika-1/speles/datorspeles/?game_age_restriction=5305');
phpQuery::newDocument($html);
$title = pq('#products-grid-table')->text();
var_dump($title);
$title = explode('Компьютерная игра',$title);
















phpQuery::unloadDocuments($html);
