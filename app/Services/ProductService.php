<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Arr;

class ProductService
{
    protected $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function all($category=null)
    {
        $query = $this->product->query();
        if($category){
            $query->where('category_id', $category);
        }
        $products = $query->with('category')->get();
        return $products;
    }

    public function get($id)
    {
        $query = $this->product->query();
        $product = $query->where('id', $id)->first();
        return $product;
    }


    public function create($inputs)
    {
        $query = $this->product->query();
        $query->create([
            'name'          => Arr::get($inputs, 'name'),
            'image'         => Arr::get($inputs, 'image'),
            'description'   => Arr::get($inputs, 'description'),
            'price'         => Arr::get($inputs, 'price'),
            'discount'      => Arr::get($inputs, 'discount'),
            'quantity'      => Arr::get($inputs, 'quantity'),
            'category_id'   => Arr::get($inputs, 'category_id'),
        ]);
        $products = $this->product->all();
        return $products;
    }

    public function edit($id, $inputs)
    {
        $query = $this->product->query();
        $product = $query->where('id', $id)->first();
        if($product)
        {
            if($name = Arr::get($inputs, 'name'))
            $product->name          = $name;

            if($image = Arr::get($inputs, 'image'))
            $product->image         = $image;

            if($description = Arr::get($inputs, 'description'))
            $product->description   = $description;

            if($price = Arr::get($inputs, 'price'))
            $product->price         = $price;

            if($discount = Arr::get($inputs, 'discount'))
            $product->discount      = $discount;

            if($quantity = Arr::get($inputs, 'quantity'))
            $product->quantity      = $quantity;

            if($category_id = Arr::get($inputs, 'category_id'))
            $product->category_id   = $category_id;

        }
        $product->save();
        $products = $this->product->all();
        return $products;
    }

    public function deleteProduct($id)
    {
        $query = $this->product->query();
        $product = $query->where('id', $id)->first();
        if($product){
            $product->delete();
        }
        $query = $this->product->query();
        $products = $query->with('category')->get();
        return $products;
    }
}
