<?php
ob_start();
?>
<div class="accordion" id="mi-acordeon">
    <h3>¿Qúe es una VPN?</h3>
    <p>
        Es una red virtual y privada que permite el establecimiento de una conexión segura addEventListener
        dos puntos de la red. Esta red privada permite el intercambio de datos entre
        esos dos puntos de una forma segura.
    </p>
    <br>
    <img src="web/imagenes/imagenes-servicios/vpn-tunel.PNG" alt="">
    <br>
    <p>
        Si su información tiene que estar accesible para que su organización acceda a ella
        desde otras sedes y otros ordenadores, esta es la forma que sus datos queden lejos del
        alcanze de terceros.
    </p>
    <p>
        Recuerde que no todos los ataques son intencionados, no hace falta ser importante o tener
        enemigos para set atacado electrónicamente y dejar su información al descubierto. El mayor riesgo
         es el ataque sistemático de macro redes mundiales de atacantes que lo hacen al azar.
    </p>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2">
                <h3>¿Cómo funciona una VPN?</h3>
            </button>
        </h2>
        <div id="collapse-2" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#mi-acordeon">
            <div class="accordion-body">
                <br>
                <img src="web/imagenes/imagenes-servicios/vpn-tunel1.PNG" alt="">
                <br>
                <p>
                    Cuando se configura una VPN lo que hacemos es establecer, un túnel entre dos extremos de una red.
                    En dicho túnel se configuran unos parámetros de encriptado y cifrado para hacer que todos los datos
                    que se transiten a través de ese túnel queden debidamente protegidos.
                </p>
                <p>
                    Para garantizar la seguridad en una VPN se emplean unos algoritmos de encriptado y cifrado
                    que ofusca los datos y los hace inintengibles para cualquier otro dispositivo que no sean los
                    extremos del túnel.
                </p>
                <p>
                    Una de las desventajas de las VPN (en general) es el impacto que tiene en el rendimiento de la conexión (la velocidad).
                    Para los routers supone un enorme trabajo encriptar todos los paquetes, lo que lleva a una pérdida de rendimiento.
                    En función de los algoritmos que se usen para el establecimiento de la VPN, esta pérdida de rendimiento puede ser mayor o menor.
                </p>
                <p>
                    Para equilibrar seguridad y rendimiento, nosotros utilizamos los siguientes algoritmos:
                </p>
                <ul>
                    <li>Protocolo de tunel: L2TP/IPsec</li>
                    <li>Autenticación: mschap2</li>
                    <li>Encritpación: aes256</li>
                    <li>Algoritmo hash: sha1</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3">
                <h3>Configuración en Windows 7</h3>
            </button>
        </h2>
        <div id="collapse-3" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#mi-acordeon">
            <div class="accordion-body">
                <p>
                    Estos son los pasos para crear una conexión VPN a través del protocolo PPTP de acesso a la
                    red de tu organización si eres usuario de Windows 7 son los siguientes:
                </p>
                <ul style="list-style-type: decimal;">
                    <li>
                        <p>
                            Abrir centro de redes y recursos compartidos.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-1.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Pinchar en “Configurar una nueva conexión o red.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-2.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Click en “Conectarse a un área de trabajo” → Siguiente
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-3.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Click en “Usar mi conexión a internet (VPN).
                        </p>
                        <p>
                            Completar la información:
                        </p>
                        <ul style="list-style-type: circle;">
                            <li>
                                <p>
                                    “Dirección de internet” la dirección IP Publica de tu empresa (ya sabes que si no es una IP Pública Fija cuando cambie no te podrás conectar)
                                    También puedes tener un subdominio p.ej del tipo vpn.miempresa.com por lo que en vez de la IP puedes poner ese subdominio
                                </p>
                            </li>
                            <li>
                                <p>
                                    “Nombre de destino”, un nombre identificativo de la conexión (libre elección).
                                </p>
                            </li>
                            <li>
                                <p>
                                    Todas las casillas desmarcadas excepto la última (No conectarse ahora; configurar para conectarse mas tarde)
                                </p>
                            </li>
                        </ul>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-4.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Siguiente.
                        </p>
                    </li>
                    <li>
                        <p>
                            En el campo “Nombre de Usuario”, escribir el usuario facilitado por nuestro Centro de Soporte si eres usuario de nuestros servicios o bien por tu informático y en “Contraseña”, la contraseña facilitada → Crear
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-5.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            NO pinchar en “Conectar ahora”, sino en Cerrar
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-6.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Volvemos a “Abrir centro de redes y recursos compartidos, y ahí, click en Cambiar configuración del adaptador, hacemos click con el botón secundario del ratón en la conexión VPN y hacer click en propiedades.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-7.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            En Propiedades ir a la pestaña “Seguridad” y seleccionar en “Tipo de VPN” – Protocolo de túnel punto a punto (PPTP), En “Cifrado de datos”, escoger la opción “Requiere cifrado…..”. En “Autenticación” selecciona “Permitir estos protocolos” y marcar “CHAP y MSCHAP v2” → Aceptar.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-8.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Doble click sobre el icono de la conexión “Conexión VPN – VNC” e introducir usuario y contraseña.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows7-9.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Click en conectar y ya debes estar conectado de forma segura con tu empresa.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading-2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4">
                <h3>Configuración en Windows 10</h3>
            </button>
        </h2>
        <div id="collapse-4" class="accordion-collapse collapse" aria-labelledby="heading-2" data-bs-parent="#mi-acordeon">
            <div class="accordion-body">
                <p>La configuración VPN en Windows 10 varía muy poco con respecto a Windows 7.</p>
                <p>
                    Tenemos otra opción, estos son los pasos para crear una conexión VPN a través del
                    protocolo PPTP de acceso a la red de tu organización si eres usuario de WIndows 10.
                </p>
                <ul style="list-style-type: decimal;">
                    <li>
                        <p>
                            En la ventana de búsqueda ponemos vpn y elegimos la alternativa que aparece "Configuración VPN".
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows10-1.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Se abre esta ventana para agregar una VPN, donde complementamos los datos como sigue.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows10-2.PNG" alt="">
                        <p>
                            - Proveedor de VPN: Windows (integrado)
                        </p>
                        <p>
                            - Nombre de conexión: un nombre identificativo de la conexión (libre elección).
                        </p>
                        <p>
                            - Nombre de servidor o dirección:<br>
                            -- La dirección IP Publica de tu empresa (ya sabes que si no es una IP Pública Fija cuando cambie no te podrás conectar)<br>
                            -- También puedes tener un subdominio p.ej del tipo vpn.miempresa.com por lo que en vez de la IP puedes poner ese subdominio
                        </p>
                        <p>
                            - Tipo de VPN: Protocolo de túnel punto a punto (PPTP)
                        </p>
                        <p>
                            - Tipo de información de inicio de sesión: Nombre de usuario y contraseña
                        </p>
                        <p>
                            - Nombre de usuario y contraseña deberá de proporcionarlo desde el departamento de informática, IT o nuestro centro de soporte si es usuario de nuestros servicios.
                        </p>
                    </li>
                    <li>
                        <p>
                            Marcamos en recordar la información de inicio de sesión.
                        </p>
                    </li>
                    <li>
                        <p>
                            Guardamos.
                        </p>
                    </li>
                    <li>
                        <p>
                            Al guardar, configuración VPN quedaría con la nueva conexión que hemos creado como puede verse en la siguiente imagen.
                        </p>
                        <img src="web/imagenes/imagenes-servicios/vpn-windows10-3.PNG" alt="">
                    </li>
                    <li>
                        <p>
                            Pulsamos en nuestra nueva VPN, damos «conectar» y si todo sale bien estaríamos conectados a nuestra oficina de una forma segura.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$vista = ob_get_clean();
require 'app/vistas/plantilla.php';
?>