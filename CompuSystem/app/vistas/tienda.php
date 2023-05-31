<?php
ob_start();
?>
<div>
  <?php
  if(isset($_SESSION['idUsuario'])) {
      if($usuarioLogueado->getRol() == "admin") {
      ?>
          <a href="index.php?action=insertar_producto" class="btn btn-danger mt-3" id="botonAnadirProducto" >Añadir producto</a>
      <?php
      }
  }
  ?>
</div>
<br>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <form action="index.php?action=inicio_tienda&paginacion=true" method="post">
        <div class="input-group">
          <label class="me-3 mb-0">Ordenar por precio:</label>
          <select name="precio" class="form-select form-select-sm me-3">
            <option value="desc" <?php if((isset($orden)) && ($orden == "desc")):?> selected <?php endif; ?>>
              De mayor a menor precio
            </option>
            <option value="asc" <?php if((isset($orden)) && ($orden == "asc")):?> selected <?php endif; ?>>
              De menor a mayor precio
            </option>
          </select>
          <label class="me-3 mb-0">Categoría:</label>
          <select name="categoria" class="form-select form-select-sm me-3">
            <?php foreach($listaCategorias as $categoria) { ?>
              <?php
              if($categoria->getIdCategoria() == $categoriaSeleccionada) {
              ?>
                  <option value="<?= $categoria->getIdCategoria() ?>" selected><?= $categoria->getNombre() ?></option>
              <?php
              } else {
              ?>
                  <option value="<?= $categoria->getIdCategoria() ?>"><?= $categoria->getNombre() ?></option>
              <?php    
              }
              ?>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-danger btn-sm">Filtrar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<br>
<?php
if($listaProductos != null) {
?>
<div class="container-fluid" id="contenedor-productos">
    <?php
    //Este contador lo utilizo para que cuando recorra los productos
    //Se vayan colocando de 4 en 4 por cada fila
    $contadorProductos = 0;
    foreach($listaProductos as $producto) {
        $producto instanceof Producto;
        $fotoPrincipal = $fotosDAO->obtenerPrincipalProducto($producto->getIdProducto());
        if($contadorProductos == 0) {
            ?>
            <div class="row">
                <div class="col-md-3 text-justify">
                    <a href="index.php?action=ver_producto&id=<?= $producto->getIdProducto() ?>" style="text-decoration: none; color: inherit">
                    <img src="web/imagenes/imagenes-productos/<?= $fotoPrincipal->getNombre() ?>"class="imagenes-productos">
                    <p><?= $producto->getNombre() ?></p>
                    <p class="text-danger"><?= $producto->getPrecio() ?>€</p>
                    </a>
                </div>
            <?php
            $contadorProductos = 1;
        } else {
            $contadorProductos++;
            ?>
            <div class="col-md-3 text-justify">
                    <a href="index.php?action=ver_producto&id=<?= $producto->getIdProducto() ?>" style="text-decoration: none; color: inherit">
                    <img src="web/imagenes/imagenes-productos/<?= $fotoPrincipal->getNombre() ?>" class="imagenes-productos">
                    <p><?= $producto->getNombre() ?></p>
                    <p class="text-danger"><?= $producto->getPrecio() ?>€</p>
                    </a>
                </div>
            <?php
        }
        if($contadorProductos == 4) {
        ?>
        </div>
        <?php
            $contadorProductos = 0;
        }
    }
    // Si el contador no llegó a 4, debemos cerrar el último div de la fila
    if($contadorProductos > 0) {
        ?>
        </div>
        <?php
    }
    ?>
</div>
<?php    
} else {
?>
<center><h1>No hay productos</h1></center>
<?php    
}
?>
<?php
if(!isset($_GET['paginacion'])) {
?>
<div class="pagination" id="paginacion">
  <!-- Comienza una estructura condicional para verificar si la página actual es mayor que 1 -->
    <?php if ($pagina_actual > 1): ?>
      <!-- Si la página actual es mayor que 1, se agrega un enlace a la página anterior -->
      <a href="index.php?action=inicio_tienda&pagina=<?php echo $pagina_actual - 1; ?>" class="btn btn-danger text-white">Anterior</a> 
      <!-- Finaliza la estructura condicional -->
    <?php endif; ?> 
      <!-- Inicia un ciclo for para crear un enlace para cada página disponible -->
      <?php for ($i = 1; $i <= $numero_de_paginas; $i++): ?>
        <!-- Comienza una estructura condicional para verificar si el índice del ciclo for es igual a la página actual -->
          <?php if ($i == $pagina_actual): ?>
            <!-- Si el índice es igual a la página actual, se agrega un enlace a la página activa, lo que se indica visualmente mediante la clase "active" -->
            <a href="#" class="active btn btn-danger text-black"><?php echo $i; ?></a>
            <!-- Si el índice del ciclo for no es igual a la página actual -->
          <?php else: ?>
            <!-- Se agrega un enlace a la página correspondiente -->
            <a href="index.php?action=inicio_tienda&pagina=<?php echo $i; ?>"  class="btn btn-danger text-white" ><?php echo $i; ?></a>
            <!-- Finaliza la estructura condicional -->
          <?php endif; ?>
          <!-- Finaliza el ciclo for -->
      <?php endfor; ?> 
        <!-- Comienza una estructura condicional para verificar si la página actual es menor que el número total de páginas -->
        <?php if ($pagina_actual < $numero_de_paginas): ?> 
          <!-- Si la página actual es menor que el número total de páginas, se agrega un enlace a la página siguiente -->
          <a href="index.php?action=inicio_tienda&pagina=<?php echo $pagina_actual + 1; ?>"  class="btn btn-danger text-white" >Siguiente</a>
          <!-- Finaliza la estructura condicional -->
          <?php endif; ?>
      <!-- Finaliza el contenedor del código de paginación -->
</div>
<?php
}
?>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>