<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//sino, calculamos el tiempo transcurrido 
$fechaGuardada = $_SESSION["ultimoAcceso"];
$ahora = strtotime(date('Y/m/d H:i:s', time()));
$tiempo_transcurrido = $ahora - $fechaGuardada;
//echo ('diferencia'.$tiempo_transcurrido);

//comparamos el tiempo transcurrido 
if ($tiempo_transcurrido >=9000) {
    //si pasaron 1 minutos o más 
    session_destroy(); // destruyo la sesión 
    header("Location: sesionExpirada.php"); //envío al usuario a la pag. de autenticación 
    //sino, actualizo la fecha de la sesión 
} else {
    $_SESSION["ultimoAcceso"] = $ahora;
}
