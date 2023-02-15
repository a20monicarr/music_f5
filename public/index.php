<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "Usuario no existe";
     //header('Location: login/frontLogin.php');
} else {
    echo ($_SESSION['user_id']);
    $user_id = $_SESSION['user_id'];
}
// use Dotenv\Dotenv;
// require_once __DIR__.'/vendor/autoload.php';
require_once '../vendor/autoload.php';
use App\Controllers\UserController;
use App\Controllers\GenderController;
use App\Controllers\SongController;

if(isset($_POST['artista'])){
    // $user_controller = new UserController;
      $artista = $_POST['artista'];
      echo $artista."<br>";
      $titulo = $_POST['titulo'];
      echo $titulo."<br>";
      $genero = $_POST['genero'];
      echo $genero."<br>";
      $url = $_POST['url'];
      echo $url."<br>";
      $foto = $_POST['foto'];
      echo $foto."<br>";
      
      $song_controller = new SongController; 
      $song_controller->store([
        "idUser" =>  $user_id,
        "idGender" => $genero,
        "title" => $titulo,
        "artist" => $artista,
        "image" => $foto,
        "date" => NULL,
        "played" => 0,
        "url" => $url
         ]);
      





    //   $password = $_POST['userPassword'];
    // $user_array= $user_controller->show([
    //      "email" => $user,
    //      "password" => $password
    
    //   ]);
}
require_once "./home/template.html";
require_once "./list/list.php";
require_once "./form/indexForm.php";
require_once "./view_modal/modal_close.html";

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