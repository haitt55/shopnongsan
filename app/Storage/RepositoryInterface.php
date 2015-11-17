<?php

namespace App\Storage;

interface RepositoryInterface
{
    public function findOrFail($id, $columns = array('*'));

    public function all($columns = array('*'));

    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function getByParams(array $params = [], $page = 1, $limit = 10);

    public function criteria(array $params = []);
}
?>