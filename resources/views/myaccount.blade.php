@extends('layouts.app')

@section('content')

  @php
  $categories = \App\Category::all();
  $users = \App\User::all();
  @endphp

  <div class="container" style = "margin-top: 30px">
    <h1 style="margin: 0 auto; display:table; color:#1d1d50;">Bienvenido {{Auth::user()->name}}</h1>
    <br />
    <div class="home">
          <label>
            <h2><a class="links" id="buysell" href="vender">Vender</a></h2>
          </label>
    </div>

    <div class="home">
          <label>
            <h2><a class="links" id="buysell" >Mis Publicaciones</a></h2>
          </label>
    </div>

    @if (count($products) == 0)
        <br />
        <br />
        <h3 style="margin: 0 auto; display:table; color:#1d1d50;">No se encontraron publicaciones</h1>
    @endif
    @foreach ($products->chunk(3) as $productChunk)
      <div class="row">
               @foreach ($productChunk as $product)
              <div class="col-sm-4">
                <div class="thumbnail">
                  <img class="imgcustom" src="{{$product->imageurl}}" alt="...">
                  <div class="caption">
                    <h3>{{$product->name}}</h3>
                    <p>${{$product->price}}</p>
                    <p><a href="" class="btn btn-success" role="button" data-toggle="modal" data-target="#{{$product->id}}">Editar</a>   <a href="{{ route('delete', $product->id) }}" class="btn btn-danger" role="button">Eliminar</a></p>
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
               <div style="margin:10px;" class="modal-content">
                   <div class="modal-header">
                       <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                       <h3 class="modal-title">Editar Publicación</h3>
                   </div>
                   <div class="modal-body">
                     <form class="" name="{{$product->id}}" action="{{ route('modificar'), $product->id }}" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="form-group">
                         <label for="">Título</label>
                         <input class="form-control" type="text" name="name" value="{{$product->name}}">
                       </div>
                       <div class="form-group">
                         <label for="">Precio</label>
                         <input class="form-control" type="text" name="price" value="{{$product->price}}">
                       </div>
                       <div style="display: none;"class="form-group">
                         <label for="">Id</label>
                         <input class="form-control" type="text" name="id" value="{{$product->id}}">
                       </div>
                       <div class="form-group">
                         <label for="">Breve Descripción</label>
                         <input type="text" class="form-control" name="description" value="{{$product->description}}">
                       </div>

                       <div class="form-group">
                         <label for="">Raza</label>
                         <select name="category_id">
                           @foreach ($categories as $category)
                             @if ($category->id == $product->category_id)
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

                       <label class="control-label">Seleccione una Imagen</label>
                         <input id="input-3a" name="poster" type="file" class="file" readonly="true">

                         <br/>

                       <div class="form-group">
                         <input class="btn btn-primary" name="{{$product->id}}" type="submit" value="Editar Publicación">
                       </div>
                     </form>
                   </div>
               </div>
           </div>
       </div>

      @endforeach

            {{ $products->links() }}

  </div>

@endsection
