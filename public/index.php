<?php

use App\Controllers\GenderController;

require "../vendor/autoload.php";

$gender_controller = new GenderController;

$gender_controller->store([
    "gender" => "Pop"
]);
// $gender_controller->store([
//     ":gender" => "Pop"
// ]);
?>
