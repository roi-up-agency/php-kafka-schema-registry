<?php

namespace Kafka\SchemaRegistry\Traits;

use Kafka\SchemaRegistry\Exceptions\SchemaNotPreparedException;
use Kafka\SchemaRegistry\Constants\ProducerConfParam;
use Kafka\SchemaRegistry\Constants\TopicConfParam;
use Kafka\SchemaRegistry\Lib\AvroProducer;
use Kafka\SchemaRegistry\Lib\MessageSerializer;

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

        if (null === $this->getSchemaSubject() || null === $this->getSchemaVersion()) {
            throw new SchemaNotPreparedException('You must set the schema subject and schema version via setSchema($subject, $version = 1) before call prepare() method', 10);
        }

        $this->initConfIfNeeded();

        $this->prepareSchema();

        $this->conf->set(ProducerConfParam::COMPRESSION_TYPE, 'snappy');
        $this->conf->set(ProducerConfParam::LINGER_MS, '20');
        $this->conf->set(ProducerConfParam::BROKER_VERSION_FALLBACK, '2.0.1');
        $this->conf->set(ProducerConfParam::QUEUE_BUFFERING_MAX_KBYTES, (string)32 * 1024);
    }

    public function produce($topic, array $data, $key = null)
    {
        //TODO Log it
        //echo "Producing " . sizeof($data). " messages to kafka topic '$topic'\n";

        $this->conf->setDefaultTopicConf($this->topicConf);

        $this->kafka = new \RdKafka\Producer($this->conf);

        $this->kafka->setLogLevel(LOG_DEBUG);
        $this->kafka->addBrokers($this->brokerList);

        $producer = new AvroProducer($this->kafka->newTopic($topic), $this->schemaRegistryUrl, $this->keySchema, $this->schema, ['register_missing_schemas' => false]);

        $start = microtime(true);

        foreach ($data as $item) {
            //TODO check this param format
            $format = mt_rand(0, 2);
            $format = $format === 2 ? null : $format;

            $producer->produce(RD_KAFKA_PARTITION_UA, 0, is_array($item) ? $item : (array)$item, $key, null, null, MessageSerializer::MAGIC_BYTE_SCHEMAID);
        }

        $end = microtime(true);

        //TODO Log it
        //echo 'Published: '.($end - $start)."\n";
    }
}
