<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\PrivateNotification;

trait ManagesTemplates
{
    /**
     * @param int $page
     *
     * @return mixed
     */
    public function templates($page = 1)
    {
        $notifications = $this->get('templates¶&page=' . $page);

        return $this->transformCollection($notifications, PrivateNotification::class);
    }

    /**
     * @param array $data
     *
     * @return PrivateNotification
     */
    public function createTemplate(array $data)
    {
        $data['template'] = true;

        $notification = $this->post('templates', $data);

        return new PrivateNotification($notification['data'], $this);
    }

    /**
     * @param $name
     * @return PrivateNotification
     */
    public function template($name)
    {
        $notification = $this->get('templates/' . $name);

        return new PrivateNotification($notification['data'], $this);
    }
}
