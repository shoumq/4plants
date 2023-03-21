<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $pr = Product::where('title', 'LIKE', '%' . $q . '%')->get();
        return view('search', compact('q', 'pr'));
    }

    public function product(Request $request)
    {
        $pr = Product::where('id', $request->id)->get();
        $image = Image::where('id_product', $request->id)->get();
        return view('product', compact('pr', 'image'));
    }

    public function create()
    {
        $allImages = Image::all();
        return view('test', compact('allImages'));
    }

    public function setImages(Request $request)
    {
        $name = $request->file('image')->getClientOriginalName();
        $size = $request->file('image')->getSize();

        $request->file('image')->storeAs('public/images/', $name);

        $photo = new Image();
        $photo->name = $name;
        $photo->size = $size;
        $photo->id_product = 1;
        $photo->save();

        return redirect()->back();
    }

    public function products()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function productsSearchFun(Request $request)
    {
        $product = Product::where('title', 'LIKE', "%{$request->title}%")
            ->where('desc', 'LIKE', "%{$request->desc}%")
            ->get();
        return json_encode($product);
    }
}
