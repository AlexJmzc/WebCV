<?php
include "conexion.php";
$query="SELECT * FROM estudiantes";
if(isset($_POST['CED_EST'])!= ""){
    $q=$conn->real_escape_string($_POST['CED_EST']);
    $query="SELECT * FROM estudiantes WHERE CED_EST LIKE '%".$q."%'";
}
$buscarEstudiante=$conn->query($query);
$result=array();
if($buscarEstudiante->num_rows > 0){
    while ($filaMarca=$buscarEstudiante->fetch_assoc()) {
        array_push($result,$filaMarca);
    }
}else{
    $result="No se encontraron estudiantes";
}

echo json_encode($result);
?>