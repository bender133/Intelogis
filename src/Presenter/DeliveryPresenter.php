<?php

declare(strict_types=1);


namespace Root\Html\Presenter;

use Root\Html\Preparer\PreparerInterface;
use Root\Html\Serializer\SerializerInterface;

class DeliveryPresenter implements PresenterInterface {

  /**
   * @var SerializerInterface
   */
  private $serializer;

  /**
   * @var PreparerInterface
   */
  private $preparer;

  public function __construct(SerializerInterface $serializer, PreparerInterface $preparer) {

    $this->serializer = $serializer;
    $this->preparer = $preparer;
  }

  public function present(array $data): string {
    return $this->serializer->serialize($this->preparer->prepare($data));
  }

}