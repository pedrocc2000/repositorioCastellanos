<?php
ob_start();
?>
<div class="accordion" id="mi-acordeon">
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-1">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1">
                <h2>400 MEGAS</h2>
            </button>
        </h2>
        <div id="collapse-1" class="accordion-collapse collapse" aria-labelledby="heading-1" data-bs-parent="#mi-acordeon">
            <div class="accordion-body">
                <img src="web/imagenes/imagenes-tarifas/400.PNG" alt="vsfv">
                <p>
                    Incluye fibra óptica simétrica con 400 megas de bajada y 400 megas de subida.
                </p>
                <p>
                    Incluye tarifa plana de llamadas a fijos nacionales y 60 minutos para llamaas a móviles nacionales.
                </p>
                <p>
                    El alta e instalación esta subvencionada al 100% al firmal una permenancia de 14 meses, por lo que te saldrá ¡TOTALMENTE GRATIS!
                </p>
            </div>
        </div>
    </div>
    <div class="accordion" id="mi-acordeon">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2">
                    <h2>500 MEGAS</h2>
                </button>
            </h2>
            <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#mi-acordeon">
                <div class="accordion-body">
                    <img src="web/imagenes/imagenes-tarifas/500.PNG" alt="vsfv">
                    <p>
                        Incluye fibra óptica simétrica con 500 megas de bajada y 500 megas de subida.
                    </p>
                    <p>
                        Incluye tarifa plana de llamadas a fijos nacionales y 60 minutos para llamaas a móviles nacionales.
                    </p>
                    <p>
                        El alta e instalación esta subvencionada al 100% al firmal una permenancia de 14 meses, por lo que te saldrá ¡TOTALMENTE GRATIS!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion" id="mi-acordeon">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading-3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3">
                    <h2>600 MEGAS</h2>
                </button>
            </h2>
            <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-3" data-bs-parent="#mi-acordeon">
                <div class="accordion-body">
                    <img src="web/imagenes/imagenes-tarifas/600.PNG" alt="vsfv">
                    <p>
                        Incluye fibra óptica simétrica con 600 megas de bajada y 600 megas de subida.
                    </p>
                    <p>
                        Incluye tarifa plana de llamadas a fijos nacionales y 60 minutos para llamaas a móviles nacionales.
                    </p>
                    <p>
                        El alta e instalación esta subvencionada al 100% al firmal una permenancia de 14 meses, por lo que te saldrá ¡TOTALMENTE GRATIS!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>