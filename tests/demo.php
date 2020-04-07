<?php

// +----------------------------------------------------------------------
// | 宝塔PHP扩展包
// +----------------------------------------------------------------------
// | 版权所有 2017~2020 [ https://www.dtapp.net ]
// +----------------------------------------------------------------------
// | 官方网站: https://gitee.com/liguangchun/bt
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | gitee 仓库地址 ：https://gitee.com/liguangchun/bt
// | github 仓库地址 ：https://github.com/GC0202/bt
// | Packagist 地址 ：https://packagist.org/packages/liguangchun/bt
// +----------------------------------------------------------------------

use dtApp\Bt\BtException;
use dtApp\Bt\Firewall;
use dtApp\Bt\Soft;

require_once '../vendor/autoload.php';

$config = [
    'key' => 'x0m1NM1yumUVTyzLrpoJ4tgbVAZFzWVj',
    'panel' => 'http://127.0.0.1:8888'
];

try {
    $firewall = new Firewall($config);
    var_dump('防火墙：', json_encode($firewall->getList()));
    var_dump('面板日志：', json_encode($firewall->getLog()));
} catch (BtException $e) {
    var_dump($e->getMessage());
}
try {
    $soft = new Soft($config);
    var_dump('插件列表：', json_encode($soft->getList()));
} catch (BtException $e) {
    var_dump($e->getMessage());
}


