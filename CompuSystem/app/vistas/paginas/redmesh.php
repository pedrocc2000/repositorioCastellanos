<?php
ob_start();
?>
<h1>REDES MESH</h1>
<p>
    La red Mesh son uno de los mejores métodos para poder mejorar la cobertura de tu casa y llegar
    a más rincones. Una red mallada es una red Wifi compuesta por varios
    componentes, pero todos utilizando el mismo SSID o nombre de la red y la misma contraseña.
</p>
<p>
    Los sistemas mesh no nos conectan al punto más cercano sino al que, aunque esté más
    alegado de nuestro dispositivo, nos dará la mejor señal Wifi atendiendo a múltiples
    variables de la red de la casa.
</p>
<p>
    Una red mesh es capaz de redirigirse el tráfico por la red de siempre de la forma
    óptima para disponer siempre de la mejor señal posible. Las redes mesh calculas a
    que nodo/satélite es mejor que nos conectemos en cada momento
    según el estado de otros nodos.
</p>
<br>
<img src="web/imagenes/imagenes-servicios/red-mesh.PNG" alt="">
<br>
<br>
<div class="accordion" id="mi-acordeon">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1">
                <h4>Ventajas</h4>
            </button>
        </h2>
        <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#mi-acordeon">
            <div class="accordion-body">
                <ul style="list-style-type: circle;">
                    <li>Optimización de los recursos</li>
                    <li>Mayor cobertura en zonas más remotas o menos comunicadas de la casa</li>
                    <li>Mejor calidad de la señal gracias a la conexión entre nodos</li>
                    <li>Se gestionan fácilmente desde un software especializado</li>
                    <li>No require una instalación muy técnica</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion" id="mi-acordeon">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2">
                    <h4>Inconvenientes</h4>
                </button>
            </h2>
            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#mi-acordeon">
                <div class="accordion-body">
                    <ul style="list-style-type: circle;">
                        <li>
                            Es posible que haya momentos o zonas en la que los nodos no sepas realmente cuá es al que debes
                            conectarte en ese momento
                        </li>
                        <li>Inversión mayor ecnonómicamente ya que una distribucción mesh suele ser mas costoso</li>
                        <li>No todos los routers de a día de hoy admiten esta tecnología</li>
                        <li>Es posible que las ondas electromagnéticas no atraviesen paredes muy gruesas</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>