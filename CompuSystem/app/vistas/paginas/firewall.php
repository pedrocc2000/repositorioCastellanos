<?php
ob_start();
?>
<br>
<p>CSFirewall es nuestro servicio de valor añadido que prestamos a todos
    los clientes interesados en establecer niveles de seguridad de la información en
    su empresa o ayuntamiento.
</p>
<p>
    IberPBX Firewall se encuentra entre la red de la empresa y la red pública, protegiendo eficazmente su red local de la actividad maliciosa de los
    piratas informáticos y controlando el flujo de datos al router, a través del router y desde el router. IberPBX Firewall admite funciones de filtrado
    y seguridad que forman su política de Internet.
</p>
<br>
<img src="web/imagenes/imagenes-servicios/firewall.PNG" alt="">
<br>
<br>
<p>
    Incluye actualizaciones permanentes de reglas y firmware del equipo a versiones estables y no es un servicio sustitutivo de la seguridad en escritorio y server,
</p>
<p>
    <b>La fase de instalación</b> incluye 4 horas para toma de datos, configuración y envío del hardware, adaptación fina del servicio. Esta fase valorada en 240€+ IVA es
    gratuita para contratos de prestación de servicio iguales o superiores a 36 meses.
</p>
<p>
    <b>La fase de operación</b> se realiza completamente en remoto, actuando los servicios técnicos del cliente como manos remotas en caso de ser necesario.
    El servicio cuenta con una bolsa anual de 8 horas para mantenimiento adaptativo del mismo y colaboración en la resolución de incidentes de seguridad,
    siendo esta colaboración una de las fortalezas del servicio.
</p>
<p>
    <b>CSFirewall</b> se basa en la tecnología Stateful Filterig que se puede utilizar para detectar y bloquear muchos escaneos furtivos, ataques DoS,
    inundaciones SYN. La comunicación de red se compone de pequeños fragmentos de datos llamados paquetes, y varios de estos paquetes se utilizan únicamente para crear,
    mantener y finalizar la conexión. Stateful Firewall mantiene en la memoria información sobre cada conexión que pasa a través de él. Cuando un paquete extraño intenta
    ingresar a la red, alegando ser parte de una conexión existente, el firewall consulta su lista de conexiones. ¡Cuando descubre que el paquete no coincide con ninguno
    de estos, puede descartar ese paquete y vencer el escaneo!
</p>
<p>
    <b>Administración del sistema</b> CSFirewall es muy fácil de administrar! La arquitectura del sistema permite una fácil configuración de la traducción de direcciones de red (NAT),
    proxies transparentes y redirección. Las reglas de filtrado del cortafuegos se agrupan en cadenas, lo que supone una ventaja, si los paquetes se pueden comparar
    con criterios comunes en una cadena, y luego procesarlos contra otros criterios comunes a otra cadena. Eso hace que el sistema sea mucho más fácil de administrar,
    utilizando un número menor de reglas para crear Firewall mucho más precisos.
</p>
<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>