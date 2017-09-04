function openNav() {
    document.getElementById("mySidenav").style.width = "70%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.body.style.backgroundColor = "rgba(0,0,0,0)";
}

window.onload = haceTodo;

		function haceTodo(){

		var pantallaActual = 0;
		var imagen = document.querySelector("#imagen");
		var btnAnt = document.querySelector("#prev");
		var btnSig = document.querySelector("#next");

		btnSig.addEventListener("click",pasaProx);

    btnAnt.addEventListener("click",pasaAnterior);

		var imagenes = ["img/perro-3.jpg","img/gato-tierno.jpg","img/perro-tierno.jpg"];

		var maximo = imagenes.length;

		function pasaProx(){

			console.log(pantallaActual);
			console.log(maximo);

			pantallaActual++;

			if(pantallaActual == maximo){
				pantallaActual = 0;
			}

			imagen.src = imagenes[pantallaActual];
		}

    function pasaAnterior(){

			console.log(pantallaActual);
			console.log(maximo);



			if(pantallaActual == maximo){
				pantallaActual = 0;
			}
      if (pantallaActual == 0) {
        pantallaActual = maximo-1;
      } else {
        pantallaActual--;
      }

			imagen.src = imagenes[pantallaActual];
		}


		}
