<?php

namespace Notific\PhpSdk\Resources;

class Recipient extends ApiResource
{
    /**
     * @var
     */
    public $recipientId;

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $meta;

    /**
     * @var
     */
    public $created_at;

    /**
     * Recipient constructor.
     *
     * @param array $attributes
     * @param null $notific
     */
    public function __construct(array $attributes, $notific = null)
    {
        parent::__construct($attributes, $notific);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function update($data)
    {
        return $this->notific->updateRecipient($this->id, $data);
    }

    /**
     * @param $tags
     * @return mixed
     */
    public function tag($tags)
    {
        $data['tags'] = is_array($tags) ? $tags : [$tags];

        return $this->notific->updateRecipient($this->id, $data);
    }

    /**
     * @param $tags
     * @return mixed
     */
    public function removeTags($tags)
    {
        $data['remove-tags'] = is_array($tags) ? $tags : [$tags];

        return $this->notific->updateRecipient($this->id, $data);
    }

    /**
     * @return mixed
     */
    public function removeAllTags()
    {
        return $this->notific->updateRecipient($this->id, ['remove-all-tags' => true]);
    }

    /**
     * @param $notification
     *
     * @return mixed
     */
    public function sendNotification($notification)
    {
        if ($notification instanceof PrivateNotification) {
            $notification = $notification->id;
        }

        return $this->notific->sendPrivateNotification($notification, [$this->recipientId]);
    }
}
