<?php

declare(strict_types=1);


namespace Root\Html\Preparer;

use Root\Html\Delivery\DeliveryFactory;
use Root\Html\Delivery\DeliveryFactoryInterface;

class DeliveryPreparer implements PreparerInterface {

  /**
   * @var DeliveryFactoryInterface
   */
  private $deliveryFactory;

  private $targetDelivery;

  public function __construct(DeliveryFactoryInterface $deliveryFactory, $targetDelivery) {

    $this->deliveryFactory = $deliveryFactory;
    $this->targetDelivery = $targetDelivery;
  }

  public function prepare(array $data): array {
    $result = [];
    foreach ($data as $delivery) {
      if (empty($this->targetDelivery) || in_array($delivery['base_url'], $this->targetDelivery, TRUE)) {
        $result[] = $this->deliveryFactory->getDelivery($delivery)
          ->getDeliveryInformation();
      }
    }

    return $result;
  }


  public static function create(array $targetdelivery = []): self {
    return new self(new DeliveryFactory(), $targetdelivery);
  }

}