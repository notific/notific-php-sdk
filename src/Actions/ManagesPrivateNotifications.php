<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\PrivateNotification;

trait ManagesPrivateNotifications
{
    /**
     * @param int $page
     *
     * @return mixed
     */
    public function privateNotifications($page = 1)
    {
        $notifications = $this->get('private-notifications?page='.$page);

        return $this->transformCollection($notifications, PrivateNotification::class);
    }

    /**
     * @param array $data
     *
     * @return PrivateNotification
     */
    public function createPrivateNotification(array $data)
    {
        $notification = $this->post('private-notifications', $data);

        return new PrivateNotification($notification['data'], $this);
    }

    /**
     * @param $notificationId
     *
     * @return PrivateNotification
     */
    public function privateNotification($notificationId)
    {
        $notification = $this->get('private-notifications/'.$notificationId);

        return new PrivateNotification($notification['data'], $this);
    }
}
