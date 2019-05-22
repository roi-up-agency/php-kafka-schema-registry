<?php

namespace Kafka\SchemaRegistry\Helpers;

class KafkaMessage
{
    private $message;
    private $key;
    private $value;
    private $topic;
    private $partition;
    private $offset;
    private $timestamp;
    private $error;

    public function __construct($message)
    {
        $this->message = $message;
        $this->setKey($this->message->key);
        $this->setValue($this->message->payload);
        $this->setTopic($this->message->topic_name);
        $this->setPartition($this->message->partition);
        $this->setOffset($this->message->offset);
        $this->setTimestamp($this->message->timestamp);
        $this->setError($this->message->err);
    }

    private function setKey($key)
    {
        $this->key = is_array($key) ? (object)$key : $key;
    }

    private function setValue($value)
    {
        $this->value = is_array($value) ? (object)$value : $value;
    }

    private function setTopic($topic)
    {
        $this->topic = $topic;
    }

    private function setPartition($part)
    {
        $this->partition = $part;
    }

    private function setOffset($offset)
    {
        $this->offset = $offset;
    }

    private function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    private function setError($err)
    {
        $this->error = $err;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getTopic()
    {
        return $this->topic;
    }

    public function getPartition()
    {
        return $this->partition;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function getError()
    {
        return $this->error;
    }
}
