<html>
<head>
    <meta charset="UTF-8">
    <title>Universidad</title>
    <link rel=StyleSheet href="css/template.css" typr="text/css">
</head>

    <body>

        <header>
        <img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Escudo_de_la_Universidad_T%C3%A9cnica_de_Ambato.png">
        </header> 

        <?php
            require_once("models/isLogin.php");

            if($estado){
                
                if($perfil=='Administrador'){
                   
                    ?>
                        <nav>
                        <ul>
                        <li> <a href="views\modules\inicio.php"> Inicio</a> </li>
                        <li> <a href="views\modules\nosotros.php"> Nosotros</a> </li>
                        <li> <a href="estudiantes.php"> Servicios</a> </li>
                        <li> <a href="views\modules\contactanos.php"> Contactenos</a> </li>
                        <li> <a href="models\logout.php"> Cerrar sesión</a> </li>
                       
                    </ul>
                </nav>

                <?php
                                    echo "<strong>Bienvenido/a </strong>";
                                    echo "<strong>".$_SESSION['nom']."</strong>";
                ?>
                <?php
                }else{
                    
                    echo "Bienvenido/a ";
                echo $_SESSION['nom'];
                ?>
                    <nav>
                    <ul>
                    <li> <a href="views\modules\inicio.php"> Inicio</a> </li>
                    <li> <a href="views\modules\nosotros.php"> Nosotros</a> </li>
                    <li> <a href="views\modules\contactanos.php"> Contactenos</a> </li>
                    <li> <a href="models\logout.php"> Cerrar sesión</a> </li>
                   
                
                </ul>
            </nav>
                <?php
                }
                ?>


              
        <?php
            }else{
            
                ?>
                    <nav>
                    <ul>
                    <li> <a href="views\modules\inicio.php"> Inicio</a> </li>
                    <li> <a href="views\modules\nosotros.php"> Nosotros</a> </li>
                    <li> <a href="views\modules\contactanos.php"> Contactenos</a> </li>
                    <li> <a href="views\modules\login.php"> Iniciar Sesión</a> </li>
                   
                
                </ul>
            </nav>
                <?php
            }
        ?>
        

        </section>
    </body>
</html>
