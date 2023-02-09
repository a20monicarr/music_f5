<?php

if(isset($_POST["boton-login"])){ //Búsqueda a través de la presión del botón

    include("../database/Conexion/Connection.php"); // Conexión con la BBDD

    // Recepción de la información del formulario
    $userEmail=($_POST['userEmail']);
    $userPassword=($_POST['userPassword']);

    // Búsqueda 
    $sentenciaSQL = $connectionPDO->prepare(" SELECT * FROM user 
                                    WHERE email=:email 
                                    AND 
                                    password=:password");

    // Reemplazo de los siguientes parámetros a traves de la table "user"
    $sentenciaSQL->bindParam("email", $userEmail,PDO::PARAM_STR);
    $sentenciaSQL->bindParam("password", $userPassword, PDO::PARAM_STR);

    // Ejecución de la sentencia
    $sentenciaSQL->execute();

    //
    $registro=$sentenciaSQL->fetch(PDO::FETCH_ASSOC); //Da la información asociada al usuario
    print_r($registro);

    session_start();
    $_SESSION['user'] = $registro;


    // Contabiliza número de registros encontrados
    $numeroRegistros = $sentenciaSQL->rowCount();

    if($numeroRegistros>=1){
        echo "Bienvenido";
        header('Location: tabla.php'); // Hace referencia al archivo que nos llevará al siguiente panel
    }
}

?>

