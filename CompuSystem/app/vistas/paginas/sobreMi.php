<?php
ob_start();
?>
<center><h1>Carta de presentacion</h1></center>
<br>
<div style="text-align: justify">
    <p>
        Mi nombre es Pedro Castellanos Cañas y me complace presentarles mi Trabajo de Fin de Grado en el marco de mis estudios 
        en el ciclo formativo de grado superior de Desarrollo de Aplicaciones Web en el Centro de IES Juan Bosco de Alcazar de San Juan.
    </p>
    <p>
        Durante mi formación, he descubierto mi pasión por el desarrollo backend y el mundo de la ciberseguridad.
        Me emociona entender cómo funcionan las aplicaciones web desde dentro, y cómo garantizar la seguridad y protección de la información en el entorno digital.
    </p>
    <p>
        En este proyecto, he creado una plataforma web para la empresa CompuSystem, la cual se encontraba interesada 
        en expandir sus servicios y productos a través de la venta online. Utilizando principalmente PHP nativo, 
        he desarrollado gran parte del proyecto, aprovechando mis habilidades en este lenguaje para implementar todas las funciones necesarias.
    </p>
    <p>
        La plataforma web que he creado permite a los clientes acceder y adquirir los servicios y productos 
        ofrecidos por CompuSystem de forma segura y conveniente. He trabajado en asegurar la funcionalidad y 
        la usabilidad del sistema, así como en garantizar la protección de los datos sensibles de los clientes.
    </p>
    <p>
        A lo largo del proceso de desarrollo, he enfrentado diversos desafíos que he superado con dedicación y 
        perseverancia. Me he esforzado por crear una solución sólida y eficiente que cumpla con los requerimientos establecidos por la empresa.
    </p>
    <p>
        En conclusión, me enorgullece presentarles mi TFG como un logro que demuestra mi capacidad para desarrollar 
        aplicaciones web y satisfacer las necesidades de un cliente real. Espero que mi trabajo muestre mi pasión por 
        el desarrollo backend y mi dedicación para garantizar la seguridad en el entorno digital.
    </p>
    <p>
        Agradezco sinceramente su tiempo y consideración. Estoy disponible para cualquier pregunta o aclaración adicional que puedan tener.
    </p>
    <p>
        
    </p>
    <p>
        Atentamente,
    </p>
    <p>
        Pedro Castellanos Cañas
    </p>
</div>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>