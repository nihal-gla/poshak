<header class="main-header">
    <div class="navbar navbar-default visible-xs">
        <button type="button" class="navbar-toggle collapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="./index.html" class="navbar-brand">POSHAK</a>
    </div>

    <nav class="sidebar">
        <div class="navbar-collapse" id="navbar-collapse">
            <div class="site-header hidden-xs">
                <a class="site-brand" href="./index.html" title="">
                    <img class="img-responsive site-logo" alt="" src={{ asset('images/logo.png') }}> POSHAK
                </a>
                <p>We provide best quality traditional collections of Dresses, Accessories and Footwears for men and
                    women.</p>
            </div>
            <ul class="nav" style="margin-bottom: 20px;">
                <li><u><strong>CATEGORIES</strong></u></li>
                <li><a href={{ route('home') }}>All</a></li>
                @foreach ($categories as $category)
                    <li class="categories-li"><a href={{ route('home')."?category=".$category->id }} title="">{{ $category->name }}</a></li>
                @endforeach
            </ul>

            <ul class="nav" style="margin-bottom: 20px;">
                <li><u><strong>ADMIN</strong></u></li>
                <li class="categories-li"><a href={{ route('admin.categories') }} title="">Categories</a></li>
                <li class="categories-li"><a href={{ route('admin.products') }} title="">Products</a></li>
            </ul>
        </div>
    </nav>
</header>
