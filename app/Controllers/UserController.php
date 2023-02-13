<?php
namespace App\Controllers;

use Database\Conexion\Connection;

class UserController{

    /**
     * INDEX: muestra la lista de todos los registros que tenemos
    */

    public function index()
    {

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
        // $connection = Connection::getInstance()->get_instance_database();

        // //evitando SQL injection //seguridad
        // $rows_affected = $connection->prepare("INSERT INTO clientas (nombre, direccion,
        // numero_bancario, puntos_cliente) VALUES(:nombre, :direccion, :numero_bancario, :puntos_cliente)");

        // /* $rows_affected = $connection->prepare("INSERT INTO clientas (nombre, direccion,
        // numero_bancario, puntos_cliente) VALUES(
        //     '{$data["nombre"]}',
        //     '{$data["direccion"]}',
        //     {$data['numero_bancario']},
        //     {$data['puntos_cliente']}
        // )");*/
        // print_r($rows_affected);
    }

    /**
     * SHOW: muestra un registro específico
     */
    public function show($data)
    {
        $connection = Connection::getInstance()->get_instance_database();
        $rows_affected = $connection->prepare(" SELECT * FROM `user` WHERE  `email` = '{$data["email"]}' AND `password` = MD5('{$data["password"]}');");
        $rows_affected->execute();

        $col_id = $rows_affected->fetchColumn();
        echo "cantidad lineas: " . $col_id;

        $datos_salida = [$col_id,
        "El usuario con: '{$data["email"]}' fue encontrado. "];
        return $datos_salida;

        /*?>

<!-- <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
    <?php foreach ($rows_affected as $clave => $valor): ?>
        <tr>
           <td><?= $valor['idUser']; ?></td>
           <td><?= $valor['nameUser']; ?></td>
           <td><?= $valor['email']; ?></td>
           <td><?= $valor['password']; ?></td>
        </tr>
    <?php endforeach; ?>
    </table> -->
<?php */
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