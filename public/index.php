<?php

//use App\Controllers\UserController;
use App\Controllers\GenderController;

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

$gender_controller = new GenderController;

//$user_controller->show();
$gender_controller->index();
?>