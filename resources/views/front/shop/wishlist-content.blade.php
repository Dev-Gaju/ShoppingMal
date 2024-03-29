@extends('front.master')

@section('main-content')
<aside id="colorlib-hero" class="breadcrumbs">
    <div class="flexslider">
        <ul class="slides">
           <li style="background-image:  url({{asset('/front')}}/images/cover-img-1.jpg);">
               <div class="overlay"></div>
               <div class="container-fluid">
                   <div class="row">
                       <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                           <div class="slider-text-inner text-center">
                               <h1>Wishlist</h1>
                               <h2 class="bread"><span><a href="index.html">Home</a></span> <span>Wishlist</span></h2>
                           </div>
                       </div>
                   </div>
               </div>
           </li>
          </ul>
      </div>
</aside>

<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>Product Details</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Price</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Quantity</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Total</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>Remove</span>
                    </div>
                </div>
                <div class="product-cart">
                    <div class="one-forth">
                        <div class="product-img" style="background-image:  url({{asset('/front')}}/images/item-6.jpg);">
                        </div>
                        <div class="display-tc">
                            <h3>Product Name</h3>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price">$68.00</span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price">$120.00</span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <a href="#" class="closed"></a>
                        </div>
                    </div>
                </div>
                <div class="product-cart">
                    <div class="one-forth">
                        <div class="product-img" style="background-image:  url({{asset('/front')}}/images/item-7.jpg);">
                        </div>
                        <div class="display-tc">
                            <h3>Product Name</h3>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price">$68.00</span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <form action="#">
                                <input type="text" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
                            </form>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price">$120.00</span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <a href="#" class="closed"></a>
                        </div>
                    </div>
                </div>
                <div class="product-cart">
                    <div class="one-forth">
                        <div class="product-img" style="background-image:  url({{asset('/front')}}/images/item-8.jpg);">
                        </div>
                        <div class="display-tc">
                            <h3>Product Name</h3>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price">$68.00</span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <input type="text" id="quantity" name="quantity" class="form-control input-number text-center" value="1" min="1" max="100">
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <span class="price">$120.00</span>
                        </div>
                    </div>
                    <div class="one-eight text-center">
                        <div class="display-tc">
                            <a href="#" class="closed"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
