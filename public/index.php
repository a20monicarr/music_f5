<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "Usuario no existe";
     header('Location: login/frontLogin.php');
} else {
    echo ($_SESSION['user_id']);
}

//use App\Controllers\UserController;
//use App\Controllers\GenderController;
use App\Controllers\SongController;

require "../vendor/autoload.php";


// $gender_controller = new GenderController;

// $gender_controller->store([
//     "gender" => "Pop"
// ]);
// $gender_controller->store([
//     ":gender" => "Pop"
// ]);

// $user_controller = new UserController;

// //$user_controller->show();
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
$song_controller = new SongController;

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

         $song_controller->destroy(7);
?>