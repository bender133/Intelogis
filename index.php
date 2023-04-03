<?php

declare(strict_types=1);

use Root\Html\Delivery\DeliveryFactory;
use Root\Html\Filter\BaseUrlFilter;
use Root\Html\Preparer\DeliveryPreparer;
use Root\Html\Presenter\DeliveryPresenter;
use Root\Html\Serializer\JsonSerializer;

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

//todo: Предполагается что данные приходят из внешнего источника (брокер/база/API). Как это происходит решено упустить, так как это вне контекста задачи

$deliveriesJson = <<<JSON
[
    {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "7383400000000",
    "targetKladr": "5318300000000",
    "weight": 15.02,
    "price": 3276.99,
    "period": 3,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "4642900000000",
    "targetKladr": "7810700000000",
    "weight": 48.06,
    "price": 4191.54,
    "period": 6,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "1700000100000",
    "targetKladr": "5246300000000",
    "weight": 32.14,
    "price": 1827.64,
    "period": 5,
    "error": "Invalid input data"
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "7013700000000",
    "targetKladr": "1431200000000",
    "weight": 23.55,
    "price": 2410.85,
    "period": 4,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "5200700000000",
    "targetKladr": "7600000400000",
    "weight": 17.31,
    "price": 4712.79,
    "period": 6,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "3128200000000",
    "targetKladr": "2600000600000",
    "weight": 39.43,
    "price": 3069.38,
    "period": 7,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "6902200000000",
    "targetKladr": "1013800000000",
    "weight": 7.61,
    "price": 1800.92,
    "period": 3,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "7013700000000",
    "targetKladr": "5832000000000",
    "weight": 5.15,
    "price": 1031.38,
    "period": 2,
    "error": ""
  },
  {
    "base_url": "http://fast-delivery.ru",
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "price": 1352.02,
    "period": 4,
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.12,
    "date": "2023-04-08",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.35,
    "date": "2023-04-07",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.18,
    "date": "2023-04-09",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.02,
    "date": "2023-04-06",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.45,
    "date": "2023-04-07",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.28,
    "date": "2023-04-10",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.8,
    "coefficient": 1.21,
    "date": "2023-04-06",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.17,
    "date": "2023-04-11",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.09,
    "date": "2023-04-08",
    "error": ""
  },
  {
    "base_url": "http://slow-delivery.ru",
    "base_price": 150,
    "sourceKladr": "4725700000000",
    "targetKladr": "7720400000000",
    "weight": 27.87,
    "coefficient": 1.32,
    "date": "2023-04-09",
    "error": "Undefined value"
  }
]
JSON;

$deliveries = json_decode($deliveriesJson, TRUE);
$filter = new BaseUrlFilter();
$filter->setCriteria(['http://slow-delivery.ru']);
$factory = new DeliveryFactory();
$preparer = new DeliveryPreparer($factory);
$preparerFilter = new DeliveryPreparer($factory, $filter);

$result = new DeliveryPresenter(new JsonSerializer(), $preparer); // все транспортные
$resultFilter = new DeliveryPresenter(new JsonSerializer(), $preparerFilter); // одна, либо тут любые выбранные

header('Content-Type: application/json');

//echo $result->present($deliveries);
echo $resultFilter->present($deliveries);
