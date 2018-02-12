<?php

namespace Notific\PhpSdk\Resources;

class PrivateNotification extends ApiResource
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $type;

    /**
     * @var
     */
    public $title;

    /**
     * @var
     */
    public $body;

    /**
     * @var
     */
    public $url;

    /**
     * @var
     */
    public $createdAt;

    /**
     * Recipient constructor.
     * @param array $attributes
     * @param null $notific
     */
    public function __construct(array $attributes, $notific = null)
    {
        parent::__construct($attributes, $notific);
    }

    /**
     * @param array $recipients
     * @return mixed
     */
    public function sendTo(array $recipients)
    {
        return $this->notific->sendPrivateNotification($this->id, $recipients);
    }
}