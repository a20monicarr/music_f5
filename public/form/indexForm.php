<?php
// session_start();
$form_update_o_insert = $_SESSION['form_update_o_insert'];
// require_once '../../vendor/autoload.php';

use App\Controllers\SongController;

if ($form_update_o_insert == "update") {
    $song_controller = new SongController;
    $song_controller->show(12);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./form/stylesForm.css" />
    <title>Form</title>
</head>

<body class="bodyForm">
    <div class="containerform">
        <form class='form' method="post">
            <div class="formGroup">
                <label for="labelFondoform">ARTISTA</label>
                <input name="artista" type="artista" id="artista" class="fondoForm">
            </div>
            <div class="formGroup">
                <label for="labelFondoForm">TÍTULO</label>
                <input name="titulo" type="titulo" id="titulo" class="fondoForm">
            </div>
            <div class="formGroup">
                <label for="labelFondoForm">GÉNERO</label>
                <!-- <select class="fondoForm" > -->
                <?php

                // require_once '../../vendor/autoload.php';
                use App\Controllers\GenderController;

                $gender_controller = new GenderController;

                $gender_controller->index();
                ?>
                <!-- </select> -->
            </div>
            <div class="formGroup">
                <label for="labelFondoForm">URL DE YOUTUBE</label>
                <input name="url" type="url" id="url" class="fondoForm">
            </div>

            <div class="formGroup">
                <label for="labelFondoform">IMAGEN</label>
                <input name="foto" type="file" id="foto" class="form-control" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btnForm btn-primary">ENVIAR</button>
        </form>

    </div>

</body>

</html>