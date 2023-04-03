<?php

declare(strict_types=1);


namespace Root\Html\Filter;

interface FilterInterface {

  public function filter(array $data): array;

}