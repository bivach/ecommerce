@extends('layouts.app')


@section('content')
  <div class="container">

  <div style="margin-top: 30px;"class="home">
        <label>
          <h2><a class="links" id="buysell" href="buy">Comprar</a></h2>
        </label>
  </div>
  <div class="home">
        <label>
          <h2><a class="links" id="buysell" href="vender">Vender</a></h2>
        </label>
  </div>
 <div class="faq-page">
 <div class="faq">
   <div id="carousel-example" class="carousel slide" data-ride="carousel">


     <div class="carousel-inner">
       <div class="item active">
         <a ><img id='imagen' src="img/perro-3.jpg" /></a>
         <div class="carousel-caption">
           <a style="zindex: 1"class="links" href="/buy"><h3>Lo mejor para tus Mascotas</h3></a>
           <a class="links" href="/buy"><p>Encuentra todas las mascotas al mejor precio</p></a>
         </div>
       </div>
     </div>

     <a class="left carousel-control" id="prev">
       <span class="glyphicon glyphicon-chevron-left"></span>
     </a>
     <a class="right carousel-control" id="next">
       <span class="glyphicon glyphicon-chevron-right"></span>
     </a>
   </div>
   </div>
   </div>

   </div>





  {{-- <div class="container">
    <div class="row">
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <img class="img-responsive" src="https://i2.wp.com/www.mundoperro.net/wp-content/uploads/Cachorro-blanco-bulldog-ingles.jpg?w=552&h=480&crop&ssl=1" alt="...">
          <div class="caption">
            <h3>Bulldog Ingles</h3>
            <p>$400</p>
            <p><a href="#" class="btn btn-primary" role="button">Comprar</a> </p>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

@endsection
