<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MainController extends Controller
{
    public function setUsers(): bool|string
    {
        $users = array(
            "name" => "Andrey",
            "email" => "lae345@mail.ru",
            "password" => "Andrew000",
        );

        return json_encode($users);
    }


    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $pr = Product::all();
        return view('search', compact('q', 'pr'));
    }
}
