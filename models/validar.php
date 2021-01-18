<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","base_uta");

$consulta="SELECT*FROM usuarios where CED_USU='$usuario' and CLAVE_USU='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['PERF_USU']=='Administrador'){ //administrador
    header("location:..\IAdmin.php");

}else
if($filas['PERF_USU']=='Secretaria'){ //cliente
header("location:..\ISecre.php");
}
else{
    ?>
    <?php
    include("index.html");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);