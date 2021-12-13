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
                @if (isset($category))
                    <h2>Edit Category</h2>
                @else
                    <h2>Add Category</h2>
                @endif

                <form action="@if (isset($category))
                    {{ route('admin.category.edit.view', ['id' => $category->id]) }}
                @else
                    {{ route('admin.category.create.view') }}
                    @endif" method="POST" class="reveal-content">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="label">
                                Category Name
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Enter category name"
                                    @if (isset($category))
                                value="{{ $category->name }}"
                                @endif >
                            </div>
                        </div>
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
