<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="/">Store</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="/">Home</a></li>
                            <li class="has-dropdown">
                                <a href="{{url('/shops')}}">Shop</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/product-details') }}">Product Detail</a></li>
                                    <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                                    {{-- <li><a href="order-complete.html">Order Complete</a></li> --}}
                                    {{-- <li><a href="add-to-wishlist.html">Wishlist</a></li> --}}
                                </ul>
                            </li>
                            <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
                            <li><a href="{{ url('/addTocart') }}"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
                            <li><a href="{{url('/blogs')}}">Blog</a></li>
                            <li><a href="{{url('/contacts')}}">Contact</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
