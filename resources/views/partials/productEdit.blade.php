<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <meta content="Page description" name="description">
    <meta name="google" content="notranslate" />
    <meta content="" name="author">

    <title>@yield('title')</title>

    <link href={{ asset('css/app.css') }} rel="stylesheet">
</head>

<body>
    @if (isset($categories))
        @include('partials.header', ['categories' => $categories])
    @else
        @include('partials.header', ['categories' => []])
    @endif

    <section>
        <main class="" id="main-collapse">
            <div class="hero-full-wrapper" style="text-align: initial">
                @if (isset($product))
                    <h2>Edit Product</h2>
                @else
                    <h2>Add Product</h2>
                @endif

                <form enctype="multipart/form-data" action="@if (isset($product))
                    {{ route('admin.products.edit.view', ['id' => $product->id]) }}
                @else
                    {{ route('admin.products.create.view') }}
                    @endif" method="POST" class="reveal-content">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Name
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input maxlength="255" type="text" class="form-control" name="name" required placeholder="Enter product name"
                                    @if (isset($product))
                                value="{{ $product->name }}"
                                @endif >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Image
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="file" class="form-control" @if (!isset($product)) required @endif name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Description
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input maxlength="255" type="text" class="form-control" required name="description" placeholder="Enter brief product description"
                                    @if (isset($product))
                                value="{{ $product->description }}"
                                @endif >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Price
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="price" required placeholder="Enter product price"
                                    @if (isset($product))
                                value="{{ $product->price }}"
                                @endif >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Discount
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="discount" required placeholder="Enter product discount"
                                    @if (isset($product))
                                value="{{ $product->discount }}"
                                @endif >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Quantity
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="quantity" required placeholder="Enter product quantity"
                                    @if (isset($product))
                                value="{{ $product->quantity }}"
                                @endif >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Product Category
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if (isset($product) &&  $product->category_id == $category->id)
                                    selected
                                    @endif>{{ $category->name }}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9" style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function(event) {
                    masonryBuild();
                });
            </script>
        </main>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            navbarToggleSidebar();
            navActivePage();
        });
    </script>
    <script type="text/javascript" src={{ asset('js/app.js') }}></script>
</body>

</html>
