@extends('layouts.app')

@section('content')


  <div class="container">
    <h1>Agregar Publicación</h1>
    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
      @endforeach
    </ul>
    <form class="" action="/vender" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="">Título</label>
        <input class="form-control" type="text" name="name" value="{{old("name")}}">
      </div>
      <div class="form-group">
        <label for="">Precio</label>
        <input class="form-control" type="text" name="price" value="{{old("price")}}">
      </div>
      <div class="form-group">
        <label for="">Breve Descripción</label>
        <input type="text" class="form-control" name="description" value="{{old("description")}}">
      </div>

      <div class="form-group">
        <label for="">Raza</label>
        <select name="category_id">
          @foreach ($categories as $category)
            @if ($category->id == old("category_id"))
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
        <input class="btn btn-primary" type="submit" value="Agregar Publicación">
      </div>

    </form>
  </div>
@endsection
