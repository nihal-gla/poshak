<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;

class HomeService
{
    protected $category;
    protected $product;

    public function __construct(Category $category, Product $product) {
        $this->category = $category;
        $this->product = $product;
    }

    public function index()
    {
    }


}
