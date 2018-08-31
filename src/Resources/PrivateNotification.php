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
     * @var array
     */
    private $data;

    /**
     * Recipient constructor.
     *
     * @param array $attributes
     * @param null  $notific
     */
    public function __construct(array $attributes, $notific = null)
    {
        parent::__construct($attributes, $notific);

        $this->data = [];
    }

    /**
     * @param mixed ...$recipients
     *
     * @return mixed
     */
    public function sendTo(...$recipients)
    {
        $this->data['recipients'] = $this->flatten($recipients);

        return $this->notific->sendPrivateNotification($this->id, $this->data);
    }

    /**
     * @return mixed
     */
    public function send()
    {
        return $this->notific->sendPrivateNotification($this->id, $this->data);
    }

    /**
     * @param mixed ...$recipients
     *
     * @return $this
     */
    public function recipients(...$recipients)
    {
        $this->data['recipients'] = $this->flatten($recipients);

        return $this;
    }

    /**
     * @param mixed ...$tags
     *
     * @return $this
     */
    public function tags(...$tags)
    {
        $this->data['tags'] = $this->flatten($tags);

        return $this;
    }

    /**
     * @param mixed ...$channels
     *
     * @return $this
     */
    public function channels(...$channels)
    {
        $this->data['channels'] = $this->flatten($channels);

        return $this;
    }

    /**
     * @return mixed
     */
    public function test()
    {
        return $this->notific->sendPrivateNotificationTest($this->id);
    }
}
