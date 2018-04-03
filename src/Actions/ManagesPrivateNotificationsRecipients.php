<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\Recipient;

trait ManagesPrivateNotificationsRecipients
{
    /**
     * @param $notificationId
     * @param array $parameters
     *
     * @return mixed
     */
    public function privateNotificationRecipients($notificationId, array $parameters = [])
    {
        $queryParameters = !empty($parameters) ? '?'.http_build_query($parameters, '', '&amp;') : '';

        $recipients = $this->get('private-notifications/'.$notificationId.'/recipients'.$queryParameters);

        return $this->transformCollection($recipients, Recipient::class);
    }

    /**
     * @param $notificationId
     * @param array $recipients
     *
     * @return mixed
     */
    public function sendPrivateNotification($notificationId, array $recipients)
    {
        return $this->post('private-notifications/'.$notificationId.'/recipients', $recipients);
    }

    /**
     * @param $notificationId
     * @return mixed
     */
    public function sendPrivateNotificationTest($notificationId)
    {
        return $this->post('private-notifications/'.$notificationId.'/recipients', ['test' => true]);
    }
}
