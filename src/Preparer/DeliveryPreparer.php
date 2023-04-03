<?php

declare(strict_types=1);


namespace Root\Html\Preparer;

use Root\Html\Delivery\DeliveryFactory;
use Root\Html\Delivery\DeliveryFactoryInterface;
use Root\Html\Filter\FilterInterface;

class DeliveryPreparer implements PreparerInterface {

  /**
   * @var DeliveryFactoryInterface
   */
  private $deliveryFactory;

  /**
   * @var FilterInterface
   */
  private $filter;


  public function __construct(DeliveryFactoryInterface $deliveryFactory, FilterInterface $filter = NULL) {

    $this->deliveryFactory = $deliveryFactory;
    $this->filter = $filter;
  }

  public function prepare(array $data): array {
    $result = [];
    $data = $this->filter ? $this->filter->filter($data) : $data;

    foreach ($data as $delivery) {
      $result[] = $this->deliveryFactory->getDelivery($delivery)
        ->getDeliveryInformation();
    }

    return $result;
  }

}