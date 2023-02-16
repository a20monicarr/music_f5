<?php
namespace App\Controllers;

use Database\Conexion\Connection;



class SongController{

    /**
     * INDEX: muestra la lista de todos los registros que tenemos
    */
    //SELECT `idSong`,`idUser`,`idGender`,`title`,`artist`,`image`,`date`,`played`,`url` FROM `song` WHERE 1
    public function index()
    {



        $connection = Connection::getInstance()->get_instance_database();

        //evitando SQL injection //seguridad
        //$rows_affected = $connection->exec("INSERT INTO gender (gender) VALUES ( :gender ) ");
        //$rows_affected = $connection->exec("INSERT INTO gender (gender) VALUES( '{$data["gender"]}')");
        //$rows_affected = $connection->prepare("SELECT * FROM `user`");

        $sql = "SELECT song.idSong, song.idUser, song.idGender, song.title, song.artist, song.image, song.date, song.played, song.url, user.nameUser, gender.gender
        FROM song
        INNER JOIN user
        ON song.idUser = user.idUser
        INNER JOIN gender
        ON song.idGender = gender.idGender
        ";

        $rows_affected = $connection->prepare($sql);
        $rows_affected->execute();
        // print_r ($rows_affected);
        // $col_count = $rows_affected->fetchColumn();
        // echo "cantidad lineas: " . $col_count;
        // return $col_count;

         //if ($prepared->fetchColumn() == 1)
        // $result=true;

        // else
        //     $result=false;


        //print_r($rows_affected);
        //SELECT  `idUser`,`nameUser`,`email`,`password` FROM `user` WHERE 1
        //SELECT * FROM `user` WHERE  `email` = 'monica@gmail.com'AND `password` = MD5('monica');
//      UPDATE `user` SET `email` = 'monica@gmail.com', `password` = MD5('monica') WHERE `user`.`idUser` = 1;
       

    foreach ($rows_affected as $valor): ?>
    
    <tr>
              <td class="tbl_td"><?= $valor['date']; ?></td>
              <td class="tbl_td"><?= $valor['title']; ?></td>
              <td class="tbl_td"><?= $valor['artist']; ?></td>
              <td class="tbl_td"><?= $valor['gender']; ?></td>
              <td class="tbl_td"><?= $valor['image']; ?></td>
              <td class="tbl_td"><?= $valor['nameUser']; ?></td>
              <td class="tbl_td_accion">
                <a class="edit " data-id="" href="#"> 
                  <button class="btn_play"><i class="bi bi-check-lg"></i>></button>
                </a>
                <a class="edit" data-id="" href="#">
                  <button class="btn_update"><i class="bi bi-gear-fill"></i></button>
                </a>
                <a class="delete" data-id="" href="#">
                <button class="btn_delete"><i class="bi bi-x-lg"></i></button>
                </a>
              </td>
          </tr>
    <?php endforeach;

    }

    /**
     * CREATE: muestra un formulario para ingresar un nuevo registro
     */

    public function create()
    {

    }

     /**
     * STORE: registra en la base de datos lo que recibe del create
     */
    public function store($data)
    {
        $connection = Connection::getInstance()->get_instance_database();
        $sql="INSERT INTO `song` ( `idUser`, `idGender`, `title`, `artist`, `image`, `date`, `played`, `url`)
        VALUES ('{$data["idUser"]}',
                '{$data["idGender"]}',
                '{$data["title"]}',
                '{$data["artist"]}',
                '{$data["image"]}',
                '{$data["date"]}',
                '{$data["played"]}',
                '{$data["url"]}')";
        //evitando SQL injection //seguridad
        $rows_affected = $connection->prepare($sql);

        print_r($rows_affected);
        $rows_affected->execute();
    }

    /**
     * SHOW: muestra un registro específico
     */
    public function show($id_song)
    {
      $connection = Connection::getInstance()->get_instance_database();

      $sql = "SELECT song.idSong, song.idUser, song.idGender, song.title, song.artist, song.image, song.date, song.played, song.url, user.nameUser
      FROM song
      INNER JOIN user
      ON song.idUser = user.idUser
      WHERE song.idSong= $id_song";

      $rows_affected = $connection->prepare($sql);
      $rows_affected->execute();
      print_r($rows_affected);
      return $rows_affected;
     

 
    }

    /**
     * EDIT: muestra un formulario para editar un registro
     */
    public function edit()
    {

    }

    /**
     * UPDATE: actualizar el registro dentro de la base de datos
     */
    public function update($data)
    {
        //UPDATE `song` SET `title` = 'Brasil' WHERE `song`.`idSong` = 2;
        echo $data["image"];
        $connection = Connection::getInstance()->get_instance_database();
        $sql="UPDATE `song`
              SET  `idUser`= {$data["idUser"]},
                                `idGender`= {$data["idGender"]},
                                `title`= '{$data["title"]}',
                                `artist`= '{$data["artist"]}',
                                `image`=  '{$data["image"]}',
                                `date`= '{$data["date"]}',
                                `played`= '{$data["played"]}',
                                `url`= '{$data["url"]}'
             WHERE  `idSong`= {$data["idSong"]}";

        $rows_affected = $connection->prepare($sql);

        print_r($rows_affected);
        $rows_affected->execute();

    }

    /**
     * DESTROY: eliminar el registro
    */
    public function destroy($id)
    {
        $connection = Connection::getInstance()->get_instance_database();
        $sql = "DELETE FROM `song` WHERE `idSong` = $id";

        $rows_affected = $connection->prepare($sql);

        print_r($rows_affected);
        $rows_affected->execute();


        /* Devolver el número de filas que fueron eliminadas */
        // print("Devolver el número de filas que fueron eliminadas:\n");
        $row_delete = $rows_affected->rowCount();
        // print("Eliminadas $row_delete filas.\n");
        $datos_salida = [$row_delete,
        "La canción con id: '{$id}' fue eliminada. "];
        print_r($datos_salida);

        return $datos_salida;
    }
}





?>