<?php

namespace App\Storage\Eloquent;

use App\Storage\UserRepositoryInterface;
use Exception;

class UserRepository extends Repository implements UserRepositoryInterface
{
    public function updateProfile($id, $data)
    {
        $user = $this->findOrFail($id);
        $user->name = $data['name'];
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

    public function create($data)
    {
        $this->model->name = $data['name'];
        $this->model->email = $data['email'];
        $this->model->password = bcrypt($data['password']);
        $this->model->save();

        return $this->model;
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

    public function delete($id)
    {
        if ($id == auth()->user()->id) {
            throw new Exception('Could not delete yourself.');
        }
        $user = $this->findOrFail($id);
        if ($user->name == 'admin') {
            throw new Exception('Could not delete user "admin".');
        }

        return $user->delete();
    }
}
?>