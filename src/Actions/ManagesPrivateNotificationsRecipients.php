<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\Recipient;

trait ManagesPrivateNotificationsRecipients
{
    /**
     * @param $notificationId
     * @param int $page
     *
     * @return mixed
     */
    public function privateNotificationRecipients($notificationId, $page = 1)
    {
        $recipients = $this->get('private-notifications/'.$notificationId.'/recipients?page='.$page);

        return $this->transformCollection($recipients, Recipient::class);
    }

    /**
     * @param $notificationId
     * @param array $recipients
     * @return mixed
     */
    public function sendPrivateNotification($notificationId, array $recipients)
    {
        return $this->post('private-notifications/'.$notificationId.'/recipients', $recipients);
    }
}
