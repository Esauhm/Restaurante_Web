<?php require_once VIEW_LAYOUT_PATH . 'header.php'; ?>

<div class="container">
  <h1 class="pt-3" style="color: #c43f3f;">Mis pedidos</h1>
  
  <hr>
  <?php if (isset($_SESSION['success_pedido'])) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success_pedido']; ?>
        </div>
    <?php } ?>
    <?php unset($_SESSION['error_pedido'], $_SESSION['success_pedido']); ?>
  <div class="row ">
      <form class="mb-5" method="post" action="<?php echo URL . 'Usuario/Pedido'; ?>">
        <div class="row">
          <div class="form-group col-md-4">
            <label for="fecha_pedido" class="mb-2">Fecha:</label>
            <input type="date" class="form-control" id="fecha_pedido" name="fecha_pedido" value="<?php echo $fechaActual; ?>">
          </div>
          <div class="form-group col-md-4">
            <label for="id_estado" class="mb-2">Estado:</label>
            <select id="id_estado" name="id_estado" class="form-control">
              <option value="">Todos</option>
              <option value="1">En proceso</option>
              <option value="2">Finalizado</option>
              <option value="3">Cancelado</option>
            </select>
          </div>
          <div class="form-group col-md-4  mt-4">
            <button type="submit" class="btn btn-primary">Filtrar Pedidos</button>
          </div>
        </div>

      </form>

    <div class="col-md-12">
      <?php if (empty($viewData['pedidos'])): ?>
        <p>No tienes pedidos activos en este momento</p>
      <?php else: ?>
        <table class="table table-striped table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Fecha</th>
              <th scope="col">Estado</th>
              <th scope="col">Ver</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($viewData['pedidos'] as $pedido): ?>
              <tr>
                <td><?php echo $pedido->getIdPedido(); ?></td>
                <td><?php echo $pedido->getFechaPedido(); ?></td>
                <td><?php echo $pedido->getEstadoPedido(); ?></td>
                <td>
                  <form method="post" action="<?php echo URL . 'Admin/DetallePedido'; ?>">
                    <input type="hidden" name="id_pedido" value="<?php echo $pedido->getIdPedido(); ?>">
                    <button type="submit" class="btn btn-info">Ver Detalle</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

      <?php endif; ?>
    </div>
  </div>

  

</div>

<?php require_once VIEW_LAYOUT_PATH . 'footer.php'; ?>
