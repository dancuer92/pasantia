/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function autocompletarFormato() {
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#cod_formato').val();
    if (keyword.length >= min_length && keyword !== "") {
        $.post("../controlador/Facade.php", {cod_formato: keyword, opcion: "cargarFormatos"},
        function (mensaje) {
            $('#formatos').html(mensaje);
        });
    } else {
        $('#formatos').html('');        
        Materialize.toast("Error seleccionando un formato", 3000, 'rounded');
    }
}
; 