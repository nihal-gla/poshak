<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Support\Arr;

class AdminController extends Controller
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

    public function categories()
    {
        $categories = app()->call([$this->category, 'all']);
        return view('categories', compact('categories'));
    }

    public function deleteCategory($id)
    {
        $categories = app()->call([$this->category, 'deleteCategory'], ['id' => $id]);
        return view('categories', compact('categories'));
    }

    public function createCategoriesView()
    {
        $categories = app()->call([$this->category, 'all']);
        return view('partials.categoryEdit', compact('categories'));
    }

    public function editCategoriesView($id)
    {
        $categories = app()->call([$this->category, 'all']);
        $category = app()->call([$this->category, 'get'], ['id' => $id]);
        return view('partials.categoryEdit', compact('category', 'categories'));
    }

    public function createCategories()
    {
        $inputs = request()->all();
        $categories = app()->call([$this->category, 'create'], ['inputs' => $inputs]);
        return view('categories', compact('categories'));
    }

    public function editCategories($id)
    {
        $inputs = request()->all();
        $categories = app()->call([$this->category, 'edit'], ['id' => $id, 'inputs' => $inputs]);
        return view('categories', compact('categories'));
    }

    public function products()
    {
        $products = app()->call([$this->product, 'all']);
        $categories = app()->call([$this->category, 'all']);
        return view('products', compact('products', 'categories'));
    }

    public function deleteProduct($id)
    {
        $products = app()->call([$this->product, 'deleteProduct'], ['id' => $id]);
        $categories = app()->call([$this->category, 'all']);
        return view('products', compact('products', 'categories'));
    }

    public function createProductsView()
    {
        $categories = app()->call([$this->category, 'all']);
        return view('partials.productEdit', compact('categories'));
    }

    public function editProductsView($id)
    {
        $categories = app()->call([$this->category, 'all']);
        $product = app()->call([$this->product, 'get'], ['id' => $id]);
        return view('partials.productEdit', compact('product', 'categories'));
    }

    public function createProducts()
    {
        $inputs = request()->all();
        $imageName = time().'.'.request()->file('image')->extension();
        request()->file('image')->move(public_path('images'), $imageName);
        $inputs['image'] = $imageName;
        $categories = app()->call([$this->category, 'all']);
        $products = app()->call([$this->product, 'create'], ['inputs' => $inputs]);
        return view('products', compact('products', 'categories'));
    }

    public function editProducts($id)
    {
        $inputs = request()->all();
        if(Arr::get($inputs, 'image')){
            $imageName = time().'.'.request()->file('image')->extension();
            request()->file('image')->move(public_path('images'), $imageName);
            $inputs['image'] = $imageName;
        }
        $categories = app()->call([$this->category, 'all']);
        $products = app()->call([$this->product, 'edit'], ['id' => $id, 'inputs' => $inputs]);
        return view('products', compact('products', 'categories'));
    }
}
