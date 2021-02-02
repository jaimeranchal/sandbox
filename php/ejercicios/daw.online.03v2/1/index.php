<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Hasta otra!';
    exit;
} else {
    $usuario = $_SERVER['PHP_AUTH_USER'];
    $muestraPass = $_SERVER['PHP_AUTH_PW'];
}
?>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" href="../../../../favicon.ico">
        <title>PHP Online 3</title>
        <!-- Bootstrap core CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
            />
        <!-- custom css -->
        <link rel="stylesheet" href="../src/css/main.css" type="text/css"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <!-- Highlight.js -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>       
    </head>

    <body>
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="d-flex flex-column justify-content-between bg-dark1 text-dark inter-400" id="sidebar-wrapper">
                <!-- sidebar top content -->
                <div class="sidebar-top">
                    <div class="sidebar-heading text-center">
                        <i class="fab fa-slack-hash fa-5x"></i>
                        <p class="lead courgette">D.W.E.S</p>
                    </div>
                    <div class="sidebar-menu list-group list-group-flush">
                        <a href="../inicio.html" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-home"></span>
                            Inicio
                        </a>
                        <a href="../1/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-unlock"></span>
                            Auth Basic
                        </a>
                        <a href="../2/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-lock"></span>
                            Auth Digest
                        </a>
                        <a href="../3/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-shopping-basket"></span>
                            Cesta
                        </a>
                        <a href="../4/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-receipt"></span>
                            Balance
                        </a>
                        <a href="../5/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-pizza-slice"></span>
                            Pizzeria
                        </a>
                    </div>
                </div>

                <!-- sidebar bottom content -->
                <div class="sidebar-footer">
                    <p class="text-center"><span class="fas fa-copyright"></span> 2021 - Jaime Ranchal Beato</p>
                </div>

            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <!-- Navegación -->
                <nav class="navbar navbar-expand-lg  navbar-light bg-transparent inter-400">
                    <!-- hide sidebar -->
                    <button class="btn btn-transparent" id="menu-toggle">
                        <span class="fas fa-arrow-left"></span>
                    </button>

                    <div class="app-title ml-2 mb-n1">
                        <h2>3.1</h2>
                    </div>

                    <!-- show top menu items on smaller screens -->
                    <button class="navbar-toggler" type="button" 
                        data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" 
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <span class="navbar-text ml-auto mr-3">
                            Hola <span class="fg-dark1 font-weight-bold text-capitalize"><?=$usuario?></span>,
                            tu contraseña es <i><?=$muestraPass?></i>
                        </span>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container mt-5 mx-5 inter-200">
                    <div class=" mb-2">
                        <h1 class="display-3 mt-4 inter-700">Seguridad (1)</h1>
                        <p class="lead">Autenticación de usuario con el método <i>Basic</i></p>
                    </div>
                    <div>
                        <h2>¿Qué significa <i>autenticarse</i>?</h2>
                    </div>
                    <div>
                        <h2>Autenticación HTTP</h2>
                    </div>
                    <div>
                        <h2>¿Es seguro?</h2>
                        <p>No mucho; de hecho, la contraseña es perfectamente visible ("<?=$muestraPass?>")</p>
                    </div>
                    <div>
                        <h2>Formas de mejorar la seguridad</h2>
                    </div>
                    <p>
                        <strong>HTTP</strong> soporta el uso de varios
                        <strong
                            >mecanismos de identificación para controlar el acceso a páginas
                            u otros *resources*</strong
                        >. Estos mecanismos se basan en el uso del
                        <strong>código de estado 401</strong> y el
                        <strong>response header *WWW-Authenticate*</strong>.
                    </p>
                    <ul>
                        <li>
                            Basic. El cliente envía el nombre de usuario y la contraseña sin
                            encriptar en <strong>codificación textual base64</strong>. Sólo
                            debe usarse con <strong>HTTPs</strong>, ya que la contraseña
                            puede ser fácilmente capturada.
                        </li>
                        <li>
                            Digest. El cliente envía la contraseña en forma de
                            <strong>hash</strong>. Es mucho más difícil de obtener los
                            valores de usuario y contraseña.
                        </li>
                    </ul>
                    <h3>Basic Authentication</h3>
                    <p>
                        Si un servidor recibe un <strong>HTTP request</strong> sin
                        identificar para un <strong><em>resource</em></strong> protegido,
                        puede forzar a usar <strong>Basic authentication</strong> rechazando
                        el request con un a respuesta con
                        <strong>código de estado 401</strong> (<em>Access Denied</em>) y
                        establecer el response header WWW-Authenticate:
                    </p>
                    <pre><code class="hljs php">HTTP/1.1 401 Access Denied
            WWW-Authenticate: Basic realm=&quot;Mi servidor&quot;
            Content-Lenght: 0</code></pre>
                    <p>
                        La palabra Basic en WWW-Authenticate selecciona el mecanismo de
                        identificación que el cliente HTTP debe usar para acceder el
                        <strong><em>resource</em></strong
                        >. El atributo realm se puede establecer a cualquier valor para
                        identificar el área segura, y puede usarse por los clientes HTTP
                        para manejar las contraseñas.
                    </p>
                    <p>
                        La mayoría de navegadores mostrarán una caja de login cuando se
                        reciba la respuesta anterior, permitiendo al usuario introducir un
                        usuario y una contraseña. Esta información se usa para reintentar el
                        request con un header Authentication:
                    </p>
                    <pre><code class="hljs php">GET /areasegura/ HTTP/1.1
            Host: www.ejemplo.com
            Authorization: Basic bXl1aefi128djGFzcw==
            </code></pre>
                    <p>
                        La autenticación especifica el mecanismo de autenticación, en este
                        caso <strong>Basic</strong>, seguido de un usuario y contraseña.
                        Parece encriptada, pero simplemente es una
                        <strong>codificación en base64</strong>, bXl1aefi128djGFzcw== es
                        &#39;myuser:mypass&#39;. Cualquiera que pueda interceptar el request
                        puede averiguar el usuario y la contraseña.
                    </p>
                    <h3>Digest Authentication</h3>
                    <p>
                        <strong>Digest Authentication</strong> es un método que utiliza el
                        password y otros bits de información para crear un hash que se envía
                        al servidor para identificar. Enviar un hash evita el principal
                        problema de la <strong>autenticación Basic</strong>, que es enviar
                        los datos sin encriptar.
                    </p>
                    <p>
                        El estándar de los métodos
                        <strong>Basic y Digest Authentication</strong> se puede ver en el
                        <a href="http://tools.ietf.org/html/rfc2617">RFC 2617</a>.
                        Anteriormente era el RFC 2069 para definir el digest. Primero vamos
                        a ver el funcionamiento según el 2069 y después una introducción al
                        2617.
                    </p>
                    <p>
                        El servidor genera un valor, llamado <strong>*nonce*</strong>, que
                        ha de ser único por cada request. El nonce se usará por el cliente
                        para generar el hash que será enviado al servidor.
                    </p>
                    <p>
                        En <strong>PHP</strong> puede emplearse <em>md5()</em> para generar
                        el string:
                    </p>
                    <pre><code class="hljs php">$nonce = md5(uniqid());
            </code></pre>
                    <p>
                        El string que necesita el cliente se denomina
                        <strong>*opaque*</strong>. Es otro string único generado por el
                        servidor y que se espera que sea devuelto por el cliente sin
                        alterarse:
                    </p>
                    <pre><code class="hljs php">$opaque = md5(uniqid());
            </code></pre>
                    <p>
                        El último string necesario es <strong>*realm*</strong>, una frase
                        que informa sobre el área de acceso al que se intenta acceder.
                        También se usa por el cliente para generar un hash para enviarlo de
                        vuelta al servidor:
                    </p>
                    <pre><code class="hljs php">$realm = &#39;Acceso privado a ejemplo.com/privado&#39;;
            </code></pre>
                    <p>
                        Todos estos valores se emplean para crear la directiva
                        <strong>WWW-Authenticate</strong> y enviarla como respuesta al
                        cliente:
                    </p>
                    <pre><code class="hljs php">if(empty($_SERVER[&#39;PHP_AUTH_DIGEST&#39;])){
                header(&#39;HTTP/1.1 401 Unauthorized&#39;);
                header(sprintf(&#39;WWW-Authenticate: Digest realm=&quot;%s&quot;, nonce=&quot;%s&quot;, opaque=&quot;%s&quot;&#39;, $realm, $nonce, $opaque));
                header(&#39;Content-Type: text/html&#39;);
                echo &#39;&lt;p&gt;Necesitas autenticarte.&lt;/p&gt;&#39;;
                exit;
            }
            </code></pre>
                    <p>
                        Cuando el cliente recibe esta respuesta, tiene que computarla y
                        devolver un hash. Lo hace devolviendo el nombre de usuario, el realm
                        y el password agrupados en un hash de la siguiente forma:
                    </p>
                    <pre><code class="hljs php">A1 as md5(&quot;username:realm:password&quot;)
            A2 as md5(&quot;requestMethod:requestURI&quot;)
            El útlimo hash, conocido como &quot;response&quot;, md5(&quot;A1:nonce:A2&quot;)
            </code></pre>
                    <p>
                        El cliente envía en el header <strong><em>Authorization</em></strong
                        >:
                    </p>
                    <pre><code class="hljs php">Authorization: Digest username=&quot;%s&quot;, realm=&quot;%s&quot;, nonce=&quot;%s&quot;, opaque=&quot;%s&quot;, uri=&quot;%s&quot;, response=&quot;%s&quot;&#39;
            </code></pre>
                    <p>
                        Cuando el servidor recibe la respuesta, se toman los mismos pasos
                        para comprobar la versión del hash del servidor con la recibida en
                        la respuesta. Si coinciden, el request se considera autorizado.
                    </p>
                    <pre><code class="hljs php">$A1 = md5(&quot;$username:$realm:$password&quot;);
            $A2 = md5($_SERVER[&#39;REQUEST_METHOD&#39;] . &quot;:$uri&quot;);
            $response = md5(&quot;$A1:$nonce:$A2&quot;);
            </code></pre>
                    <p>
                        Para proceder con la identificación a través de una base de datos,
                        el valor A1 puede guardarse. Si se cambia el realm el hash resultará
                        inválido.
                    </p>
                    <p>
                        En el <strong>RFC 2617</strong> se incluyeron nuevas
                        características: qop, cnonce y nc.
                    </p>
                    <ul>
                        <li>
                            <strong>qop: quality protection</strong>. Especificado en el
                            header WWW-Authenticate, puede tener un valor de
                            &quot;auth&quot; o &quot;auth-int&quot;. Si no se especifica
                            ninguno, por defecto es &quot;<strong>auth</strong>&quot;,
                            Digest Authentication para autenticación de un cliente. Si se
                            especifica &quot;<strong>auth-int</strong>&quot; se incluye un
                            nivel de protección de integridad en la respuesta, y el cliente
                            debe incluir también el request body como parte del mensaje
                            digest. Esto permite al servidor saber si el request ha sido
                            manipulado entre el cliente y el servidor.
                        </li>
                        <li>
                            <strong>cnonce: client nonce</strong>. Similar a nonce pero es
                            generado por el cliente, que envía en la respuesta al servidor
                            para poder comparar digests. Esto proporciona integridad en la
                            respuesta y autenticación mutua. Cuando la directiva qop se
                            envía por parte del servidor, el cliente debe incluir un valor
                            cnonce.
                        </li>
                        <li>
                            <strong>nc: nounce count</strong>. Es una cuenta hexadecimal del
                            número de requests que el cliente ha enviado con el valor de un
                            nonce. De esta forma el servidor puede protegerse frente a
                            ataques de repetición.
                        </li>
                    </ul>
                    <p>Ahora analizar el A2 quedaría de la siguiente forma:</p>
                    <pre><code class="hljs php">if($qop == &#39;auth-int&#39;){
                $A2 = md5($_SERVER[&#39;REQUEST_METHOD&#39;] . &quot;:$uri:&quot; . md5($respBody));
            } else {
                $A2 = md5($_SERVER[&#39;REQUEST_METHOD&#39;] . &quot;:$uri&quot;);
            }
            $response = md5(&quot;$A1:$nonce:$nc:$cnonce:$qop:$A2&quot;);
            </code></pre>
                    <p>
                        Digest Access emplea un valor hashed y no el password legible, por
                        lo que es mucho más seguro que Basic Auth. El nonce del servidor,
                        que ha de ser único por cada request, cambiará el hash computado en
                        cada request nuevo, y el valor nc que proporciona la RFC 2617 ayuda
                        a prevenir <strong>ataques de repetición</strong>, que ocurren
                        cuando un atacante intercepta los datos del request e intenta
                        repetirlos como si fuera su propio request.
                    </p>
                    <p>
                        MD5 no es un algoritmo especialmente seguro, con la tecnología
                        moderna no es difícil obtener los valores de un hash md5. Es
                        preferible Bcrypt.
                    </p>
                    <p>
                        No hay forma de que el servidor pueda verificar la identidad del
                        cliente que solicita acceso con Digest Access, lo que deja abierta
                        la posibilidad de ataques &quot;man in the middle&quot;, donde un
                        cliente cree que va a enviar los datos de autenticación al servidor
                        pero envía la información a otra entidad desconocida.
                    </p>
                    <p>
                        La mejor seguridad para la autenticación es utilizar
                        <strong>SSL y encriptar las contraseñas con Bcrypt</strong>. Se
                        puede utilizar Basic Authentication con SSL, pero en situaciones
                        donde SSL no es posible, Digest Access es mucho mejor que Basic
                        Auth.
                    </p>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Font Awesome JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
        <!-- Bootstrap core JS libraries 
        =============================================================== -->
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- BootStrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Menu Toggle Script -->
        <script src="../src/js/menu.js" charset="utf-8"></script>
    </body>
</html>
