<?php

namespace App\Storage;

interface PageRepositoryInterface
{
    public function findOrFail($id);

    public function all();

    public function store($data);

    public function update($id, $data);

    public function delete($id);
}
?>