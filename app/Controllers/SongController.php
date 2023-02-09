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
        ?>
        
         <table>
        <tr>
            <th>Canción</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Género</th>
        </tr>
    <?php foreach ($rows_affected as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['title']; ?></td>
           <td><?= $valor['nameUser']; ?></td>
           <td><?= $valor['date']; ?></td>
           <td><?= $valor['gender']; ?></td>
        </tr>
    <?php endforeach; ?>
    </table> 
        <?php 
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
        
        //evitando SQL injection //seguridad
        $rows_affected = $connection->prepare("INSERT INTO  (nombre, direccion,
        numero_bancario, puntos_cliente) VALUES(:nombre, :direccion, :numero_bancario, :puntos_cliente)");
        
        /* $rows_affected = $connection->prepare("INSERT INTO clientas (nombre, direccion,
        numero_bancario, puntos_cliente) VALUES(
            '{$data["nombre"]}',
            '{$data["direccion"]}',
            {$data['numero_bancario']},
            {$data['puntos_cliente']}
        )");*/
        print_r($rows_affected);
    }

    /**
     * SHOW: muestra un registro específico
     */
    public function show()
    {

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
    public function update()
    {

    }

    /**
     * DESTROY: eliminar el registro
    */
    public function destroy()
    {

    }

}

?>
