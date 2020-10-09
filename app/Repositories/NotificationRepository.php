<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\BaseModelRepository;

class NotificationRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        Notification $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return Notification::class;
    }

    public function createNotifications($title = '', $content = '', $route = '', $user_id = '', $auth_id = '')
    {
        $data = Notification::create([
            'title' => $title,
            'content' => $content,
            'route' => $route,
            'user_id' => $user_id,
            'auth_id' => $auth_id,
            'type' => 1,
            'bell' => 1,
        ]);
        return $data;
    }

}
