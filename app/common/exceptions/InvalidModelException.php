<?php

namespace common\exceptions;

use yii\base\Model;
use yii\helpers\Json;
use yii\web\HttpException;

class InvalidModelException extends HttpException
{
    public Model $model;

    public function __construct(Model $model, $message = null, $code = 0)
    {
        $this->model = $model;
        $message     = $message ?? $this->getDefaultMessage();
        parent::__construct(400, $message, $code);
    }

    public function getDefaultMessage(): string
    {
        $error = Json::errorSummary($this->model);
        $class = get_class($this->model);

        $message = implode("\n", array_filter([
            "Model {$class} is invalid:",
            $error,
        ]));

        return $message;
    }
}