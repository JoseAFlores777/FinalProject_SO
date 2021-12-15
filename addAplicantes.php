<?php include ('database.php');


$Nombre = $_POST[0];
$Profesion = $_POST[1];
$Tel = $_POST[2];
$Dir = $_POST[3];
$Email = $_POST[4];
$Status = $_POST[5];


$sql = "INSERT INTO `Aplicantes` (Nombre,Profesion,Tel,Dir,Email,Status) VALUES('$Nombre','$Profesion','$Tel','$Dir','$Email','$Status')";
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