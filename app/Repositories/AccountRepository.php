<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use App\User;

class AccountRepository extends BaseModelRepository
{
    protected $model;
    public function __construct(
        User $model
    ) {
        parent::__construct();
        $this->model = $model;
    }

    public function getModel()
    {
        return User::class;
    }

    public function getAllSchool($params = [])
    {
        $keyword = $params['keyword'];
        $data = $this->model::where('role', $params['role']);
        if (isset($params['keyword']) && $params['keyword'] != null) {
            $data->where(function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%')
                    ->orWhere('username', 'like', '%' . $keyword . '%')
                    ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
        if (isset($params['active']) && $params['active'] != null) {
            $data->where('active', $params['active']);
        }
        return $data->paginate($params['page_size']);
    }

    public function KhoaTaiKhoan($id_user)
    {
        return $this->model::where('id',$id_user)->update(['active'=>2]);
    }

}
