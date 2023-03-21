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
            if (Auth::user()->admin == 1) {
                $image = Image::where('id_product', $id)->get();
                $pr = Product::where('id', $id)->get();
                return view('productedit', compact('pr', 'image'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function productAdd(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                $image = Image::all();
                $pr = Product::all();
                return view('productadd', compact('image', 'pr'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function imageAdd(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                $products = Product::all();
                $images = Image::all();
                return view('adminimage', compact('products', 'images'));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }


    public function imageAddFun(Request $request, $id)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                $name = $request->file('image')->getClientOriginalName();
                $size = $request->file('image')->getSize();

                $request->file('image')->storeAs('public/images/', $name);

                $photo = new Image();
                $photo->name = $name;
                $photo->size = $size;
                $photo->id_product = $id;
                $photo->save();

                return redirect()->back();
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function imageFind(Request $request, $id) {
        $images = Image::where('id_product', $id)->get();
        return json_encode($images);
    }

    public function productAddFun(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                $name = $request->file('image')->getClientOriginalName();
                $size = $request->file('image')->getSize();

                $request->file('image')->storeAs('public/images/', $name);

                $product = new Product();
                $product->title = $request->title;
                $product->desc = $request->desc;
                $product->price = $request->price;
                $product->active = 1;
                $product->image = $name;
                $product->save();

                $photo = new Image();
                $photo->name = $name;
                $photo->size = $size;
                $photo->id_product = $product->id;
                $photo->save();

                return redirect()->back();
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function deleteProduct($id)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                Product::destroy($id);
                return json_encode(array("state" => "ok"));
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function imageDelFun($id) {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                Image::destroy($id);
                return redirect()->back();
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    public function productEditFun(Request $request)
    {
        if (Auth::check()) {
            if (Auth::user()->admin == 1) {
                if ($request->hasFile('image')) {
                    $name = $request->file('image')->getClientOriginalName();
                    $size = $request->file('image')->getSize();
                    $request->file('image')->storeAs('public/images/', $name);

                    $product = Product::find($request->id);
                    $product->title = $request->title;
                    $product->desc = $request->desc;
                    $product->price = $request->price;
                    $product->image = $name;
                    $product->save();

                    $photo = new Image();
                    $photo->name = $name;
                    $photo->size = $size;
                    $photo->id_product = $product->id;
                    $photo->save();
                } else {
                    $product = Product::find($request->id);
                    $product->title = $request->title;
                    $product->desc = $request->desc;
                    $product->price = $request->price;
                    $product->save();
                }
                return redirect()->back();
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }
}
