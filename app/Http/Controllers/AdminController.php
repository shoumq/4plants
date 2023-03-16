<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                return redirect('/admin/users');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function users()
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                $users = User::all();
                return view('adminusers', compact('users'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function products()
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                $products = Product::all();
                return view('adminproducts', compact('products'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function usersSearch(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                return User::where('name', 'LIKE', "%{$request->name}%")
                    ->where('surname', 'LIKE', "%{$request->surname}%")
                    ->where('email', 'LIKE', "%{$request->email}%")
                    ->where('phone', 'LIKE', "%{$request->phone}%")
                    ->get();
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function productsSearch(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                return Product::where('title', 'LIKE', "%{$request->title}%")
                    ->where('desc', 'LIKE', "%{$request->desc}%")
                    ->where('active', 'LIKE', "%{$request->active}%")
                    ->get();
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function productEdit($id)
    {
        if (Auth::check()) {
            $image = Image::where('id_product', $id)->get();
            $pr = Product::where('id', $id)->get();
            return view('productedit', compact('pr', 'image'));
        } else {
            return redirect('/');
        }
    }
}
