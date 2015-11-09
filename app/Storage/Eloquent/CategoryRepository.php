<?php

namespace App\Storage\Eloquent;

use App\Storage\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function findOrFail($id)
    {
        return Category::findOrFail($id);
    }

    public function all()
    {
        return Category::all();
    }

    public function store($data)
    {
        $category = new Category();
        $category->save();

        return $category;
    }

    public function update($id, $data)
    {
        $category = $this->findOrFail($id);
        $category->save();

        return $category;
    }

    public function delete($id)
    {
        $category = $this->findOrFail($id);

        return $category->delete();
    }
}
?>