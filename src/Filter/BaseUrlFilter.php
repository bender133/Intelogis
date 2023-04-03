<?php

declare(strict_types=1);


namespace Root\Html\Filter;

class BaseUrlFilter implements FilterInterface {

  /**
   * @var array
   */
  private $criteria;

  public function filter(array $data): array {
    $results = [];
    foreach ($data as $delivery) {
      if (empty($this->criteria) || in_array($delivery['base_url'], $this->criteria, TRUE)) {
        $results[] = $delivery;
      }
    }
    return $results;
  }

  public function setCriteria(array $criteria = []) {
    $this->criteria = $criteria;
  }

}