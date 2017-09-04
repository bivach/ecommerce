@extends('layouts.app')



@section('content')
 {{-- <div class="faq-page">
 <div class="faq">

 </div>
 </div> --}}

 <div class="container">
   @php
   $categories = \App\Category::all();
   $users = \App\User::all();
   @endphp
   <form style="margin-top: 20px; margin-left: 20px;"class="" action="/buy" method="get" enctype="multipart/form-data">
     {{ csrf_field() }}

     <div class="form-group">
       <label for="">Filtrar por Raza</label>
       <select name="category_id">
         @foreach ($categories as $category)
           @if ($categoryInput !=null && $category->id == $categoryInput)
             <option value="{{$category->id}}" selected>
               {{$category->name}}
             </option>
           @else
             <option value="{{$category->id}}">
               {{$category->name}}
             </option>
           @endif

         @endforeach
       </select>
     </div>

     <div class="form-group">
       <input class="btn btn-primary" type="submit" value="Aplicar">
     </div>

     @if (count($products) == 0)
         <br />
         <br />
         <h3 style="margin: 0 auto; display:table; color:#1d1d50;">No se encontraron publicaciones</h1>
     @endif

   </form>

  <div class="container" style = "margin-top: 30px">
    @foreach ($products->chunk(3) as $productChunk)
    <div class="row">
       @foreach ($productChunk as $product)
      <div class="col-sm-4">
        <div class="thumbnail">
          <img class="imgcustom" src="{{$product->imageurl}}" alt="...">
          <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>${{$product->price}}</p>
            <p><a href="#" class="btn btn-primary" role="button" data-toggle="modal" data-target="#{{$product->id}}">Detalles</a> </p>
          </div>
        </div>
      </div>
        @endforeach
    </div>
    @endforeach
    {{-- Details --}}
    @foreach ($products as $product)
      <div class="modal fade product_view" id="{{$product->id}}">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                      <h3 class="modal-title">{{$product->name}}</h3>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6 product_img">
                              <img src="{{$product->imageurl}}" class="img-responsive">
                          </div>
                          <div class="col-md-6 product_content">
                              <h4>Raza: <span>{{$categories[$product->category_id - 1]->name}}</span></h4>
                              <h4>Dueño: <span>{{$users[$product->user_id - 1]->name}}</span></h4>
                              <h4>email: <span>{{$users[$product->user_id - 1]->email}}</span></h4>

                              <p>{{$product->description}}</p>
                              <h3 class="cost"><span class="glyphicon glyphicon-usd"></span>{{$product->price}} <small class="pre-cost"><span ></span> </small></h3>
                              <div class="row">
                                  {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                                      <select class="form-control" name="select">
                                          <option value="" selected="">Color</option>
                                          <option value="black">Black</option>
                                          <option value="white">White</option>
                                          <option value="gold">Gold</option>
                                          <option value="rose gold">Rose Gold</option>
                                      </select>
                                  </div>
                                  <!-- end col -->
                                  <div class="col-md-4 col-sm-6 col-xs-12">
                                      <select class="form-control" name="select">
                                          <option value="">Capacity</option>
                                          <option value="">16GB</option>
                                          <option value="">32GB</option>
                                          <option value="">64GB</option>
                                          <option value="">128GB</option>
                                      </select>
                                  </div>
                                  <!-- end col -->
                                  <div class="col-md-4 col-sm-12">
                                      <select class="form-control" name="select">
                                          <option value="" selected="">QTY</option>
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                      </select>
                                  </div>
                                  <!-- end col --> --}}
                              </div>
                              <div class="space-ten"></div>
                              <div class="btn-ground">
                                  <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar al Carrito</button>
                                  {{-- <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-heart"></span> Add To Wishlist</button> --}}
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

     @endforeach


    {{ $products->links() }}


  </div>

    </div>





@endsection
