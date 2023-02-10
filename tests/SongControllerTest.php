<?php
use App\Controllers\SongController;
use PHPUnit\Framework\TestCase;
class SongControllerTest extends TestCase{
    function test_SongControllerDestroy_ok(){
    /**
     * CASO 1
     * Given - Dado un array con los datos de la clienta [ email, password]
     * When - Cuando se comprueba usuario registrado en la bd
     * Then - Entonces retorna id usuario
    */
    // Arrange : Escenario
    $song_controller = new SongController;
    $datos_entrada = 6;
    $datos_salida_esperados = [1,
    "El usuario con id: '{$datos_entrada}' fue eliminado. "];

    //Act : Ejecuto mi escenario de la caja negra llamo un método
    $datos_salida_reales= $song_controller->destroy($datos_entrada);
    
    //Assert : Comprobar /comparar el escenario
    $this->assertEquals($datos_salida_esperados, $datos_salida_reales);
    }
}
?>