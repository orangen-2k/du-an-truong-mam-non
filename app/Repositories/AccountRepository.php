<?php

namespace App\Repositories;

use App\Repositories\BaseModelRepository;
use App\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

    public function storeAcount( $data ){
        $token = Str::random(60).md5(time());
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['email'],
            'password' => Hash::make($data['email']),
            'token' => $token,
            'role' => $data['role'],
            'time_code' => Carbon::now()
        ]);
    
        $email = $user->email;
        $url = route('password.reset',['token' => $token,'email' => $data['email']]);
        $send_data=[
            'route' => $url,
            'title' => "Tài khoản được đăng ký thành công !"
        ];
        Mail::send('auth.email_dang_ky', $send_data, function($message) use ($email){
	        $message->to($email, 'Reset password')->subject('New Account Susses!');
        });

        return $user;
    }

}
