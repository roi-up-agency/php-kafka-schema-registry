<?php

namespace Kafka\SchemaRegistry\Constants;

/**
 * General Kafka Topic config params.
 * Provides a list of constants to use during the topic configuration
 */
class TopicConfParam
{
    /**
     * @description: This field indicates the number of acknowledgements the leader broker must
     *               receive from ISR brokers before responding to the request: *0*=Broker does not
     *               send any response/ack to client, *-1* or *all*=Broker will block until message
     *               is committed by all in sync replicas (ISRs). If there are less than `min.insync.replicas`
     *               (broker configuration) in the ISR set the produce request will fail. <br>*Type: integer*
     *
     * @context: P
     * @range: -1 .. 1000
     * @defaultValue: -1
     * @importance: high
     */
    public const REQUEST_REQUIRED_ACKS = 'request.required.acks';

    /**
     * @description: Alias for `request.required.acks`: This field indicates the number of acknowledgements
     *               the leader broker must receive from ISR brokers before responding to the request:
     *               *0*=Broker does not send any response/ack to client,
     *               *-1* or *all*=Broker will block until message is committed by all in sync replicas (ISRs).
     *                      If there are less than `min.insync.replicas` (broker configuration) in the ISR set
     *                      the produce request will fail. <br>*Type: integer*
     *
     * @context: P
     * @range: -1 .. 1000
     * @defaultValue: -1
     * @importance: high
     */
    public const ACKS = 'acks';

    /**
     * @description: The ack timeout of the producer request in milliseconds. This value is only enforced by the
     *               broker and relies on `request.required.acks` being != 0. <br>*Type: integer*
     *
     * @context: P
     * @range: 1 .. 900000
     * @defaultValue: 5000
     * @importance: medium
     */
    public const REQUEST_TIMEOUT_MS = 'request.timeout.ms';

    /**
     * @description: Local message timeout. This value is only enforced locally and limits the time a produced
     *               message waits for successful delivery. A time of 0 is infinite. This is the maximum time
     *               librdkafka may use to deliver a message (including retries). Delivery error occurs when
     *               either the retry count or the message timeout are exceeded. <br>*Type: integer*
     *
     * @context: P
     * @range: 0 .. 900000
     * @defaultValue: 300000
     * @importance: high
     */
    public const MESSAGE_TIMEOUT_MS = 'message.timeout.ms';

    /**
     * @description: Alias for `message.timeout.ms`: Local message timeout. This value is only enforced locally
     *               and limits the time a produced message waits for successful delivery. A time of 0 is infinite.
     *               This is the maximum time librdkafka may use to deliver a message (including retries).
     *               Delivery error occurs when either the retry count or the message timeout are exceeded. <br>*Type: integer*
     *
     * @context: P
     * @range: 0 .. 900000
     * @defaultValue: 300000
     * @importance: high
     */
    public const DELIVERY_TIMEOUT_MS = 'delivery.timeout.ms';

    /**
     * @description: **EXPERIMENTAL**: subject to change or removal. **DEPRECATED** Producer queuing strategy.
     *               FIFO preserves produce ordering, while LIFO prioritizes new messages. <br>*Type: enum value*
     *
     * @context: P
     * @range: fifo, lifo
     * @defaultValue: fifo
     * @importance: low
     */
    public const QUEUING_STRATEGY = 'queuing.strategy';

    /**
     * @description: **DEPRECATED** No longer used. <br>*Type: boolean*
     * @context: P
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const PRODUCE_OFFSET_REPORT = 'produce.offset.report';

    /**
     * @description: Partitioner: `random` - random distribution, `consistent` - CRC32 hash of key (Empty and NULL keys are
     *               mapped to single partition), `consistent_random` - CRC32 hash of key (Empty and NULL keys are randomly
     *               partitioned), `murmur2` - Java Producer compatible Murmur2 hash of key (NULL keys are mapped to single
     *               partition), `murmur2_random` - Java Producer compatible Murmur2 hash of key (NULL keys are randomly
     *               partitioned. This is functionally equivalent to the default partitioner in the Java Producer.).
     *               <br>*Type: string*
     *
     * @context: P
     * @range:
     * @defaultValue: consistent_random
     * @importance: high
     */
    public const PARTITIONER = 'partitioner';

    /**
     * @description: Custom partitioner callback (set with rd_kafka_topic_conf_set_partitioner_cb()) <br>*Type: pointer*
     * @context: P
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const PARTITIONER_CB = 'partitioner_cb';

    /**
     * @description: **EXPERIMENTAL**: subject to change or removal. **DEPRECATED** Message queue ordering comparator
     *               (set with rd_kafka_topic_conf_set_msg_order_cmp()). Also see `queuing.strategy`. <br>*Type: pointer*
     *
     * @context: P
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const MSG_ORDER_CMP = 'msg_order_cmp';

    /**
     * @description: Application opaque (set with rd_kafka_topic_conf_set_opaque()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const OPAQUE = 'opaque';

    /**
     * @description: Compression codec to use for compressing message sets. inherit = inherit global compression.codec
     *               configuration. <br>*Type: enum value*
     *
     * @context: P
     * @range: none, gzip, snappy, lz4, zstd, inherit
     * @defaultValue: inherit
     * @importance: high
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
     * @description: Compression level parameter for algorithm selected by configuration property `compression.codec`.
     *               Higher values will result in better compression at the cost of more CPU usage.
     *               Usable range is algorithm-dependent: [0-9] for gzip; [0-12] for lz4; only 0 for snappy; -1 = codec-dependent
     *               default compression level. <br>*Type: integer*
     *
     * @context: P
     * @range: -1 .. 12
     * @defaultValue: -1
     * @importance: medium
     */
    public const COMPRESSION_LEVEL = 'compression.level';

    /**
     * @description: **DEPRECATED** [**LEGACY PROPERTY:** This property is used by the simple legacy consumer only.
     *               When using the high-level KafkaConsumer, the global `enable.auto.commit` property must be used instead].
     *               If true, periodically commit offset of the last message handed to the application.
     *               This committed offset will be used when the process restarts to pick up where it left off.
     *               If false, the application will have to call `rd_kafka_offset_store()` to store an offset (optional).
     *               **NOTE:** There is currently no zookeeper integration, offsets will be written to broker or local file
     *               according to offset.store.method. <br>*Type: boolean*
     *
     * @context: C
     * @range: true, false
     * @defaultValue: true
     * @importance: low
     */
    public const AUTO_COMMIT_ENABLE = 'auto.commit.enable';

    /**
     * @description: **DEPRECATED** Alias for `auto.commit.enable`: [**LEGACY PROPERTY:** This property is used by the simple
     *               legacy consumer only. When using the high-level KafkaConsumer, the global `enable.auto.commit` property
     *               must be used instead]. If true, periodically commit offset of the last message handed to the application.
     *               This committed offset will be used when the process restarts to pick up where it left off.
     *               If false, the application will have to call `rd_kafka_offset_store()` to store an offset (optional).
     *               **NOTE:** There is currently no zookeeper integration, offsets will be written to broker or local file
     *               according to offset.store.method. <br>*Type: boolean*
     *
     * @context: C
     * @range: true, false
     * @defaultValue: true
     * @importance: low
     */
    public const ENABLE_AUTO_COMMIT = 'enable.auto.commit';

    /**
     * @description: [**LEGACY PROPERTY:** This setting is used by the simple legacy consumer only. When using the high-level
     *               KafkaConsumer, the global `auto.commit.interval.ms` property must be used instead]. The frequency in
     *               milliseconds that the consumer offsets are committed (written) to offset storage. <br>*Type: integer*
     *
     * @context: C
     * @range: 10 .. 86400000
     * @defaultValue: 60000
     * @importance: high
     */
    public const AUTO_COMMIT_INTERVAL_MS = 'auto.commit.interval.ms';

    /**
     * @description: Action to take when there is no initial offset in offset store or the desired offset is out of range: 'smallest','earliest'
     *              - automatically reset the offset to the smallest offset, 'largest','latest'
     *              - automatically reset the offset to the largest offset, 'error'
     *              - trigger an error which is retrieved by consuming messages and checking 'message->err'. <br>*Type: enum value*
     *
     * @context: C
     * @range: smallest, earliest, beginning, largest, latest, end, error
     * @defaultValue: largest
     * @importance: high
     */
    public const AUTO_OFFSET_RESET = 'auto.offset.reset';

    /**
     * @description: **DEPRECATED** Path to local file for storing offsets. If the path is a directory a filename will be
     *               automatically generated in that directory based on the topic and partition.
     *               File-based offset storage will be removed in a future version. <br>*Type: string*
     *
     * @context: C
     * @range:
     * @defaultValue: .
     * @importance: low
     */
    public const OFFSET_STORE_PATH = 'offset.store.path';

    /**
     * @description: **DEPRECATED** fsync() interval for the offset file, in milliseconds. Use -1 to disable syncing, and 0
     *               for immediate sync after each write. File-based offset storage will be removed in a future version.
     *               <br>*Type: integer*
     *
     * @context: C
     * @range: -1 .. 86400000
     * @defaultValue: -1
     * @importance: low
     */
    public const OFFSET_STORE_SYNC_INTERVAL_MS = 'offset.store.sync.interval.ms';

    /**
     * @description: **DEPRECATED** Offset commit store method: 'file'
     *               - DEPRECATED: local file store (offset.store.path, et.al), 'broker' - broker commit store
     *               (requires "group.id" to be configured and Apache Kafka 0.8.2 or later on the broker.). <br>*Type: enum value*
     *
     * @context: C
     * @range: file, broker
     * @defaultValue: broker
     * @importance: low
     */
    public const OFFSET_STORE_METHOD = 'offset.store.method';

    /**
     * @description: Maximum number of messages to dispatch in one `rd_kafka_consume_callback*()` call (0 = unlimited) <br>*Type: integer*
     * @context: C
     * @range: 0 .. 1000000
     * @defaultValue: 0
     * @importance: low
     */
    public const CONSUME_CALLBACK_MAX_MESSAGES = 'consume.callback.max.messages';
}
