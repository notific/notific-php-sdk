<?php

namespace Notific\PhpSdk\Resources;

class Template extends ApiResource
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
    public $name;

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
    public $template;

    /**
     * @var
     */
    public $createdAt;

    /**
     * @var
     */
    public $updatedAt;

    /**
     * Template constructor.
     * @param array $attributes
     * @param null $notific
     */
    public function __construct(array $attributes, $notific = null)
    {
        parent::__construct($attributes, $notific);
    }

    /**
     * @param $recipients
     * @return mixed
     */
    public function sendTo($recipients)
    {
        $data['recipients'] = is_array($recipients) ? $recipients : [$recipients];

        return $this->notific->sendPrivateNotification($this->id, $data);
    }
}
