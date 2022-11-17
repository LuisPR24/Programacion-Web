<?php
$nombre=$_POST['nombre'];
$password=$_POST['password'];
$email=$_POST['email'];
$telefono=$_POST['telefono'];
$genero=$_POST['genero'];
$estado= $_POST['estado'];

if(!empty($nombre) || !empty($password) || !empty($email) || !empty($telefono) || !empty($genero) || !empty($estado)){
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "usuariosuno";


    $conn = new mysqli($host,$dbusername, $dbpassword, $dbname);

    
    if (mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    
    else{
        $SELECT = "SELECT telefono from persona where telefono = ? limit 1";
        $INSERT = "INSERT INTO persona (nombre, password, email, telefono, genero, estado) values(?,?,?,?,?,?)";
        $SELECTUSER = "SELECT nombre from persona where nombre = ?";
        
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("i", $telefono);
        $stmt ->execute();
        $stmt -> bind_result($telefono);
        $stmt -> store_result();

        $stmt2 = $conn->prepare($SELECTUSER);
        $stmt2 ->bind_param("s", $nombre);
        $stmt2 ->execute();
        $stmt2 -> bind_result($nombre);
        $stmt2 -> store_result();

        
        $rnum = $stmt->num_rows;
        $Usernum=$stmt2->num_rows;


        if ($rnum == 0 && $Usernum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("sssssi", $nombre,$password, $email, $telefono, $genero, $estado);
            $stmt ->execute();
            echo "REGISTRO COMPLETADO.";
        }
        else {
            echo "El numero ya se encuentra registrado.";
        }
        $stmt->close();
        $conn->close();
    }

}
else{
    echo "Todos los datos son obligatorios";
    die(); 
}
?>