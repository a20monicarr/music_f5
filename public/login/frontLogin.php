<?php
session_start();

use App\Controllers\UserController;

require "../../vendor/autoload.php";

/*if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
} else {
    // Show users the page!
}*/

/*if((isset($_POST['userEmail'])) AND (isset($_POST['userPassword']))){*/
if(isset($_POST['userEmail'])){
$user_controller = new UserController;
  $user = $_POST['userEmail'];
  $password = $_POST['userPassword'];
$user_array= $user_controller->show([
     "email" => $user,
     "password" => $password

      ]);
  /* print_r ($user_array);*/

   if ($user_array [0] > 0) {
    $_SESSION['user_id']=$user_array [0];

     header('Location: ../index.php');
     echo "existe el usuario";
    } else {
        echo "El usuario con: '{$user}' NO fue encontrado.";

        unset($_SESSION['user_id']);
    }



}
?>





<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./frontLogin.css">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
</head>

<body class="body-login">
    <div class="container mt-5 ">
        <form class="form-login" method="post">
            <div class="form-group ">
                <label for="userEmail">Email</label>
                <input type="text" class="form-control" id="userEmail" name="userEmail"
                    placeholder="Tu correo electrónico" />
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="userPassword"
                    placeholder="Tu contraseña" />
            </div>
            <button type="submit" class="btn boton-login">Iniciar sesión</button>
        </form>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>