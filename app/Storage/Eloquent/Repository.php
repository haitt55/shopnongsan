<?php

namespace App\Storage\Eloquent;

use App\Storage\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findOrFail($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function all($columns = array('*'))
    {
        return $this->model->all($columns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->findOrFail($id)->update($data);
    }

    public function delete($id)
    {
        return $this->findOrFail($id)->delete();
    }
}
?>