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

namespace dtApp\Bt;

/**
 * 设置
 * Class Setup
 * @package dtApp\Bt
 */
class Setup extends BaseBt
{
    /**
     * 获取消息通道
     * @return mixed
     */
    public function getNews()
    {
        $url = '/config?action=get_settings';
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }
}
