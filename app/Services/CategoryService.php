<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Arr;

class CategoryService
{
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function all()
    {
        $categories = $this->category->all();
        return $categories;
    }


    public function get($id)
    {
        $query = $this->category->query();
        $category = $query->where('id', $id)->first();
        return $category;
    }

    public function create($inputs)
    {
        $query = $this->category->query();
        $query->create([
            'name' => Arr::get($inputs, 'name')
        ]);
        $categories = $this->category->all();
        return $categories;
    }

    public function edit($id, $inputs)
    {
        $query = $this->category->query();
        $category = $query->where('id', $id)->first();
        $category->name = Arr::get($inputs, 'name');
        $category->save();
        $categories = $this->category->all();
        return $categories;
    }

    public function deleteCategory($id)
    {
        $query = $this->category->query();
        $category = $query->where('id', $id)->first();
        if($category){
            $category->products()->delete();
            $category->delete();
        }
        $query = $this->category->query();
        $categories = $this->category->all();
        return $categories;
    }


}
