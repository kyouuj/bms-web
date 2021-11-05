<?php

namespace App\Exceptions;

use Exception;

class BusinessException extends Exception
{

    private $code;

    public function __construct(string $code)
    {
        parent::__construct(sprintf('Business Exception: %s', $code));
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }
}
