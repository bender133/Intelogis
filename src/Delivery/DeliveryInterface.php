<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

interface DeliveryInterface {

  public function getDeliveryInformation(): array;

  public function delyveryCoast(): float;

  public function delyveryDate(): string;

}