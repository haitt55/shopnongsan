<?php

namespace App\Storage\Eloquent;

use App\Storage\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function findOrFail($id)
    {
        return User::findOrFail($id);
    }

    public function updateProfile($id, $data)
    {
        $user = $this->findOrFail($id);
        $user->email = $data['email'];
        $user->save();

        return $user;
    }

    public function updatePassword($id, $password)
    {
        $user = $this->findOrFail($id);
        $user->password = bcrypt($password);
        $user->save();

        return $user;
    }

    public function all()
    {
        return User::all();
    }

    public function store($data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->save();

        return $user;
    }

    public function update($id, $data)
    {
        $user = $this->findOrFail($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        if (!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        $user->save();

        return $user;
    }
}
?>