<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $pr = Product::all();
        return view('admin', compact('pr'));
    }
}
