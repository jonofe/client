<?php

declare(strict_types=1);

namespace PhpMqtt\Client;

/**
 * A simple DTO for published messages which need to be stored in a repository
 * while waiting for the confirmation to be deliverable.
 *
 * @package PhpMqtt\Client
 */
class PublishedMessage extends PendingMessage
{
    /**
     * @var string
     */
    private $topicName;
    /**
     * @var string
     */
    private $message;
    /**
     * @var int
     */
    private $qualityOfService;
    /**
     * @var bool
     */
    private $retain;
    /**
     * @var bool
     */
    private $received = false;

    /**
     * Creates a new published message object.
     */
    public function __construct(int $messageId, string $topicName, string $message, int $qualityOfService, bool $retain)
    {
        $this->topicName = $topicName;
        $this->message = $message;
        $this->qualityOfService = $qualityOfService;
        $this->retain = $retain;
        parent::__construct($messageId);
    }

    /**
     * Returns the topic name of the published message.
     */
    public function getTopicName(): string
    {
        return $this->topicName;
    }

    /**
     * Returns the content of the published message.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * Returns the requested quality of service level.
     */
    public function getQualityOfServiceLevel(): int
    {
        return $this->qualityOfService;
    }

    /**
     * Determines whether this message wants to be retained.
     */
    public function wantsToBeRetained(): bool
    {
        return $this->retain;
    }

    /**
     * Determines whether the message has been confirmed as received.
     */
    public function hasBeenReceived(): bool
    {
        return $this->received;
    }

    /**
     * Marks the published message as received (QoS level 2).
     *
     * Returns `true` if the message was not previously received. Otherwise `false` will be returned.
     */
    public function markAsReceived(): bool
    {
        $result = !$this->received;

        $this->received = true;

        return $result;
    }
}
