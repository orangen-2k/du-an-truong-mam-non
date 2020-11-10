<?php

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\BaseModelRepository;
use Carbon\Carbon;
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

    public function createNotifications($title = '', $content = '', $route = '', $user_id = '', $role = 1, $auth_id = '')
    {
        $data = Notification::create([
            'title'         => $title,
            'content'       => $content,
            'route'         => $route,
            'user_id'       => $user_id,
            'role'          => $role,
            'auth_id'       => $auth_id,
            'type'          => 1,
            'bell'          => 1,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);
        return $data;
    }

}
