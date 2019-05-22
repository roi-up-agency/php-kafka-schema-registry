<?php

namespace Kafka\SchemaRegistry\Constants;

/**
 * Consumers config params.
 * Provides a list of constants to use int consumption case
 */
class ConsumerConfParam extends KafkaConfParam
{
    /**
     * @description: Client group id string. All clients sharing the same group.id belong
     *               to the same group. <br>*Type: string*;
     *
     * @context: C
     * @range:
     * @defaultValue:
     * @importance: high
     */
    public const GROUP_ID = 'group.id';

    /**
     * @description: Name of partition assignment strategy to use when elected group leader assigns partitions to
     *               group members. <br>*Type: string*
     *
     * @context: C
     * @range:
     * @defaultValue: range,roundrobin
     * @importance: medium
     */
    public const PARTITION_ASSIGNMENT_STRATEGY = 'partition.assignment.strategy';

    /**
     * @description: Client group session and failure detection timeout. The consumer sends periodic heartbeats
     *               (heartbeat.interval.ms) to indicate its liveness to the broker. If no hearts are received
     *               by the broker for a group member within the session timeout, the broker will remove the
     *               consumer from the group and trigger a rebalance. The allowed range is configured with the
     *               **broker** configuration properties `group.min.session.timeout.ms` and `group.max.session.timeout.ms`.
     *               Also see `max.poll.interval.ms`. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 3600000
     * @defaultValue: 10000
     * @importance: high
     */
    public const SESSION_TIMEOUT_MS = 'session.timeout.ms';

    /**
     * @description: Group session keepalive heartbeat interval. <br>*Type: integer*
     * @context: C
     * @range: 1 .. 3600000
     * @defaultValue: 3000
     * @importance: low
     */
    public const HEARTBEAT_INTERVAL_MS = 'heartbeat.interval.ms';

    /**
     * @description: Group protocol type <br>*Type: string*
     * @context:C
     * @range:
     * @defaultValue: consumer
     * @importance: low
     */
    public const GROUP_PROTOCOL_TYPE = 'group.protocol.type';

    /**
     * @description: How often to query for the current client group coordinator. If the currently assigned coordinator
     *               is down the configured query interval will be divided by ten to more quickly recover in case of
     *               coordinator reassignment. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 3600000
     * @defaultValue: 600000
     * @importance: low
     */
    public const COORDINATOR_QUERY_INTERVAL_MS = 'coordinator.query.interval.ms';

    /**
     * @description: Maximum allowed time between calls to consume messages (e.g., rd_kafka_consumer_poll()) for high-level
     *               consumers. If this interval is exceeded the consumer is considered failed and the group will rebalance
     *               in order to reassign the partitions to another consumer group member. Warning: Offset commits may be
     *               not possible at this point. Note: It is recommended to set `enable.auto.offset.store=false` for long-time
     *               processing applications and then explicitly store offsets (using offsets_store()) *after* message processing,
     *               to make sure offsets are not auto-committed prior to processing has finished. The interval is checked two
     *               times per second. See KIP-62 for more information. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 86400000
     * @defaultValue: 300000
     * @importance: high
     */
    public const MAX_POLL_INTERVAL_MS = 'max.poll.interval.ms';

    /**
     * @description: Automatically and periodically commit offsets in the background. Note: setting this to false does not prevent
     *               the consumer from fetching previously committed start offsets. To circumvent this behaviour set specific start
     *               offsets per partition in the call to assign(). <br>*Type: boolean*
     *
     * @context: C
     * @range: true, false
     * @defaultValue: true
     * @importance: high
     */
    public const ENABLE_AUTO_COMMIT = 'enable.auto.commit';

    /**
     * @description: The frequency in milliseconds that the consumer offsets are committed (written) to offset storage. (0 = disable).
     *               This setting is used by the high-level consumer. <br>*Type: integer*
     *
     * @context: C
     * @range: 0 .. 86400000
     * @defaultValue: 5000
     * @importance: medium
     */
    public const AUTO_COMMIT_INTERVAL_MS = 'auto.commit.interval.ms';

    /**
     * @description: Automatically store offset of last message provided to application. The offset store is an in-memory store of
     *               the next offset to (auto-)commit for each partition. <br>*Type: boolean*
     *
     * @context: C
     * @range: true, false
     * @defaultValue: true
     * @importance: high
     */
    public const ENABLE_AUTO_OFFSET_STORE = 'enable.auto.offset.store';

    /**
     * @description: Minimum number of messages per topic+partition librdkafka tries to maintain in the local
     *               consumer queue. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 10000000
     * @defaultValue: 100000
     * @importance: medium
     */
    public const QUEUED_MIN_MESSAGES = 'queued.min.messages';

    /**
     * @description: Maximum number of kilobytes per topic+partition in the local consumer queue. This value may be overshot by
     *               fetch.message.max.bytes. This property has higher priority than queued.min.messages. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 2097151
     * @defaultValue: 1048576
     * @importance: medium
     */
    public const QUEUED_MAX_MESSAGES_KBYTES = 'queued.max.messages.kbytes';

    /**
     * @description: Maximum time the broker may wait to fill the response with fetch.min.bytes. <br>*Type: integer*
     * @context: C
     * @range: 0 .. 300000
     * @defaultValue: 100
     * @importance: low
     */
    public const FETCH_WAIT_MAX_MS = 'fetch.wait.max.ms';

    /**
     * @description: Initial maximum number of bytes per topic+partition to request when fetching messages from the broker.
     *               If the client encounters a message larger than this value it will gradually try to increase it until
     *               the entire message can be fetched. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 1000000000
     * @defaultValue: 1048576
     * @importance: medium
     */
    public const FETCH_MESSAGE_MAX_BYTES = 'fetch.message.max.bytes';

    /**
     * @description: Alias for `fetch.message.max.bytes`: Initial maximum number of bytes per topic+partition to request
     *               when fetching messages from the broker. If the client encounters a message larger than this value
     *               it will gradually try to increase it until the entire message can be fetched. <br>*Type: integer*
     *
     * @context: C
     * @range: 1 .. 1000000000
     * @defaultValue: 1048576
     * @importance: medium
     */
    public const MAX_PARTITION_FETCH_BYTES = 'max.partition.fetch.bytes';

    /**
     * @description: Maximum amount of data the broker shall return for a Fetch request. Messages are fetched in batches
     *               by the consumer and if the first message batch in the first non-empty partition of the Fetch request
     *               is larger than this value, then the message batch will still be returned to ensure the consumer can
     *               make progress. The maximum message batch size accepted by the broker is defined via `message.max.bytes`
     *               (broker config) or `max.message.bytes` (broker topic config). `fetch.max.bytes` is automatically
     *               adjusted upwards to be at least `message.max.bytes` (consumer config). <br>*Type: integer*
     *
     * @context: C
     * @range: 0 .. 2147483135
     * @defaultValue: 52428800
     * @importance: medium
     */
    public const FETCH_MAX_BYTES = 'fetch.max.bytes';

    /**
     * @description: Minimum number of bytes the broker responds with. If fetch.wait.max.ms expires the accumulated data
     *               will be sent to the client regardless of this setting. <br>*Type: integer*
     * @context: C
     * @range: 1 .. 100000000
     * @defaultValue: 1
     * @importance: low
     */
    public const FETCH_MIN_BYTES = 'fetch.min.bytes';

    /**
     * @description: How long to postpone the next fetch request for a topic+partition in case of a fetch error. <br>*Type: integer*
     * @context: C
     * @range: 0 .. 300000
     * @defaultValue: 500
     * @importance: medium
     */
    public const FETCH_ERROR_BACKOFF_MS = 'fetch.error.backoff.ms';

    /**
     * @description: **DEPRECATED** Offset commit store method: 'file' - DEPRECATED: local file store (offset.store.path, et.al),
     *               'broker' - broker commit store (requires Apache Kafka 0.8.2 or later on the broker). <br>*Type: enum value*
     *
     * @context: C
     * @range: none, file, broker
     * @defaultValue: broker
     * @importance: low
     */
    public const OFFSET_STORE_METHOD = 'offset.store.method';

    /**
     * @description: Message consume callback (set with rd_kafka_conf_set_consume_cb()) <br>*Type: pointer*
     * @context: C
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const CONSUME_CB = 'consume_cb';

    /**
     * @description: Called after consumer group has been rebalanced (set with rd_kafka_conf_set_rebalance_cb()) <br>*Type: pointer*
     * @context: C
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const REBALANCE_CB = 'rebalance_cb';

    /**
     * @description: Offset commit result propagation callback. (set with rd_kafka_conf_set_offset_commit_cb()) <br>*Type: pointer*
     * @context:C
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const OFFSET_COMMIT_CB = 'offset_commit_cb';

    /**
     * @description: Emit RD_KAFKA_RESP_ERR__PARTITION_EOF event whenever the consumer reaches the end of a partition. <br>*Type: boolean*
     * @context: C
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const ENABLE_PARTITION_EOF = 'enable.partition.eof';

    /**
     * @description: Verify CRC32 of consumed messages, ensuring no on-the-wire or on-disk corruption to the messages occurred.
     *               This check comes at slightly increased CPU usage. <br>*Type: boolean*
     *
     * @context: C
     * @range: true, false
     * @defaultValue: false
     * @importance: medium
     */
    public const CHECK_CRCS = 'check.crcs';
}
