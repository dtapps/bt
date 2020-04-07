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
 * 计划任务
 * Class CronTab
 * @package dtApp\Bt
 */
class CronTab extends BaseBt
{
    /**
     * 获取网站列表
     * @return mixed
     */
    public function getDataList()
    {
        $url = '/crontab?action=GetDataList';
        $p_data['type'] = 'sites';
        //请求面板接口
        $result = $this->HttpPostCookie($url, $p_data);
        //解析JSON数据
        $data = json_decode($result, true);
        return [
            'data' => $data['data'],
            'orderOpt' => $data['orderOpt']
        ];
    }
}
