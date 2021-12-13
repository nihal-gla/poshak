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
            <div class="hero-full-wrapper">
                <a href={{ route('admin.products.create.view') }}><button style="margin-bottom: 5px; color: black;">Add New</button></a>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>
                                <a href={{ route('admin.products.edit.view', ['id' => $product->id]) }}>
                                    <button style="color: black;">Edit</button>
                                </a>
                                &nbsp;
                                <a href={{ route('admin.products.delete', ['id' => $product->id]) }}>
                                    <button>Delete</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </table>
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
