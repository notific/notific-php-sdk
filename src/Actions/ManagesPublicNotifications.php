<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\PublicNotification;

trait ManagesPublicNotifications
{
    /**
     * @param array $parameters
     * @return mixed
     */
    public function publicNotifications(array $parameters = [])
    {
        $queryParameters = !empty($parameters) ? '?' . http_build_query($parameters, '', '&amp;') : '';

        $notifications = $this->get('public-notifications' . $queryParameters);

        return $this->transformCollection($notifications, PublicNotification::class);
    }

    /**
     * @param array $data
     *
     * @return PublicNotification
     */
    public function createPublicNotification(array $data)
    {
        $notification = $this->post('public-notifications', $data);

        return new PublicNotification($notification['data'], $this);
    }

    /**
     * @param $notificationId
     *
     * @return PublicNotification
     */
    public function publicNotification($notificationId)
    {
        $notification = $this->get('public-notifications/' . $notificationId);

        return new PublicNotification($notification['data'], $this);
    }

    /**
     * @param $notificationId
     * @param array $data
     *
     * @return PublicNotification
     */
    public function updatePublicNotification($notificationId, array $data)
    {
        $notification = $this->put('public-notifications/' . $notificationId, $data);

        return new PublicNotification($notification['data'], $this);
    }

    /**
     * @param $notificationId
     *
     * @return mixed
     */
    public function deletePublicNotification($notificationId)
    {
        return $this->delete('public-notifications/' . $notificationId);
    }
}
