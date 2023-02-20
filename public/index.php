<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // echo "Usuario no existe";
    header('Location: login/frontLogin.php');
} else {
    // echo ($_SESSION['user_id']);
    $user_id = $_SESSION['user_id'];
}
//   $password = $_POST['userPassword'];
// $user_array= $user_controller->show([
//      "email" => $user,
//      "password" => $password

//   ]);

// use Dotenv\Dotenv;
// require_once __DIR__.'/vendor/autoload.php';
require_once '../vendor/autoload.php';

use App\Controllers\UserController;
use App\Controllers\GenderController;
use App\Controllers\SongController;

$form_update_o_insert = $_SESSION['form_update_o_insert'];
if (isset($_POST['borrar_cancion'])) {
    $song_controller = new SongController;
    $song_controller->destroy(28);
    unset($_POST['borrar_cancion']);
}
if ((isset($_POST['artista'])) and (isset($_POST['titulo'])) and (isset($_POST['genero'])) and (isset($_POST['url'])) and (isset($_POST['foto']))) {

    $artista = $_POST['artista'];
    // echo $artista . "<br>";
    $titulo = $_POST['titulo'];
    // echo $titulo . "<br>";
    $genero = $_POST['genero'];
    // echo $genero . "<br>";
    $url = $_POST['url'];
    // echo $url . "<br>";
    $foto = $_POST['foto'];
    // echo $foto . "<br>";

    unset($_POST['artista']);
    unset($_POST['titulo']);
    unset($_POST['genero']);
    unset($_POST['url']);
    unset($_POST['foto']);

    $song_controller = new SongController;

    if ($form_update_o_insert == "insert") {

        $song_controller->store([
            "idUser" => $user_id,
            "idGender" => $genero,
            "title" => $titulo,
            "artist" => $artista,
            "image" => $foto,
            "date" => NULL,
            "played" => 0,
            "url" => $url
        ]);
    } else { // Viene del formulario modificando

        $song_controller->update([
            "idSong" => 12,
            "idUser" => $user_id,
            "idGender" => $genero,
            "title" => $titulo,
            "artist" => $artista,
            "image" => $foto,
            "date" => NULL,
            "played" => 0,
            "url" => $url
        ]);
    }
} else {
    $form_update_o_insert = "insert";
    $_SESSION['form_update_o_insert'] = $form_update_o_insert;
}



// $gender_controller = new GenderController;

// $gender_controller->store([
//     "gender" => "Pop"
// ]);
// $gender_controller->store([
//     ":gender" => "Pop"
// ]);

// $user_controller = new UserController;

// $user_controller->show();
// $user_controller->show([
//     "email" => "mariela@gmail.com",
//     "password" => "mariela"
//      ]);

// $gender_controller = new GenderController;

// //$user_controller->show();
// $gender_controller->index();
// $song_controller = new SongController;

// //$user_controller->show();
// $song_controller->index();
//$song_controller = new SongController;

//$user_controller->show();
// $song_controller->store([
//         "idUser" => 13,
//         "idGender" => 10,
//         "title" => "Bailando",
//         "artist" => "Enrique Iglesias, Descemer, Gente de Zona",
//         "image" => "bailar",
//         "date" => "2023-01-04 15:51:33",
//         "played" => 0,
//         "url" => "https://www.youtube.com/watch?v=NUsoVlDFqZg"
//          ]);
// $song_controller->update([
//         "idSong" => 1,
//         "idUser" => 1,
//         "idGender" => 4,
//         "title" => "Caminando por la vida",
//         "artist" => "Melendi",
//         "image" => "vida",
//         "date" => "2023-01-27 14:51:33",
//         "played" => 0,
//         "url" => "https://www.youtube.com/watch?v=eznXJEjvHbk"
//          ]);

//$song_controller->destroy(7);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="./home/template.css">
</head>

<body>
<?php
require_once "./home/template.html";
require_once "./list/list.php";
require_once "./form/indexForm.php";
require_once "./view_modal/modal_close.html";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <script src="./form/js/indexForm.js"></script>
</body>



</html>



