<?php
use App\Controllers\UserController;
use PHPUnit\Framework\TestCase;
class UserControllerTest extends TestCase{
    function test_userControllerShow_ok(){
    /**
     * CASO 1
     * Given - Dado un array con los datos de la clienta [ email, password]
     * When - Cuando se comprueba usuario registrado en la bd
     * Then - Entonces retorna id usuario
    */
    // Arrange : Escenario
    $user_controller = new UserController;
    $datos_entrada = [   
            "email" => "mariela@gmail.com",
            "password" => "mariela"
    ];
    
    $datos_salida_esperados = [13,
    "El usuario con: '{$datos_entrada["email"]}' fue encontrado. "];
    //Act : Ejecuto mi escenario de la caja negra llamo un método
    $datos_salida_reales= $user_controller->show($datos_entrada);
    //Assert : Comprobar /comparar el escenario
    $this->assertEquals($datos_salida_esperados, $datos_salida_reales);
    }
}
?>