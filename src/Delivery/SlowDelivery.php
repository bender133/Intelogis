<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

class SlowDelivery extends AbstractDelivery {

  /**
   * @var float
   */
  private $basePrice;

  /**
   * @var float
   */
  private $coefficient;

  /**
   * @var string
   */
  private $date;

  const DELIVERY_NAME = 'slow';

  public function __construct(float $basePrice, string $date, float $coefficient, string $error) {

    $this->basePrice = $basePrice;
    $this->date = $date;
    $this->coefficient = $coefficient;
    $this->setErrorMessage($error);
  }

  public function delyveryCoast(): float {
    return $this->basePrice * $this->coefficient;
  }

  /**
   * @throws \Exception
   */
  public function delyveryDate(): string {
    return $this->date;
  }

}