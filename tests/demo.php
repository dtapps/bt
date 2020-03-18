<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


use LiGuAngChUn\Bt\Firewall;
use LiGuAngChUn\Bt\Soft;

require_once '../vendor/autoload.php';

$config = [
    'key' => 'x0m1NM1yumUVTyzLrpoJ4tgbVAZFzWVj',
    'panel' => 'http://127.0.0.1:8888'
];

$firewall = new Firewall($config);
$soft = new Soft($config);

var_dump('防火墙：', json_encode($firewall->getList()));

var_dump('面板日志：', json_encode($firewall->getLog()));

var_dump('插件列表：', json_encode($soft->getList()));
