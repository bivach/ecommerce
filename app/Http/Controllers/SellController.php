<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SellController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
   }


  public function index()
  {
    $categories = \App\Category::all();

      return view('sell',['categories' => $categories]);
  }


  public function save(Request $req) {
      $datos = $req->only("name", "price", "description", "category_id");
      $reglas = [
        "name" => "required",
        "price" => "required|numeric",
        "description" => "required",
        "category_id" => "required|int|min:1",
      ];
      $this->validate($req, $reglas);
      // $actores = $req->only("actores");
      $product = new \App\Product();
      $product->name = $datos['name'];
      $product->price = $datos['price'];
      $product->description = $datos['description'];
      $product->category_id = $datos['category_id'];
      $id = Auth::user()->id;
      $product->user_id = $id;
      // foreach ($actores as $actor) {
      //   $product->actors()->attach($actor);
      // }
      $file = $req->file("poster");
      $ext = $file->extension();
      $path = $req->file("poster")->storeAs("posters", $file->getClientOriginalName());
      $product->imageurl = "/storage/app/" . $path;
      $product->save();
      return redirect('/myaccount');
    }
}
