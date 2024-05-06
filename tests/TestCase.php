<?php

declare(strict_types=1);

namespace Tests;

/**
 * A base class for all tests.
 *
 * @package Tests
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $mqttBrokerHost;
    /**
     * @var int
     */
    protected $mqttBrokerPort;
    /**
     * @var int
     */
    protected $mqttBrokerPortWithAuthentication;
    /**
     * @var int
     */
    protected $mqttBrokerTlsPort;
    /**
     * @var int
     */
    protected $mqttBrokerTlsWithClientCertificatePort;

    /**
     * @var string|null
     */
    protected $mqttBrokerUsername;
    /**
     * @var string|null
     */
    protected $mqttBrokerPassword;

    /**
     * @var bool
     */
    protected $skipTlsTests;
    /**
     * @var string
     */
    protected $tlsCertificateDirectory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->mqttBrokerHost                         = getenv('MQTT_BROKER_HOST');
        $this->mqttBrokerPort                         = intval(getenv('MQTT_BROKER_PORT'));
        $this->mqttBrokerPortWithAuthentication       = intval(getenv('MQTT_BROKER_PORT_WITH_AUTHENTICATION'));
        $this->mqttBrokerTlsPort                      = intval(getenv('MQTT_BROKER_TLS_PORT'));
        $this->mqttBrokerTlsWithClientCertificatePort = intval(getenv('MQTT_BROKER_TLS_WITH_CLIENT_CERT_PORT'));

        $this->mqttBrokerUsername                     = getenv('MQTT_BROKER_USERNAME') ?: null;
        $this->mqttBrokerPassword                     = getenv('MQTT_BROKER_PASSWORD') ?: null;

        $this->skipTlsTests            = getenv('SKIP_TLS_TESTS') === 'true';
        $this->tlsCertificateDirectory = rtrim(getenv('TLS_CERT_DIR'), '/');
    }
}
