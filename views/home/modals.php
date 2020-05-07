<div class="modal fade" id="nuevo_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="inc/cliente.php" method="post">
            <div class="form-group">
                <label for="nombre_cliente">Nombre</label>
                <input id="nombre_cliente" class="form-control" type="text" name="nombre">
            </div>
            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button id="nuevo_btn" type="submit" class="btn btn-primary" name="guardar">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="nuevo_deposito" tabindex="-1" role="dialog" aria-labelledby="nuevoDeposito" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nuevoDeposito">Nuevo Depósito</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="inc/depositos.php" method="post">
          <div class="form-group">
            <label for="deposito">Cantidad</label>
            <input class="form-control" name="deposito" type="number" step="0.01">
          </div>

          <input id="cliente" type="hidden" name="cliente_id">

          <div class="modal-footer mt-5">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
          </div>
        
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editar_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="inc/cliente.php" method="post">
            <div class="form-group">
                <label for="nombre_cliente">Nombre</label>
                <input id="nombre_cliente" class="form-control" type="text" name="nombre">
            </div>
            <input id="id_cliente" type="hidden" name="cliente_id">
            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
                <button id="nuevo_btn" type="submit" class="btn btn-primary" name="update">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="eliminar_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="inc/cliente.php" method="post">
            <p>¿Estás seguro de eliminar este cliente?</p>
            <input id="id_cliente" type="hidden" name="cliente_id">
            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button id="nuevo_btn" type="submit" class="btn btn-danger" name="borrar">Si, eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>