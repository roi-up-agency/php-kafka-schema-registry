<?php

namespace Kafka\SchemaRegistry\Constants;

/**
 * Producer config params.
 * Provides a list of constants to use int production case
 */
class ProducerConfParam extends KafkaConfParam
{
    /**
     * @description: When set to `true`, the producer will ensure that messages are successfully produced exactly once
     *               and in the original produce order. The following configuration properties are adjusted automatically
     *               (if not modified by the user) when idempotence is enabled: `max.in.flight.requests.per.connection=5`
     *               (must be less than or equal to 5), `retries=INT32_MAX` (must be greater than 0), `acks=all`,
     *               `queuing.strategy=fifo`. Producer instantation will fail if user-supplied configuration is incompatible.
     *               <br>*Type: boolean*
     *
     * @context: P
     * @range: true, false
     * @defaultValue: false
     * @importance: high
     */
    public const ENABLE_IDEMPOTENCE = 'enable.idempotence';

    /**
     * @description: **EXPERIMENTAL**: subject to change or removal. When set to `true`, any error that could result in a gap
     *               in the produced message series when a batch of messages fails, will raise a fatal error
     *               (ERR__GAPLESS_GUARANTEE) and stop the producer. Messages failing due to `message.timeout.ms` are not covered
     *               by this guarantee. Requires `enable.idempotence=true`. <br>*Type: boolean*
     *
     * @context: P
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const ENABLE_GAPLESS_GUARANTEE = 'enable.gapless.guarantee';

    /**
     * @description: Maximum number of messages allowed on the producer queue.
     *               This queue is shared by all topics and partitions. <br>*Type: integer*
     *
     * @context: P
     * @range: 1 .. 10000000
     * @defaultValue: 100000
     * @importance: high
     */
    public const QUEUE_BUFFERING_MAX_MESSAGES = 'queue.buffering.max.messages';

    /**
     * @description: Maximum total message size sum allowed on the producer queue. This queue is shared by all topics and partitions.
     *               This property has higher priority than queue.buffering.max.messages. <br>*Type: integer*
     *
     * @context: P
     * @range: 1 .. 2097151
     * @defaultValue: 1048576
     * @importance: high
     */
    public const QUEUE_BUFFERING_MAX_KBYTES = 'queue.buffering.max.kbytes';

    /**
     * @description: Delay in milliseconds to wait for messages in the producer queue to accumulate before constructing message batches
     *               (MessageSets) to transmit to brokers. A higher value allows larger and more effective (less overhead,
     *               improved compression) batches of messages to accumulate at the expense of increased message delivery latency. <br>*Type: integer*
     *
     * @context: P
     * @range: 0 .. 900000
     * @defaultValue: 0
     * @importance: high
     */
    public const QUEUE_BUFFERING_MAX_MS = 'queue.buffering.max.ms';

    /**
     * @description: Alias for `queue.buffering.max.ms`: Delay in milliseconds to wait for messages in the producer queue
     *               to accumulate before constructing message batches (MessageSets) to transmit to brokers.
     *               A higher value allows larger and more effective (less overhead, improved compression) batches of messages
     *               to accumulate at the expense of increased message delivery latency. <br>*Type: integer*
     *
     * @context: P
     * @range: 0 .. 900000
     * @defaultValue: 0
     * @importance: high
     */
    public const LINGER_MS = 'linger.ms';

    /**
     * @description: How many times to retry sending a failing Message. **Note:** retrying may cause reordering unless
     *               `enable.idempotence` is set to true. <br>*Type: integer*
     *
     * @context: P
     * @range: 0 .. 10000000
     * @defaultValue: 2
     * @importance: high
     */
    public const MESSAGE_SEND_MAX_RETRIES = 'message.send.max.retries';

    /**
     * @description: Alias for `message.send.max.retries`: How many times to retry sending a failing Message.
     *               **Note:** retrying may cause reordering unless `enable.idempotence` is set to true. <br>*Type: integer*
     *
     * @context: P
     * @range: 0 .. 10000000
     * @defaultValue: 2
     * @importance: high
     */
    public const RETRIES = 'retries';

    /**
     * @description: The backoff time in milliseconds before retrying a protocol request. <br>*Type: integer*
     * @context: P
     * @range: 1 .. 300000
     * @defaultValue: 100
     * @importance: medium
     */
    public const RETRY_BACKOFF_MS = 'retry.backoff.ms';

    /**
     * @description: The threshold of outstanding not yet transmitted broker requests needed to backpressure
     *               the producer's message accumulator. If the number of not yet transmitted requests equals
     *               or exceeds this number, produce request creation that would have otherwise been triggered
     *               (for example, in accordance with linger.ms) will be delayed. A lower number yields larger
     *               and more effective batches. A higher value can improve latency when using compression on
     *               slow machines. <br>*Type: integer*
     *
     * @context: P
     * @range: 1 .. 1000000
     * @defaultValue: 1
     * @importance: low
     */
    public const QUEUE_BUFFERING_BACKPRESSURE_THRESHOLD = 'queue.buffering.backpressure.threshold';

    /**
     * @description: compression codec to use for compressing message sets. This is the default value for all topics,
     *               may be overridden by the topic configuration property `compression.codec`.  <br>*Type: enum value*
     *
     * @context: P
     * @range: none, gzip, snappy, lz4, zstd
     * @defaultValue: none
     * @importance: medium
     */
    public const COMPRESSION_CODEC = 'compression.codec';

    /**
     * @description: Alias for `compression.codec`: compression codec to use for compressing message sets.
     *               This is the default value for all topics, may be overridden by the topic configuration
     *               property `compression.codec`.  <br>*Type: enum value*
     *
     * @context: P
     * @range: none, gzip, snappy, lz4, zstd
     * @defaultValue: none
     * @importance: medium
     */
    public const COMPRESSION_TYPE = 'compression.type';

    /**
     * @description: Maximum number of messages batched in one MessageSet.
     *               The total MessageSet size is also limited by message.max.bytes. <br>*Type: integer*
     *
     * @context: P
     * @range: 1 .. 1000000
     * @defaultValue: 10000
     * @importance: medium
     */
    public const BATCH_NUM_MESSAGES = 'batch.num.messages';

    /**
     * @description: Only provide delivery reports for failed messages. <br>*Type: boolean*
     * @context: P
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const DELIVERY_REPORT_ONLY_ERROR = 'delivery.report.only.error';

    /**
     * @description: Delivery report callback (set with rd_kafka_conf_set_dr_cb()) <br>*Type: pointer*
     * @context: P
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const DR_CB = 'dr_cb';

    /**
     * @description: Delivery report callback (set with rd_kafka_conf_set_dr_msg_cb()) <br>*Type: pointer*
     * @context: P
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const DR_MSG_CB = 'dr_msg_cb';
}
