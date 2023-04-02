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

  public function __construct(float $price, int $period, string $error) {

    $this->price = $price;
    $this->period = $period;
    $this->setErrorMessage($error);
  }

  public function deliveryCoast(): float {
    return $this->price;
  }

  /**
   * @throws \Exception
   */
  public function deliveryDate(): string {

    $startDate = new \DateTime();
    if ($startDate->format('H') >= self::CLOSING_TIME) {
      $startDate->modify('+1 day');
    }

    return $startDate
      ->modify("+" . $this->period . " day")
      ->format('Y-m-d');
  }

}