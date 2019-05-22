<?php

namespace Kafka\SchemaRegistry\Constants;

/**
 * General Kafka config params.
 * Provides a list of constants to use int consumption/production cases
 */
class KafkaConfParam
{
    /**
     * @description: Indicates the builtin features for this build of librdkafka. An application can either query
     *              this value or attempt to set it with its list of required features to check for library
     *              support. <br>*Type: CSV flags*
     *
     * @context: *
     * @range: gzip, snappy, ssl, sasl, regex, lz4, sasl_gssapi, sasl_plain, sasl_scram, plugins, zstd
     * @defaultValue:
     * @importance: low
     */
    public const BUILTIN_FEATURES = 'builtin.features';

    /**
     * @description: Client identifier. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue: rdkafka
     * @importance: low
     */
    public const CLIENT_ID = 'client.id';

    /**
     * @description: Initial list of brokers as a CSV list of broker host or host:port. The application may also use
     *               `rd_kafka_brokers_add()` to add brokers during runtime. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: high
     */
    public const METADATA_BROKER_LIST = 'metadata.broker.list';

    /**
     * @description: Alias for `metadata.broker.list`: Initial list of brokers as a CSV list of broker host or host:port.
     *               The application may also use `rd_kafka_brokers_add()` to add brokers during runtime. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: high
     */
    public const BOOTSTRAP_SERVERS = 'bootstrap.servers';

    /**
     * @description: Maximum Kafka protocol request message size. <br>*Type: integer*
     * @context: *
     * @range: 1000 .. 1000000000
     * @defaultValue: 1000000
     * @importance: medium
     */
    public const MESSAGE_MAX_BYTES = 'message.max.bytes';

    /**
     * @description: Maximum size for message to be copied to buffer. Messages larger than this will be passed by
     *               reference (zero-copy) at the expense of larger iovecs. <br>*Type: integer*
     *
     * @context: *
     * @range: 0 .. 1000000000
     * @defaultValue: 65535
     * @importance: low
     */
    public const MESSAGE_COPY_MAX_BYTES = 'message.copy.max.bytes';

    /**
     * @description: Maximum Kafka protocol response message size. This serves as a safety precaution to avoid memory
     *               exhaustion in case of protocol hickups. This value must be at least `fetch.max.bytes`  + 512 to
     *               allow for protocol overhead; the value is adjusted automatically unless the configuration property
     *               is explicitly set. <br>*Type: integer*
     *
     * @context: *
     * @range: 1000 .. 2147483647
     * @defaultValue: 100000000
     * @importance: medium
     */
    public const RECEIVE_MESSAGE_MAX_BYTES = 'receive.message.max.bytes';

    /**
     * @description: Maximum number of in-flight requests per broker connection. This is a generic property applied to all
     *               broker communication, however it is primarily relevant to produce requests. In particular, note that
     *               other mechanisms limit the number of outstanding consumer fetch request per broker
     *               to one. <br>*Type: integer*
     *
     * @context: *
     * @range: 1 .. 1000000
     * @defaultValue: 1000000
     * @importance: low
     */
    public const MAX_IN_FLIGHT_REQUESTS_PER_CONNECTION = 'max.in.flight.requests.per.connection';

    /**
     * @description: Alias for `max.in.flight.requests.per.connection`: Maximum number of in-flight requests
     *               per broker connection. This is a generic property applied to all broker communication,
     *               however it is primarily relevant to produce requests. In particular, note that other
     *               mechanisms limit the number of outstanding consumer fetch request per broker to one.
     *               <br>*Type: integer*
     *
     * @context: *
     * @range: 1 .. 1000000
     * @defaultValue: 1000000
     * @importance: low
     */
    public const MAX_IN_FLIGHT = 'max.in.flight';

    /**
     * @description: Non-topic request timeout in milliseconds. This is for metadata requests, etc. <br>*Type: integer*
     * @context: *
     * @range: 10 .. 900000
     * @defaultValue: 60000
     * @importance: low
     */
    public const METADATA_REQUEST_TIMEOUT_MS = 'metadata.request.timeout.ms';

    /**
     * @description: Topic metadata refresh interval in milliseconds. The metadata is automatically refreshed on
     *               error and connect. Use -1 to disable the intervalled refresh. <br>*Type: integer*
     *
     * @context: *
     * @range: -1 .. 3600000
     * @defaultValue: 300000
     * @importance: low
     */
    public const TOPIC_METADATA_REFRESH_INTERVAL_MS = 'topic.metadata.refresh.interval.ms';

    /**
     * @description: Metadata cache max age. Defaults to topic.metadata.refresh.interval.ms * 3 <br>*Type: integer*
     * @context: *
     * @range: 1 .. 86400000
     * @defaultValue: 900000
     * @importance: low
     */
    public const METADATA_MAX_AGE_MS = 'metadata.max.age.ms';

    /**
     * @description: When a topic loses its leader a new metadata request will be enqueued with this initial interval,
     *               exponentially increasing until the topic metadata has been refreshed. This is used to recover
     *               quickly from transitioning leader brokers. <br>*Type: integer*
     * @context: *
     * @range: 1 .. 60000
     * @defaultValue: 250
     * @importance: low
     */
    public const TOPIC_METADATA_REFRESH_FAST_INTERVAL_MS = 'topic.metadata.refresh.fast.interval.ms';

    /**
     * @description: **DEPRECATED** No longer used. <br>*Type: integer*
     * @context: *
     * @range: 0 .. 1000
     * @defaultValue: 10
     * @importance: low
     */
    public const TOPIC_METADATA_REFRESH_FAST_CNT = 'topic.metadata.refresh.fast.cnt';

    /**
     * @description: Sparse metadata requests (consumes less network bandwidth) <br>*Type: boolean*
     * @context: *
     * @range: true, false
     * @defaultValue: true
     * @importance: low
     */
    public const TOPIC_METADATA_REFRESH_SPARSE = 'topic.metadata.refresh.sparse';

    /**
     * @description: Topic blacklist, a comma-separated list of regular expressions for matching topic
     *               names that should be ignored in broker metadata information as if the topics did
     *               not exist. <br>*Type: pattern list*
     *
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const TOPIC_BLACKLIST = 'topic.blacklist';

    /**
     * @description: A comma-separated list of debug contexts to enable. Detailed Producer debugging: broker,topic,msg.
     *               Consumer: consumer,cgrp,topic,fetch <br>*Type: CSV flags*
     *
     * @context: *
     * @range: generic, broker, topic, metadata, feature, queue, msg, protocol, cgrp, security, fetch, interceptor, plugin, consumer, admin, eos, all
     * @defaultValue:
     * @importance: medium
     */
    public const DEBUG = 'debug';

    /**
     * @description: Default timeout for network requests. Producer: ProduceRequests will use the lesser value of `socket.timeout.ms`
     *               and remaining `message.timeout.ms` for the first message in the batch. Consumer: FetchRequests will use
     *               `fetch.wait.max.ms` + `socket.timeout.ms`. Admin: Admin requests will use `socket.timeout.ms` or explicitly set
     *               `rd_kafka_AdminOptions_set_operation_timeout()` value. <br>*Type: integer*
     *
     * @context: *
     * @range: 10 .. 300000
     * @defaultValue: 60000
     * @importance: low
     */
    public const SOCKET_TIMEOUT_MS = 'socket.timeout.ms';

    /**
     * @description: **DEPRECATED** No longer used. <br>*Type: integer*
     * @context: *
     * @range: 1 .. 60000
     * @defaultValue: 1000
     * @importance: low
     */
    public const SOCKET_BLOCKING_MAX_MS = 'socket.blocking.max.ms';

    /**
     * @description: Broker socket send buffer size. System default is used if 0. <br>*Type: integer*
     * @context: *
     * @range: 0 .. 100000000
     * @defaultValue: 0
     * @importance: low
     */
    public const SOCKET_SEND_BUFFER_BYTES = 'socket.send.buffer.bytes';

    /**
     * @description: Broker socket receive buffer size. System default is used if 0. <br>*Type: integer*
     * @context: *
     * @range: 0 .. 100000000
     * @defaultValue: 0
     * @importance: low
     */
    public const SOCKET_RECEIVE_BUFFER_BYTES = 'socket.receive.buffer.bytes';

    /**
     * @description: Enable TCP keep-alives (SO_KEEPALIVE) on broker sockets <br>*Type: boolean*
     * @context: *
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const SOCKET_KEEPALIVE_ENABLE = 'socket.keepalive.enable';

    /**
     * @description: Disable the Nagle algorithm (TCP_NODELAY) on broker sockets. <br>*Type: boolean*
     * @context: *
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const SOCKET_NAGLE_DISABLE = 'socket.nagle.disable';

    /**
     * @description: Disconnect from broker when this number of send failures (e.g., timed out requests) is reached.
     *               Disable with 0. WARNING: It is highly recommended to leave this setting at its default value of 1
     *               to avoid the client and broker to become desynchronized in case of request timeouts.
     *               NOTE: The connection is automatically re-established. <br>*Type: integer*
     *
     * @context: *
     * @range: 0 .. 1000000
     * @defaultValue: 1
     * @importance: low
     */
    public const SOCKET_MAX_FAILS = 'socket.max.fails';

    /**
     * @description: How long to cache the broker address resolving results (milliseconds). <br>*Type: integer*
     * @context: *
     * @range: 0 .. 86400000
     * @defaultValue: 1000
     * @importance: low
     */
    public const BROKER_ADDRESS_TTL = 'broker.address.ttl';

    /**
     * @description: Allowed broker IP address families: any, v4, v6 <br>*Type: enum value*
     * @context: *
     * @range: any, v4, v6
     * @defaultValue: any
     * @importance: low
     */
    public const BROKER_ADDRESS_FAMILY = 'broker.address.family';

    /**
     * @description: When enabled the client will only connect to brokers it needs to communicate with. When disabled
     *               the client will maintain connections to all brokers in the cluster. <br>*Type: boolean*
     *
     * @context: *
     * @range: true, false
     * @defaultValue: true
     * @importance: medium
     */
    public const ENABLE_SPARSE_CONNECTIONS = 'enable.sparse.connections';

    /**
     * @description: **DEPRECATED** No longer used. See `reconnect.backoff.ms` and `reconnect.backoff.max.ms`. <br>*Type: integer*
     * @context: *
     * @range: 0 .. 3600000
     * @defaultValue: 0
     * @importance: low
     */
    public const RECONNECT_BACKOFF_JITTER_MS = 'reconnect.backoff.jitter.ms';

    /**
     * @description: The initial time to wait before reconnecting to a broker after the connection has been closed.
     *               The time is increased exponentially until `reconnect.backoff.max.ms` is reached. -25% to +50%
     *               jitter is applied to each reconnect backoff. A value of 0 disables the backoff and reconnects
     *               immediately. <br>*Type: integer*
     *
     * @context: *
     * @range: 0 .. 3600000
     * @defaultValue: 100
     * @importance: medium
     */
    public const RECONNECT_BACKOFF_MS = 'reconnect.backoff.ms';

    /**
     * @description: The maximum time to wait before reconnecting to a broker after the connection has been closed. <br>*Type: integer*
     * @context: *
     * @range: 0 .. 3600000
     * @defaultValue: 10000
     * @importance: medium
     */
    public const RECONNECT_BACKOFF_MAX_MS = 'reconnect.backoff.max.ms';

    /**
     * @description: librdkafka statistics emit interval. The application also needs to register a stats callback using
     *               `rd_kafka_conf_set_stats_cb()`. The granularity is 1000ms. A value of 0 disables statistics. <br>*Type: integer*
     *
     * @context: *
     * @range: 0 .. 86400000
     * @defaultValue: 0
     * @importance: high
     */
    public const STATISTICS_INTERVAL_MS = 'statistics.interval.ms';

    /**
     * @description: See `rd_kafka_conf_set_events()` <br>*Type: integer*
     * @context: *
     * @range: 0 .. 2147483647
     * @defaultValue: 0
     * @importance: low
     */
    public const ENABLED_EVENTS = 'enabled_events';

    /**
     * @description: Error callback (set with rd_kafka_conf_set_error_cb()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue: low
     * @importance:
     */
    public const ERROR_CB = 'error_cb';

    /**
     * @description: Throttle callback (set with rd_kafka_conf_set_throttle_cb()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const THROTTLE_CB = 'throttle_cb';

    /**
     * @description: Statistics callback (set with rd_kafka_conf_set_stats_cb()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const STATS_CB = 'stats_cb';

    /**
     * @description: Log callback (set with rd_kafka_conf_set_log_cb()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const LOG_CB = 'log_cb';

    /**
     * @description: Logging level (syslog(3) levels) <br>*Type: integer*
     * @context: *
     * @range: 0 .. 7
     * @defaultValue: 6
     * @importance: low
     */
    public const LOG_LEVEL = 'log_level';

    /**
     * @description: Disable spontaneous log_cb from internal librdkafka threads, instead enqueue log messages on queue set
     *               with `rd_kafka_set_log_queue()` and serve log callbacks or events through the standard poll APIs.
     *               **NOTE**: Log messages will linger in a temporary queue until the log queue has been set. <br>*Type: boolean*
     *
     * @context: *
     * @range: true, false
     * @defaultValue: false
     * @importance: low
     */
    public const LOG_QUEUE = 'log.queue';

    /**
     * @description: Print internal thread name in log messages (useful for debugging librdkafka internals) <br>*Type: boolean*
     * @context: *
     * @range: true, false
     * @defaultValue: true
     * @importance: low
     */
    public const LOG_THREAD_NAME = 'log.thread.name';

    /**
     * @description: Log broker disconnects. It might be useful to turn this off when interacting with 0.9 brokers with an
     *               aggressive `connection.max.idle.ms` value. <br>*Type: boolean*
     *
     * @context: *
     * @range: true, false
     * @defaultValue: true
     * @importance: low
     */
    public const LOG_CONNECTION_CLOSE = 'log.connection.close';

    /**
     * @description: Background queue event callback (set with rd_kafka_conf_set_background_event_cb()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const BACKGROUND_EVENT_CB = 'background_event_cb';

    /**
     * @description: Socket creation callback to provide race-free CLOEXEC <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SOCKET_CB = 'socket_cb';

    /**
     * @description: Socket connect callback <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const CONNECT_CB = 'connect_cb';

    /**
     * @description: Socket close callback <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const CLOSESOCKET_CB = 'closesocket_cb';

    /**
     * @description: File open callback to provide race-free CLOEXEC <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const OPEN_CB = 'open_cb';

    /**
     * @description: Application opaque (set with rd_kafka_conf_set_opaque()) <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const OPAQUE = 'opaque';

    /**
     * @description: Default topic configuration for automatically subscribed topics <br>*Type: pointer*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const DEFAULT_TOPIC_CONF = 'default_topic_conf';

    /**
     * @description: Signal that librdkafka will use to quickly terminate on rd_kafka_destroy(). If this signal is
     *               not set then there will be a delay before rd_kafka_wait_destroyed() returns true as internal
     *               threads are timing out their system calls. If this signal is set however the delay will be minimal.
     *               The application should mask this signal as an internal signal handler is installed. <br>*Type: integer*
     *
     * @context: *
     * @range: 0 .. 128
     * @defaultValue: 0
     * @importance: low
     */
    public const INTERNAL_TERMINATION_SIGNAL = 'internal.termination.signal';

    /**
     * @description: Request broker's supported API versions to adjust functionality to available protocol features.
     *               If set to false, or the ApiVersionRequest fails, the fallback version `broker.version.fallback`
     *               will be used. **NOTE**: Depends on broker version >=0.10.0. If the request is not supported by
     *               (an older) broker the `broker.version.fallback` fallback is used. <br>*Type: boolean*
     *
     * @context: *
     * @range: true, false
     * @defaultValue: true
     * @importance: high
     */
    public const API_VERSION_REQUEST = 'api.version.request';

    /**
     * @description: Timeout for broker API version requests. <br>*Type: integer*
     * @context: *
     * @range: 1 .. 300000
     * @defaultValue: 10000
     * @importance: low
     */
    public const API_VERSION_REQUEST_TIMEOUT_MS = 'api.version.request.timeout.ms';

    /**
     * @description: Dictates how long the `broker.version.fallback` fallback is used in the case the ApiVersionRequest fails.
     *               **NOTE**: The ApiVersionRequest is only issued when a new connection to the broker is made
     *               (such as after an upgrade). <br>*Type: integer*
     *
     * @context: *
     * @range: 0 .. 604800000
     * @defaultValue: 0
     * @importance: medium
     */
    public const API_VERSION_FALLBACK_MS = 'api.version.fallback.ms';

    /**
     * @description: Older broker versions (before 0.10.0) provide no way for a client to query for supported protocol
     *               features (ApiVersionRequest, see `api.version.request`) making it impossible for the client to know
     *               what features it may use. As a workaround a user may set this property to the expected broker version
     *               and the client will automatically adjust its feature set accordingly if the ApiVersionRequest fails
     *               (or is disabled). The fallback broker version will be used for `api.version.fallback.ms`.
     *               Valid values are: 0.9.0, 0.8.2, 0.8.1, 0.8.0. Any other value >= 0.10, such as 0.10.2.1,
     *               enables ApiVersionRequests. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue: 0.10.0
     * @importance: medium
     */
    public const BROKER_VERSION_FALLBACK = 'broker.version.fallback';

    /**
     * @description: Protocol used to communicate with brokers. <br>*Type: enum value*
     * @context: *
     * @range: plaintext, ssl, sasl_plaintext, sasl_ssl
     * @defaultValue: plaintext
     * @importance: high
     */
    public const SECURITY_PROTOCOL = 'security.protocol';

    /**
     * @description: A cipher suite is a named combination of authentication, encryption, MAC and key exchange algorithm
     *               used to negotiate the security settings for a network connection using TLS or SSL network protocol.
     *               See manual page for `ciphers(1)` and `SSL_CTX_set_cipher_list(3). <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_CIPHER_SUITES = 'ssl.cipher.suites';

    /**
     * @description: The supported-curves extension in the TLS ClientHello message specifies the curves
     *               (standard/named, or 'explicit' GF(2^k) or GF(p)) the client is willing to have the server use.
     *               See manual page for `SSL_CTX_set1_curves_list(3)`. OpenSSL >= 1.0.2 required. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_CURVES_LIST = 'ssl.curves.list';

    /**
     * @description: The client uses the TLS ClientHello signature_algorithms extension to indicate to the server
     *               which signature/hash algorithm pairs may be used in digital signatures. See manual page for
     *               `SSL_CTX_set1_sigalgs_list(3)`. OpenSSL >= 1.0.2 required. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_SIGALGS_LIST = 'ssl.sigalgs.list';

    /**
     * @description: Path to client's private key (PEM) used for authentication. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_KEY_LOCATION = 'ssl.key.location';

    /**
     * @description: Private key passphrase <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_KEY_PASSWORD = 'ssl.key.password';

    /**
     * @description: Path to client's public key (PEM) used for authentication. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_CERTIFICATE_LOCATION = 'ssl.certificate.location';

    /**
     * @description: File or directory path to CA certificate(s) for verifying the broker's key. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: medium
     */
    public const SSL_CA_LOCATION = 'ssl.ca.location';

    /**
     * @description: Path to CRL for verifying broker's certificate validity. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_CRL_LOCATION = 'ssl.crl.location';

    /**
     * @description: Path to client's keystore (PKCS#12) used for authentication. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_KEYSTORE_LOCATION = 'ssl.keystore.location';

    /**
     * @description: Client's keystore (PKCS#12) password. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SSL_KEYSTORE_PASSWORD = 'ssl.keystore.password';

    /**
     * @description: SASL mechanism to use for authentication. Supported: GSSAPI, PLAIN, SCRAM-SHA-256, SCRAM-SHA-512.
     *               **NOTE**: Despite the name only one mechanism must be configured. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue: GSSAPI
     * @importance: high
     */
    public const SASL_MECHANISMS = 'sasl.mechanisms';

    /**
     * @description: Alias for `sasl.mechanisms`: SASL mechanism to use for authentication.
     *               Supported: GSSAPI, PLAIN, SCRAM-SHA-256, SCRAM-SHA-512.
     *               **NOTE**: Despite the name only one mechanism must be configured. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue: GSSAPI
     * @importance: high
     */
    public const SASL_MECHANISM = 'sasl.mechanism';

    /**
     * @description: Kerberos principal name that Kafka runs as, not including /hostname@REALM <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue: kafka
     * @importance: low
     */
    public const SASL_KERBEROS_SERVICE_NAME = 'sasl.kerberos.service.name';

    /**
     * @description: This client's Kerberos principal name. (Not supported on Windows, will use the logon user's principal). <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue: kafkaclient
     * @importance: low
     */
    public const SASL_KERBEROS_PRINCIPAL = 'sasl.kerberos.principal';

    /**
     * @description: Full kerberos kinit command string,
     *               %{config.prop.name} is replaced by corresponding config object value,
     *               %{broker.name} returns the broker's hostname. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue: kinit -S "%{sasl.kerberos.service.name}/%{broker.name}" -k -t "%{sasl.kerberos.keytab}" %{sasl.kerberos.principal}
     * @importance: low
     */
    public const SASL_KERBEROS_KINIT_CMD = 'sasl.kerberos.kinit.cmd';

    /**
     * @description: Path to Kerberos keytab file. Uses system default if not set.**NOTE**: This is not automatically
     *               used but must be added to the template in sasl.kerberos.kinit.cmd as
     *               ` ... -t %{sasl.kerberos.keytab}`. <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const SASL_KERBEROS_KEYTAB = 'sasl.kerberos.keytab';

    /**
     * @description: Minimum time in milliseconds between key refresh attempts. <br>*Type: integer*
     * @context: *
     * @range: 1 .. 86400000
     * @defaultValue: 60000
     * @importance: low
     */
    public const SASL_KERBEROS_MIN_TIME_BEFORE_RELOGIN = 'sasl.kerberos.min.time.before.relogin';

    /**
     * @description: SASL username for use with the PLAIN and SASL-SCRAM-.. mechanisms <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: high
     */
    public const SASL_USERNAME = 'sasl.username';

    /**
     * @description: SASL password for use with the PLAIN and SASL-SCRAM-.. mechanism <br>*Type: string*
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: high
     */
    public const SASL_PASSWORD = 'sasl.password';

    /**
     * @description: List of plugin libraries to load (; separated). The library search path is platform dependent
     *               (see dlopen(3) for Unix and LoadLibrary() for Windows). If no filename extension is specified
     *               the platform-specific extension (such as .dll or .so) will be appended automatically. <br>*Type: string*
     *
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const PLUGIN_LIBRARY_PATHS = 'plugin.library.paths';

    /**
     * @description: Interceptors added through rd_kafka_conf_interceptor_add_..() and any configuration handled by interceptors. <br>*Type: *
     * @context: *
     * @range:
     * @defaultValue:
     * @importance: low
     */
    public const INTERCEPTORS = 'interceptors';

    public static function getConstants()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
