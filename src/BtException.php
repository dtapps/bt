<?php
/**
 * (c) Chaim <gc@dtapp.net>
 */

namespace LiGuAngChUn\Bt;

/**
 * 错误处理
 * Class BtException
 * @package LiGuAngChUn\Bt
 */
class BtException extends \Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}
