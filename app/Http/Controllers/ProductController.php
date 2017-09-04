<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
{

  public function index(Request $req)
  {
      $data = $req->only("category_id");
      if ($data['category_id'] != null) {
        $categoryInput = $data['category_id'];
        $products = \App\Product::where ('category_id', $data['category_id'])
                                  ->paginate(6);
                                  $products->withPath('buy?category_id=' . $req->input('category_id'));
        return view('buy',['products' => $products,'categoryInput' => $categoryInput]);
      }else {
        $categoryInput = null;
        $products = \App\Product::paginate(6);
        return view('buy',['products' => $products,'categoryInput' => $categoryInput]);
      }
  }

  public function search(Request $request)
  {

    $id = Auth::user()->id;
    $data = $request->only("category_id");

      if ($data['category_id'] != null) {
        $categoryInput = $data['category_id'];
        $products = \App\Product::where('name', 'like',"%" . $request->input('results') . "%")
                                  ->where ('category_id', $data['category_id'])
                                  ->paginate(6);
                                  $products->withPath('search?results=' . $request->input('results') . '&category_id=' . $request->input('category_id'));
                                  return view('search',['products' => $products,'categoryInput' => $categoryInput]);


      }else {
        $categoryInput = null;
        $products = \App\Product::where('name', 'like',"%" . $request->input('results') . "%")
                                  ->paginate(6);
                                  $products->withPath('search?results=' . $request->input('results'));
        return view('search',['products' => $products,'categoryInput' => $categoryInput]);
      }



  }

}
