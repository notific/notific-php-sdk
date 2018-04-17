<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\PrivateNotification;

trait ManagesPrivateNotifications
{
    /**
     * @param array $parameters
     *
     * @return mixed
     */
    public function privateNotifications(array $parameters = [])
    {
        $queryParameters = !empty($parameters) ? '?'.http_build_query($parameters) : '';

        $notifications = $this->get('private-notifications'.$queryParameters);

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
