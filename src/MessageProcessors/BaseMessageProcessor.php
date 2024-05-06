<?php

declare(strict_types=1);

namespace PhpMqtt\Client\MessageProcessors;

use PhpMqtt\Client\Concerns\TranscodesData;
use PhpMqtt\Client\Concerns\WorksWithBuffers;
use Psr\Log\LoggerInterface;

/**
 * This message processor serves as base for other message processors, providing
 * default implementations for some methods.
 *
 * @package PhpMqtt\Client\MessageProcessors
 */
abstract class BaseMessageProcessor
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    use TranscodesData;
    use WorksWithBuffers;

    public const QOS_AT_MOST_ONCE  = 0;
    public const QOS_AT_LEAST_ONCE = 1;
    public const QOS_EXACTLY_ONCE  = 2;

    /**
     * BaseMessageProcessor constructor.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }
}
