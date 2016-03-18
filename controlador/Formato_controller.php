<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once '../modelo/facade/Facade.php';

$option = $_POST['opcion'];
$formato_controller = new Formato_controller();

if ($option == 'cargarFormatos') {
    $formato = $_POST['formato'];
    $formato_controller->cargarFormatos($formato);
}
if ($option == 'guardarFormato') {
    $codigo = $_POST['codigoF'];
    $nombre = $_POST['nombreF'];
    $procedimiento = $_POST['procedimientoF'];
    $director = $_POST['directorF'];
    $frecuencia = $_POST['frecuenciaF'];
    $tipo = $_POST['tipoF'];
    $descripcion = $_POST['descripcionF'];
    $html = $_POST['codigoHTML'];
    $formato_controller->guardarFormato($codigo, $nombre, $procedimiento, $director, $frecuencia, $tipo, $descripcion, $html);
}

class Formato_controller {

    private $facade;

    public function __construct() {
        $this->facade = new Facade();
    }

    public function cargarFormatos($formato) {
        $mensaje = '';

        $formatos = $this->facade->cargarFormatos($formato);
//        echo $json.'controller';
        if (count($formatos) == 0) {
            $mensaje = '<strong> El formato consultado no existe </Strong>';
        } else {

            foreach ($formatos as $format) {

                $array = json_decode($format, true);

//                $mensaje = '<div class="card" onclick="set(&' . $array["cod_formato"] . '&,&' . $array["nombre"] . '&)">
//                    <div class="card-content">
//                        <p><strong>Código: </strong>' . $array["cod_formato"] . '</p>
//                        <p><strong>Nombre: </strong>' . $array["nombre"] . '</p>
//                        <p><strong>Observaciones: </strong>' . $array["observaciones"] . '</p>
//                        <p><strong>Procedimiento: </strong>' . $array["procedimiento"] . '</p>                        
//                        <p><strong>Jefe Procedimiento: </strong>' . $array["jefe_procedimiento"] . '</p>
//                        <p><strong>Descripción: </strong>' . $array["descripcion"] . '</p>              
//                        <p><strong>Frecuencia: </strong>' . $array["frecuencia"] . '</p></div></div>';

                $mensaje.='<tr>
                            <td>' . $array["cod_formato"] . '</td>
                            <td>' . $array["nombre"] . '</td>
                            <td>' . $array["observaciones"] . '</td>
                            <td>' . $array["procedimiento"] . '</td>                        
                            <td>' . $array["jefe_procedimiento"] . '</td>                        
                            <td>
                                <a class="hoverable colorTexto tooltipped" data-position="top" data-delay="50" data-tooltip="Diligenciar" href="#Diligenciar"> <i class="material-icons">keyboard</i></a>';
                if ($_SESSION['tipo'] == 'admin') {
                    $mensaje.='<a class="hoverable colorTexto tooltipped modal-trigger" data-position="top" data-delay="50" data-tooltip="Asignar " onclick="asignarFormato(' . $array["cod_formato"] . ');"><i class="material-icons">input</i></a>
                                <a class="hoverable colorTexto tooltipped" data-position="top" data-delay="50" data-tooltip="Modificar" href="#Modificar"><i class="material-icons">edit</i></a>';
                }
                $mensaje.='</td>
                        </tr>';
            }
            $mensaje = str_replace("&", "'", $mensaje);
        }
        echo $mensaje;
    }

    public function guardarFormato($codigo, $nombre, $procedimiento, $director, $frecuencia, $tipo, $descripcion, $html) {
        $mensaje = '';
        $mensaje = $this->facade->guardarFormato($codigo, $nombre, $procedimiento, $director, $frecuencia, $tipo, $descripcion, $html);
        echo $mensaje;
    }

}
?>
