
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width,initial-scale=1" name="viewport">
        <meta content="Page description" name="description">
        <meta name="google" content="notranslate" />
        <meta content="" name="author">

        <title>Home</title>

        <link href={{ asset('css/app.css') }} rel="stylesheet">
    </head>

    <body>
        @if(isset($categories))
            @include('partials.header', ['categories' => $categories])
        @else
            @include('partials.header', ['categories' => []])
        @endif
        <section>
            <main class="" id="main-collapse">
                <div class="hero-full-wrapper">
                    <div class="grid">
                        <div class="gutter-sizer"></div>
                        <div class="grid-sizer"></div>
                        @foreach ($products as $product)
                            <div class="grid-item">
                                <img class="img-responsive" alt="" src={{ asset('images/'.$product->image) }}>
                                <a href="./project.html" class="project-description">
                                    <div class="project-text-holder">
                                        <div class="project-text-inner">
                                            <h3>{{ $product->description }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
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
