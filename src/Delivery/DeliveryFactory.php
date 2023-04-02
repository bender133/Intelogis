<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

use http\Exception\InvalidArgumentException;
use Root\Html\Logger\LoggerInterface;


class DeliveryFactory implements DeliveryFactoryInterface {

  const FAST_DELYVERY_URL = 'http://fast-delyvery.ru';

  const SLOW_DELYVERY_URL = 'http://slow-delyvery.ru';

  /**
   * @param array $data
   *
   * @return DeliveryInterface & LoggerInterface
   */
  public function getDelivery(array $data): DeliveryInterface {
    switch ($data['base_url']) {
      case self::FAST_DELYVERY_URL:
        return new FastDelivery($data['price'], $data['period'], $data['error']);
      case self::SLOW_DELYVERY_URL:
        return new SlowDelivery($data['base_price'], $data['date'], $data['coefficient'], $data['error']);
      default:
        throw new InvalidArgumentException('Неизвестный сервис доставки.');
    }
  }

}