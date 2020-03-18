<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */


namespace LiGuAngChUn\Bt;


/**
 * 系统监控
 * Class Control
 * @package LiGuAngChUn\Bt
 */
class Control extends Base
{
    /**
     * 获取监控信息
     * @param string $type 类型 GetCpuIo = CPU信息/内存 GetDiskIo = 磁盘IO GetNetWorkIo = 网络IO
     * @param string $start_time 开始时间
     * @param string $end_time 结束时间
     * @return mixed
     */
    public function getInfo($type = 'GetCpuIo', $start_time = '1584547201', $end_time = '1584547904')
    {
        $url = "/ajax?action={$type}&start={$start_time}&end={$end_time}";
        //请求面板接口
        $result = $this->HttpPostCookie($url, []);
        //解析JSON数据
        return json_decode($result, true);
    }
}
