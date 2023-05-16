<?php

namespace backend\controllers;

use backend\models\configModels\AddItemConfig;
use backend\models\configModels\PopularCookConfig;
use common\exceptions\InvalidModelException;
use common\repository\CheckRepositoryInterface;
use common\repository\CookRepositoryInterface;
use yii\filters\ContentNegotiator;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\web\Response;

class ApiController extends Controller
{
    public function __construct(
        $id,
        $module,
        private CheckRepositoryInterface $checkRepository,
        private CookRepositoryInterface $cookRepository,
        $config = [],
    ) {
        parent::__construct($id, $module, $config);
    }

    public function behaviors(): array
    {
        return [
            [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'languages' => [
                    'en',
                    'ru',
                ],
            ],
        ];
    }

    public function actionOpenCheck(): array
    {
        $createdCheck = $this->checkRepository->createCheck();

        return ['checkId' => $createdCheck->id];
    }

    /**
     * @return array
     *
     * @throws InvalidModelException
     */
    public function actionAddDishToCheck(): array
    {
        $config = new AddItemConfig();
        $config->load($this->getParams(),'');

        if (!$config->validate()) {
            throw new InvalidModelException($config);
        }

        $createdCheck = $this->checkRepository->addMenuItemToCheck($config);

        return ['checkId' => $createdCheck->id];
    }

    /**
     * @return array
     *
     * @throws InvalidModelException
     */
    public function actionGetPopularCook(): array
    {
        $config = new PopularCookConfig();
        $config->load($this->getParams(),'');

        if (!$config->validate()) {
            throw new InvalidModelException($config);
        }

        return $this->cookRepository->getPopularCook($config);
    }

    public function getParams(): array
    {
        return ArrayHelper::merge($this->request->getBodyParams(), $this->request->getQueryParams());
    }
}
