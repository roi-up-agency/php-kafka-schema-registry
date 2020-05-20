<?php

namespace Kafka\SchemaRegistry\Traits;

use Kafka\SchemaRegistry\Constants\KafkaConfParam;
use Kafka\SchemaRegistry\Exceptions\SchemaNotPreparedException;
use Kafka\SchemaRegistry\Constants\ProducerConfParam;
use Kafka\SchemaRegistry\Constants\TopicConfParam;
use Kafka\SchemaRegistry\Lib\AvroProducer;
use Kafka\SchemaRegistry\Lib\MessageSerializer;
use Kafka\SchemaRegistry\Helpers\TopicSuffix;

/**
 * Undocumented class
 */
trait ProducerTrait
{
    use KafkaTrait;

    /**
     * //TODO comment function
     *
     * @param  String $schemaRegistryUrl
     * @param  String $brokerList
     * @return void
     */

    public function prepare($schemaRegistryUrl = null, $brokerList = null)
    {
        $this->setSchemaRegistryAndBrokerList($schemaRegistryUrl, $brokerList);

        $this->initConfIfNeeded();

        $this->conf->set(ProducerConfParam::COMPRESSION_TYPE, 'snappy');
        $this->conf->set(ProducerConfParam::LINGER_MS, '20');
        $this->conf->set(ProducerConfParam::BROKER_VERSION_FALLBACK, '2.4');
        $this->conf->set(ProducerConfParam::QUEUE_BUFFERING_MAX_KBYTES, (string)32 * 1024);
        $this->conf->set(ProducerConfParam::ENABLE_IDEMPOTENCE, true);
        $this->conf->set(TopicConfParam::ENABLE_AUTO_COMMIT, true);

    }

    public function produce($topic, array $data, $key = null)
    {
        if (null === $this->getSchemaSubject() || null === $this->getSchemaVersion()) {
            throw new SchemaNotPreparedException('You must set the schema subject and schema version via setSchema($subject, $version = 1) before call prepare() method', 10);
        }

        $this->prepareSchema();

        //TODO Log it
        //echo "Producing " . sizeof($data). " messages to kafka topic '$topic'\n";

        //$this->setDefaultTopicConf();

        $this->conf->set(KafkaConfParam::BOOTSTRAP_SERVERS, $this->brokerList);

        $this->kafka = new \RdKafka\Producer($this->conf);

        $producer = new AvroProducer($this->kafka->newTopic(TopicSuffix::getSuffixedTopic($topic)), $this->schemaRegistryUrl, $this->keySchema, $this->schema, ['register_missing_schemas' => false]);

        $start = microtime(true);

        foreach ($data as $item) {
            //TODO check this param format
            $format = mt_rand(0, 2);
            $format = $format === 2 ? null : $format;

            $producer->produce(RD_KAFKA_PARTITION_UA, 0, is_array($item) ? $item : (array)$item, $key, null, null, MessageSerializer::MAGIC_BYTE_SCHEMAID);
            $this->kafka->poll(0);
        }
        for ($flushRetries = 0; $flushRetries < 10; $flushRetries++) {
            $result =  $this->kafka->flush(10000);
            if (RD_KAFKA_RESP_ERR_NO_ERROR === $result) {
                break;
            }
        }

        $end = microtime(true);

        //TODO Log it
        //echo 'Published: '.($end - $start)."\n";
    }
}
