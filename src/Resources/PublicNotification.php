<?php

namespace Notific\PhpSdk\Resources;

class PublicNotification extends ApiResource
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $status;

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
    public $newTill;

    /**
     * @var
     */
    public $activeTill;

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
     * @param array $data
     * @return mixed
     */
    public function update(array $data)
    {
        return $this->notific->updatePublicNotification($this->id, $data);
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        return $this->notific->deletePublicNotification($this->id);
    }
}