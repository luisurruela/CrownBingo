'use_strict';

$(document).ready(function () {
    
    // Modal Nuevo Deposito
    $('#nuevo_deposito').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('cliente') // Extract info from data-* attributes

        console.log(recipient);

        var modal = $(this)
        modal.find('.modal-body #cliente').val(recipient)
    });

    // Modal Editar Cliente
    $('#editar_cliente').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cliente_id = button.data('id') // Extract info from data-* attributes
        var cliente_nombre = button.data('nombre') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('.modal-body #id_cliente').val(cliente_id);
        modal.find('.modal-body #nombre_cliente').val(cliente_nombre);
    });

    // Modal Eliminar Cliente
    $('#eliminar_cliente').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cliente_id = button.data('id') // Extract info from data-* attributes

        console.log(cliente_id);

        var modal = $(this)
        modal.find('.modal-body #id_cliente').val(cliente_id);
    });
});