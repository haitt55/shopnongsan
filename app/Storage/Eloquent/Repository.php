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
        $model = $this->findOrFail($id);
        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        return $this->findOrFail($id)->delete();
    }

    public function getByParams(array $params = [], $page = 1, $limit = 10)
    {
        $data = new \stdClass();
        $data->page = $page;
        $data->limit = $limit;
        $data->totalItems = 0;
        $data->items = [];
        $items = $this->criteria($params)
                ->skip($limit * ($page - 1))
                ->take($limit)
                ->get();
        $data->totalItems = $this->criteria($params)->count();
        $data->items = $items->all();

        return $data;
    }

    public function criteria(array $params = [])
    {
        return $this->model;
    }
}
?>