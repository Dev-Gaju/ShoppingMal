<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Image;
use App\Sub_image;
use Response;


class ProductController extends Controller
{

    public function index()
    {
        $Category = Category::where('publication_status', 1)->get();
        $brand = Brand::where('publication_status', 1)->get();
        $data['category'] = $Category;
        $data['brand'] = $brand;
        $information = json_encode($data);
        return $information;
    }

    public function saveProduct(Request $request)
    {


        $this->validate($request, [
            'product_name' => 'required|string',
            'product_price' => 'required|string:255',
            'product_quantity' => 'required|string:255',
            'short_description' => 'required',
            'full_description' => 'required',
            'publication_status' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'product_image' => 'required',
           'sub_image' => 'required'

        ]);





            //single image
            $strpos=strpos($request->product_image, ';'); //Find the path in substring of a string
            $substr= substr($request->product_image,0, $strpos); //return part of string
            $ex=explode('/', $substr)[1]; //split a string by string
            $name=time().".".$ex; //image name with date
            $image=Image::make($request->product_image)->resize(200,200); //upload and resize
            $public_path=public_path()."/product_image/"; //select the path where you want store
            $imageUrl="/product_image/".$name; //for database store
            $image->save($public_path.$name); //save in folder

            //data save
            $product= Product::create([
                'product_name' => $request['product_name'],
                'product_price' => $request['product_price'],
                'product_quantity' => $request['product_quantity'],
                'short_description' => $request['short_description'],
                'full_description' => $request['full_description'],
                'publication_status' => $request['publication_status'],
                'brand_id' => $request['brand_id'],
                'category_id' => $request['category_id'],
                 'product_image' => $imageUrl
            ]);

            $productid=$product->id;


         //multiple image saved
           $multipleImages=$request['sub_image']; //count($multipleImages)
           foreach($multipleImages as $multipleImage){
           $strpos=strpos($multipleImage, ';'); //Find the path in substring of a string
           $substr= substr($multipleImage,0, $strpos); //return part of string
           $ex=explode('/', $substr)[1]; //split a string by string
           $name=rand(1,1000).".".$ex; //image name with date
           $image=Image::make($multipleImage); //upload and resize
           $public_path=public_path()."/sub-Image/"; //select the path where you want store
           $isubmageUrl="/sub-Image/".$name; //for database store
           $image->save($public_path.$name); //save in folder
           $subImage=Sub_image::create([
            'product_id' => $productid,
            'sub_image'=> $isubmageUrl
          ]);

        }
            return Response::json(array(
                'product'=> $product,
                'subImage'=>$subImage

            ));

    }



    public function showProduct()
    {
        $products = Product::all();
        $i = 0;
        foreach ($products as $product) {
            $product->brand;
            $product->category;
            $data[$i++] = [$product];
        }
        $p = json_encode($data);
        return $p;
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function UpdateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
    }
}
