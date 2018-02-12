<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\Recipient;

trait ManagesRecipients
{
    /**
     * @param int $page
     * @return mixed
     */
    public function recipients($page = 1)
    {
        $recipients = $this->get('recipients?page=' . $page);

        return $this->transformCollection($recipients, Recipient::class);
    }

    /**
     * @param array $data
     * @return Recipient
     */
    public function createRecipient(array $data)
    {
        $recipient = $this->post('recipients', $data);

        return new Recipient($recipient['data'], $this);
    }

    /**
     * @param $recipiendId
     * @return Recipient
     */
    public function recipient($recipiendId)
    {
        $recipient = $this->get('recipients/' . $recipiendId);

        return new Recipient($recipient['data'], $this);
    }
}
