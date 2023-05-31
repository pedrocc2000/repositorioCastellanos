<?php
ob_start();
?>
<h3>Antes de continuar...</h3>
<p>
    Si estás teniendo algún problema con alguno de nuestros servicios, te recomendamos antes visitar nuestra sección de 
    <a href="index.php?action=ver_enlace&enlace=paginas/faqs.php">FAQ's</a>
    de preguntas más comúnes por parte de nuestros clientes. Si tu problema se encuentra allí podrás ponerle solución de forma
    inmediata, por otro lado si aún así deseas deseas contactar con nosotros, rellene el siguiente formulario.
</p>
<p>
    En CompuSystem siempre encontrará a alguien al otro lado del telefono.
</p>
<p>
    Si desea realizar alguna consulta o necesita más información sobre cualquier aspecto de nuestra
    empresa, póngase en contacto con nosotros con el siguiente teféfono: 926 456 524 o a través de nuestra
    dirección de correo electrónico: compusystemclientes@gmail.com.
</p>
<p>
    También puede rellenar el siguiente formulario para poder exponernos vuestro problema o duda y que podamos atenderle contra antes:
</p>
<form>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Correo electrónico:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Teléfono:</label>
        <input type="text" class="form-control" id="examenInputTelefono1" aria-describedby="telefonoHelp">
        <div id="telefonoHelp" class="form-text">Nunca compartiremos su teléfono con nadie más.</div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Problema</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Expón aquí el problema o la duda que estes teniendo"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-danger">Enviar</button>
</form>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>