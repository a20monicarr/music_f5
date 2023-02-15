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
        <form class='form'>
            <div class="formGroup">
                <label for="labelFondoform">ARTISTA</label>
                <input type="artista" class="fondoForm" >
            </div>
            <div class="formGroup">
                <label for="labelFondoForm">TÍTULO</label>
                <input type="artista" class="fondoForm" >
            </div>    
            <div class="formGroup">
                <label for="labelFondoForm">GÉNERO</label>
                <!-- <select class="fondoForm" > -->
                    <?php
                    require_once '../../vendor/autoload.php';
                    use App\Controllers\GenderController;

                    $gender_controller = new GenderController;

                    $gender_controller->index();
                    ?>
                <!-- </select> -->
            </div>
            <div class="formGroup">
                <label for="labelFondoForm">URL DE YOUTUBE</label>
                <input type="artista" class="fondoForm" >
            </div>

            <div class="formGroup">
                <label for="labelFondoform">IMAGEN</label>
                <input type="disco" class="fondoForm" >
                <input type="file" class="form-control" id="exampleFormControlFile1">
              </div>
            <button type="button" class="btnForm btn-primary" >ENVIAR</button>
        </form>
       
    </div>

</body>
</html>