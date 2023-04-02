<?php

declare(strict_types=1);


namespace Root\Html\Delivery;

class FastDelivery extends AbstractDelivery {

  /**
   * @var float
   */
  private $price;

  /**
   * @var int
   */
  private $period;

  const CLOSING_TIME = 18;

  const DELIVERY_NAME = 'fast';

  public function __construct(float $price, int $period, string $error) {

    $this->price = $price;
    $this->period = $period;
    $this->setErrorMessage($error);
  }

  public function delyveryCoast(): float {
    return $this->price * 2;
  }

  /**
   * @throws \Exception
   */
  public function delyveryDate(): string {

    $startDate = new \DateTime();
    if ($startDate->format('H') >= self::CLOSING_TIME) {
      $startDate->modify('+1 day');
    }

    return $startDate
      ->modify("+" . $this->period . " day")
      ->format('Y-m-d');
  }

}