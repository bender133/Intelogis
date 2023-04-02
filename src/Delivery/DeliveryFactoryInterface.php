<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

use Root\Html\Logger\LoggerInterface;

interface DeliveryFactoryInterface {

  /**
   * @param array $data
   *
   * @return DeliveryInterface & LoggerInterface
   */
  public function getDelivery(array $data): DeliveryInterface;

}