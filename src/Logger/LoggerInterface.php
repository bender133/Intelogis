<?php

declare(strict_types=1);


namespace Root\Html\Logger;

interface LoggerInterface {

  public function getErrorMessage(): string;

  public function setErrorMessage(string $error);

}