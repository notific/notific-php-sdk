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
     *
     * @param array $attributes
     * @param null  $notific
     */
    public function __construct(array $attributes, $notific = null)
    {
        parent::__construct($attributes, $notific);
    }

    /**
     * @param $recipients
     *
     * @return mixed
     */
    public function sendTo($recipients)
    {
        $data['recipients'] = is_array($recipients) ? $recipients : [$recipients];

        return $this->notific->sendPrivateNotification($this->id, $data);
    }

    /**
     * @return mixed
     */
    public function test()
    {
        return $this->notific->sendPrivateNotificationTest($this->id);
    }
}
