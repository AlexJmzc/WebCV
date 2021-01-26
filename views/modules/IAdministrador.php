<html>
<head>
    <meta charset="UTF-8">
    <title>Universidad</title>
    <link rel=StyleSheet href="../../css/template.css" typr="text/css">
</head>

    <body>

        <header>
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Escudo_de_la_Universidad_T%C3%A9cnica_de_Ambato.png">
        </header> 


        <div>


        </div>
        <nav>
            <ul>
                <li> <a href="inicio.php"> Inicio</a> </li>
                <li> <a href="nosotros.php"> Nosotros</a> </li>
                <li> <a href="estudiantes.php"> Servicios</a> </li>
                <li> <a href="contactanos.php"> Contactenos</a> </li>
                
                <li> <a href="../../models\logout.php"> Cerrar sesión</a> </li>
                
       
            </ul>
        </nav>

        </section>
        <br><br>
        <?php
            session_start();
            echo "Bienvenido/a ";
            echo $_SESSION['nom'];
        ?>
    </body>
</html>
