<?php

namespace App\Storage;

interface UserRepositoryInterface
{
    public function findOrFail($id);
    
    public function updateProfile($id, $data);

    public function updatePassword($id, $password);
}
?>