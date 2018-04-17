<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\Recipient;

trait ManagesRecipients
{
    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function recipients(array $parameters = [])
    {
        $queryParameters = !empty($parameters) ? '?'.http_build_query($parameters) : '';

        $recipients = $this->get('recipients'.$queryParameters);

        return $this->transformCollection($recipients, Recipient::class);
    }

    /**
     * @param array $data
     *
     * @return Recipient
     */
    public function createRecipient(array $data)
    {
        $recipient = $this->post('recipients', $data);

        return new Recipient($recipient['data'], $this);
    }

    /**
     * @param $recipiendId
     *
     * @return Recipient
     */
    public function recipient($recipiendId)
    {
        $recipient = $this->get('recipients/'.$recipiendId);

        return new Recipient($recipient['data'], $this);
    }

    /**
     * @param $recipiendId
     * @param array $data
     *
     * @return Recipient
     */
    public function updateRecipient($recipiendId, array $data)
    {
        $recipient = $this->put('recipients/'.$recipiendId, $data);

        return new Recipient($recipient['data'], $this);
    }
}
