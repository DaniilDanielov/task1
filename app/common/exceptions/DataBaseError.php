<?php

namespace common\exceptions;

use yii\web\HttpException;

class DataBaseError extends HttpException
{
    public function __construct($message = null, $code = 0)
    {
        parent::__construct(400, $message, $code);
    }
}