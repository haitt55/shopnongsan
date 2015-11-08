<?php

namespace App\Storage;

interface UserRepositoryInterface
{
    public function findOrFail($id);
    
    public function updateProfile($id, $data);

    public function updatePassword($id, $password);

    public function all();

    public function store($data);

    public function update($id, $data);
}
?>