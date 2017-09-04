<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
   }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $id = Auth::user()->id;

      $products = \App\Product::where('user_id', $id)
                                ->paginate(6);
      return view('myaccount',['products' => $products]);
  }

  public function delete(Request $req)
  {
    foreach ($req->all() as $key => $value) {
      $product = \App\Product::find($key);

      $product->delete();
    };

    $id = Auth::user()->id;

      $products = \App\Product::where('user_id', $id)
                                ->paginate(6);

      return redirect()->route('myaccount',['products' => $products]);
  }

  public function modificar(Request $req)
  {

    $name = $req->only('name')['name'];

    $description = $req->only('description')['description'];
    $price = $req->only('price')['price'];
    $category_id = $req->only('category_id')['category_id'];
    $imageurl = $req->only('poster')['poster'];
    $id = $req->only('id')['id'];


    $product = \App\Product::where('id', $id)->first();

    $product->name = $name;
    $product->description = $description;
    $product->price = $price;
    $product->category_id = $category_id;
    if ($imageurl != null) {
      $file = $req->file("poster");
      $path = $req->file("poster")->storeAs("poster", $file->getClientOriginalName());
      $product->imageurl = "/storage/app/" . $path;
    }


    $product->save();

    $id = Auth::user()->id;

      $products = \App\Product::where('user_id', $id)
                                ->paginate(6);

      return redirect()->route('myaccount',['products' => $products]);
  }
}
