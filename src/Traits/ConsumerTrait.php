<?php

namespace Kafka\SchemaRegistry\Traits;

use Kafka\SchemaRegistry\Helpers\ConfigHelper;
use Kafka\SchemaRegistry\Constants\ConsumerConfParam;
use Kafka\SchemaRegistry\Constants\TopicConfParam;
use Kafka\SchemaRegistry\Lib\AvroConsumer;
use Kafka\SchemaRegistry\Interfaces\ConsumerCallbackInterface;
use Kafka\SchemaRegistry\Exceptions\BadCallbackException;

trait ConsumerTrait
{
    use KafkaTrait;

    protected $consumerGroupId = null;
    protected $consumer        = null;

    private $isCallbackAClass = false;
    private $callback         = null;

    public function prepare($schemaRegistryUrl = null, $brokerList = null, $tvvv = null)
    {
        $this->setSchemaRegistryAndBrokerList($schemaRegistryUrl, $brokerList);

        $this->initConfIfNeeded();

        $this->conf->setRebalanceCb(function (\RdKafka\KafkaConsumer $kafka, $err, array $partitions = null) {
            switch ($err) {
                case RD_KAFKA_RESP_ERR__ASSIGN_PARTITIONS:
                    $kafka->assign($partitions);
                    break;

                case RD_KAFKA_RESP_ERR__REVOKE_PARTITIONS:
                    $kafka->assign(null);
                    break;

                default:
                    throw new \Exception($err);
            }
        });

        // Initial list of Kafka brokers
        $this->conf->set(ConsumerConfParam::METADATA_BROKER_LIST, $this->brokerList);

        // Set where to start consuming messages when there is no initial offset in
        // offset store or the desired offset is out of range.
        // 'smallest': start from the beginning
        $this->topicConf->set(TopicConfParam::AUTO_OFFSET_RESET, 'smallest');
    }

    public function listen($topics, $callback)
    {
        $this->callback = $callback;

        $this->checkCallback();

        // Set the configuration to use for subscribed/assigned topics
        $this->conf->setDefaultTopicConf($this->topicConf);

        $this->kafka = new AvroConsumer($this->conf, $this->schemaRegistryUrl, ['register_missing_schemas' => false]);

        $this->kafka->subscribe($topics);

        echo "Waiting for partition assignment... (make take some time when\n";
        echo "quickly re-joining the group after leaving it.)\n";

        while (true) {
            $message = $this->kafka->consume(1000);

            switch ($message->err) {
                case RD_KAFKA_RESP_ERR_NO_ERROR:
                    $this->executeCallback($message);
                    break;

                case RD_KAFKA_RESP_ERR__PARTITION_EOF:
                    echo "No more messages; will wait for more\n";
                    break;

                case RD_KAFKA_RESP_ERR__TIMED_OUT:
                    //echo "Timed out\n";
                    break;

                default:
                    throw new \Exception($message->errstr(), $message->err);
                    break;
            }
        }
    }

    public function setConsumerGroup($consumerGroupId = null)
    {
        if ($consumerGroupId == null) {
            if (!empty(env('KAFKA_CONSUMER_GROUP_ID'))) {
                $consumerGroupId = env('KAFKA_CONSUMER_GROUP_ID');
            }
        }

        if ($consumerGroupId != null) {
            $this->conf->set(ConsumerConfParam::GROUP_ID, $consumerGroupId);
        }
    }

    private function checkCallback()
    {
        $callback = $this->callback;

        if (
                is_callable($callback) === false
                &&
                (
                    class_exists($callback) === false
                    ||
                    (
                        class_exists($callback) === true
                        &&
                        !in_array(ConsumerCallbackInterface::class, class_implements($callback))
                    )
                )
            ) {
            throw new BadCallbackException('Your callback must be a function or a valid class which implements ' . ConsumerCallbackInterface::class);
        } else {
            if (!is_callable($callback) && class_exists($callback)) {
                $this->isCallbackAClass = true;
            }
        }
    }

    private function executeCallback($message)
    {
        $this->isCallbackAClass ? (new $this->callback($message))->consume() : ($this->callback)($message);
    }
}
