<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

use http\Exception\InvalidArgumentException;
use Root\Html\Logger\LoggerInterface;


class DeliveryFactory implements DeliveryFactoryInterface {

  const FAST_DELIVERY_URL = 'http://fast-delivery.ru';

  const SLOW_DELIVERY_URL = 'http://slow-delivery.ru';

  /**
   * @param array $data
   *
   * @return DeliveryInterface & LoggerInterface
   */
  public function getDelivery(array $data): DeliveryInterface {
    switch ($data['base_url']) {
      case self::FAST_DELIVERY_URL:
        return new FastDelivery($data['price'], $data['period'], $data['error']);
      case self::SLOW_DELIVERY_URL:
        return new SlowDelivery($data['base_price'], $data['date'], $data['coefficient'], $data['error']);
      default:
        throw new InvalidArgumentException('Неизвестный сервис доставки.');
    }
  }

}