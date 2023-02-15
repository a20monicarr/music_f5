<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./list/js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="./list/css/list.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
  	<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css" rel="stylesheet"/>


</head>
<body>
  <div class="block">
    <div class="columns">
      <div class="column p-5">
          <input type="radio" name="radio_played" value="A" />Todas 
          <input type="radio" name="radio_played" value="P" />Reproducidas
          <input type="radio" name="radio_played" value="U" />No Reproducidas  
      </div>
      <div class="column p-5">
        <div id="is-relative">
          <input type="" class="input">
          <span id="icon">
          <i class="fa-thin fa-gear"></i>
            <i class="fa-solid fa-gear">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
        </div>
       
      </div>
    </div>
      
    <table id="table" class="tables">
      <thead>
        <tr>
          <th class="tbl_td">FECHA PLAYED</th>
          <th class="tbl_td">TTITULO</th>
          <th class="tbl_td">ARTISTA</th>
          <th class="tbl_td">GENERO</th>
          <th class="tbl_td">IMAGEN</th>
          <th class="tbl_td">CODER</th>
          <th class="tbl_td_accion"></th>
        </tr>
      </thead>
      <tbody class="listEmployees">

      <?php 
      //require_once '../../vendor/autoload.php';
      use App\Controllers\SongController;
      
        $song_controller = new SongController;
        $song_controller->index();
      ?>
      
          
          
      </tbody>
    </table>
  </div>
</body>
</html>