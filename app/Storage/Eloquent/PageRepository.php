<?php

namespace App\Storage\Eloquent;

use App\Storage\PageRepositoryInterface;
use App\Models\Page;

class PageRepository implements PageRepositoryInterface
{
    public function findOrFail($id)
    {
        return Page::findOrFail($id);
    }

    public function updateProfile($id, $data)
    {
        $page = $this->findOrFail($id);
        $page->save();

        return $page;
    }

    public function updatePassword($id, $password)
    {
        $page = $this->findOrFail($id);
        $page->save();

        return $page;
    }

    public function all()
    {
        return Page::all();
    }

    public function store($data)
    {
        $page = new Page();
        $page->save();

        return $page;
    }

    public function update($id, $data)
    {
        $page = $this->findOrFail($id);
        $page->save();

        return $page;
    }

    public function delete($id)
    {
        $page = $this->findOrFail($id);

        return $page->delete();
    }
}
?>