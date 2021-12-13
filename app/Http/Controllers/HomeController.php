<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    /**
    * @var ProductService
    */
    protected $product;

    /**
    * @var CategoryService
    */
    protected $category;

    public function __construct(ProductService $product, CategoryService $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function index()
    {
        $inputs = request()->all();
        $category = Arr::get($inputs, 'category', null);
        $categories = app()->call([$this->category, 'all']);
        $products = app()->call([$this->product, 'all'], ['category' => $category]);
        return view('home', compact('categories', 'products'));
    }
}
