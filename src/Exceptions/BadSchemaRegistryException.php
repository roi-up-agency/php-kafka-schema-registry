<?php

namespace Kafka\SchemaRegistry\Exceptions;

class BadSchemaRegistryException extends SchemaRegistryException
{
    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
