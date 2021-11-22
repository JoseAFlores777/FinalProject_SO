<?php include ('database.php');

$Codigo = $_POST[0];
$Marca = $_POST[1];
$Modelo = $_POST[2];
$Color = $_POST[3];
$Anio = $_POST[4];
$Recorrido = $_POST[5];
$Motor = $_POST[6];
$Traccion = $_POST[7];
$Precio = $_POST[8];

$sql = "INSERT INTO `Vehiculo` VALUES('$Codigo','$Marca','$Modelo','$Color','$Anio','$Recorrido','$Motor','$Traccion','$Precio')";
$query= mysqli_query($VCon,$sql);

if ($query == true) {
    
    $data = array(
        'status'=>'true',
    );

    echo json_encode($data);
}else{
    $data = array(
        'status'=>'false',
    );

    echo json_encode($data);
}


?>