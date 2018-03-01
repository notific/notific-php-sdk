<?php

namespace Notific\PhpSdk\Actions;

use Notific\PhpSdk\Resources\Template;

trait ManagesTemplates
{
    /**
     * @param int $page
     *
     * @return mixed
     */
    public function templates($page = 1)
    {
        $notifications = $this->get('templates¶&page='.$page);

        return $this->transformCollection($notifications, Template::class);
    }

    /**
     * @param array $data
     * @return Template
     */
    public function createTemplate(array $data)
    {
        $data['template'] = true;

        $notification = $this->post('templates', $data);

        return new Template($notification['data'], $this);
    }

    /**
     * @param $name
     * @return Template
     */
    public function template($name)
    {
        $notification = $this->get('templates/'.$name);

        return new Template($notification['data'], $this);
    }
}
