<?php

declare(strict_types=1);


namespace Root\Html\Serializer;

class JsonSerializer implements SerializerInterface {

  public function serialize($data) {
    return json_encode($data);
  }

}