$(document).ready(function() {

  const headerHeight = $('header').outerHeight();
  const footerHeight = $('footer').outerHeight();
  $('main').css('padding-top', headerHeight + 75);
  $('main').css('padding-bottom', footerHeight); 

  var quill = new Quill('#editor', {
      theme: 'snow'
  });
  quill.on('text-change', function(delta, oldDelta, source) {
      var contenido = quill.root.innerHTML;
      $("#descripcion").val(contenido);
  });
  $('#exampleInputCantidad').on('change', actualizarCantidadProducto);
});

//Funcion que actualiza la cantidad de elementos del producto que va a realizarse
function actualizarCantidadProducto(idProducto) {
  var cantidadInput = document.getElementById("exampleInputCantidad");
  var botonAñadir = document.querySelector(".btn[data-id='" + idProducto + "']");
  botonAñadir.setAttribute("data-cantidad", cantidadInput.value);
}
//Intento de añadir producto al carrito con ajax
function anadirProductoCarrito(boton) {
  if(boton.getAttribute("data-cantidad") <= 0) {
    alert("No puedes añadir productos con cantidad negativa o nula al carrito");
  } else {
    boton.innerHTML = "Añadiendo producto al carrito..."
    const url = "index.php?action=insertar_producto_carrito&idProducto=" + boton.getAttribute("data-id") + "&ctd=" + boton.getAttribute("data-cantidad");
    setTimeout(function() {
      boton.innerHTML = "Producto añadido al carrito";
    }, 2000);
    fetch(url)
      .then((respuesta) => respuesta.json())
      .then((json) => {
        if(json.anadido) {
        } else {
        }
      })
      .catch((error) => {
        console.error("Error: " + error);
      });
  }
}
function anadirFavorito(corazon){
    if(corazon.className == "far fa-heart") {
      corazon.className="fa fa-heart";
      let url = "index.php?action=anadir_favorito&idProducto=" + corazon.getAttribute("data-id");
      fetch(url)
        .then((respuesta) => respuesta.json())
        .then((json) => {
          if(json.anadido) {
          } else {
          }
        })
        .catch((error) => {
          console.error("Error: " + error);
        });
    } else {
      corazon.className="far fa-heart";
      let url2 = "index.php?action=borrar_favorito&idFavorito=" + corazon.getAttribute("data-id");
      fetch(url2)
      .then((respuesta) => respuesta.json())
        .then((json) => {
          if(json.elimnado) {
          } else {
          }
        })
        .catch((error) => {
          console.error("Error: " + error);
        });
    }
}
function tramitarPedido(enlace) {
  enlace.innerHTML = "Tramitando pedido...";
}