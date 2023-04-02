<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

interface DeliveryInterface {

  public function getDeliveryInformation(): array;

  public function deliveryCoast(): float;

  public function deliveryDate(): string;

}