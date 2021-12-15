<?php include ('database.php');


$Nombre = $_POST[0];
$Tel = $_POST[1];
$Dir = $_POST[2];
$status = $_POST[3];


$sql = "INSERT INTO `Empresas` (Nombre,Tel,Dir,status) VALUES('$Nombre','$Tel','$Dir','$status')";
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