<?php

namespace DtApp\Notice\DingTalk\exception;

/**
 * 错误处理
 * Class Exception
 * @package DtApp\Notice\DingTalk\exception
 */
class Exception extends \Exception
{
    public function errorMessage()
    {
        return $this->getMessage();
    }
}
