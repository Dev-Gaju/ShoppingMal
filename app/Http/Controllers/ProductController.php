<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use App\Sub_image;

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

        $exoloded = explode(',', $request->product_image);
        $decode = base64_decode($exoloded[1]);
        if (str_contains($exoloded[0], 'jpeg'))

            $extension = 'jpg';
        else
            $extension = 'png';
        $fileName = str_random() . '.' . $extension;
        $path = ('images/') . '/' . $fileName;
        file_put_contents($path, $decode);


        $product = Product::create([
            'product_name' => $request['product_name'],
            'product_price' => $request['product_price'],
            'product_quantity' => $request['product_quantity'],
            'short_description' => $request['short_description'],
            'full_description' => $request['full_description'],
            'publication_status' => $request['publication_status'],
            'brand_id' => $request['brand_id'],
            'category_id' => $request['category_id'],
            'product_image' => $path,
        ]);
        $product->save();
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
