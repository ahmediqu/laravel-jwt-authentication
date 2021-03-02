<?php


namespace App\Services;


use App\Models\User;

class AuthService extends BaseService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function saveUser()
    {
        $this->model->create([
            'name' => $this->getAttr('name'),
            'email' => $this->getAttr('email'),
            'password' => bcrypt($this->getAttr('password'))
        ]);
    }
}
