<?php


$json = file_get_contents('php://input');
$usuario = json_decode($json,true);//El json lo pasamos como arreglo

var_dump($usuario);

if(array_key_exists('usuario',$usuario) && array_key_exists('password',$usuario) && array_key_exists('email',$usuario) && array_key_exists('telefono',$usuario) && array_key_exists('genero',$usuario) && array_key_exists('entidad',$usuario)){
    
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "usuariosuno";


    $usuario = $usuario['usuario'];
    $password = $usuario['password'];
    $email = $usuario['email'];
    $telefono = $usuario['telefono'];
    $genero = $usuario['genero'];
    $entidad = $usuario['entidad'];

    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'usuariosuno',
        '3308'
    );

    if($conn){
        echo $conn;
    }
    
    if (mysqli_connect_error()){
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    
    else{

        
        $SELECT = "SELECT telefono from persona where telefono = ? limit 1";
        $INSERT = "INSERT INTO persona (username, contrasenia, email, telefono, genero, estado) values(?,?,?,?,?,?)";
        $SELECTUSER = "SELECT username from persona where nombre = ?";
        
        $stmt = $conn->prepare($SELECT);
        $stmt ->bind_param("i", $telefono);
        $stmt ->execute();
        $stmt -> bind_result($telefono);
        $stmt -> store_result();
        

        $stmuser = $conn->prepare($SELECTUSER);
        $stmuser ->bind_param("s", $usuario);
        $stmuser ->execute();
        $stmuser -> bind_result($usuario);
        $stmuser -> store_result();        

        $rnum = $stmt->num_rows;
        $usernum = $stmuser->num_rows;

        if ($rnum == 0 && $usernum == 0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt ->bind_param("sssssi", $usuario,$password, $email, $telefono, $genero, $entidad);
            $stmt ->execute();
            echo "sucess";
        }
        else {
            throw new Exception("Error Processing Request", 1);
            echo "duplicated";
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