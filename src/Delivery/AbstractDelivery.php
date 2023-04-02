<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

use Root\Html\Logger\LoggerInterface;

/**
 * @property string $error
 */
abstract class AbstractDelivery implements DeliveryInterface, LoggerInterface {

  public function getDeliveryInformation(): array {
    return
      [
        'price' => $this->delyveryCoast(),
        'date' => $this->delyveryDate(),
        'error' => $this->getErrorMessage(),
      ];
  }

  public function getErrorMessage(): string {
    return $this->error;
  }

  public function setErrorMessage(string $error) {
    $this->error = $error;
  }

}