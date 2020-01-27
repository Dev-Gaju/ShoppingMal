<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('front.home.home-content');
    }

      public function blogs(){

        return view('front.blog.blog-content');
      }

      public function contact(){
       return view('front.contact.contact-content');
      }

      public function shoppingitem(){
          $products=Product::where('publication_status',1)->get();
            return view('front.shop.shop-content')->with('products', $products);
            //return $products;

      }

      public  function productDetail(){
           return view('front.shop.product-details');
      }

       public function checkouts(){
           return view('front.shop.checkout-content');
       }
       public function wishlist(){
           return view('front.shop.wishlist-content');
       }
}
