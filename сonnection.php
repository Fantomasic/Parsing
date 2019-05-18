<?php
$db = new
\atk4\data\Persistence_SQL('mysql:dbname=heroku_deabe0130a943ba;host=eu-cdbr-west-02.cleardb.net', 'b118774f4919d0', '6f6bc49f');
class Games extends \atk4\data\Model {
public $table = 'games';
function init() {
parent::init();
$this->addFields(['name','price']);
}
}
mysql://b118774f4919d0:6f6bc49f@eu-cdbr-west-02.cleardb.net/heroku_deabe0130a943ba?reconnect=true
