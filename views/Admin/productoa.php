<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>
<div class="container">
  <h1 class="mt-5"><i class="fas fa-plus-circle"></i> Agregar Producto</h1>
  <form class="mt-5" action="<?= URL ?>Admin/agregarproducto" method="post" enctype="multipart/form-data">
    <div class="form-group row mb-3">
      <label for="nombre" class="col-sm-3 col-form-label"><i class="fas fa-signature"></i> Nombre del producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
    </div>

    <div class="form-group row mb-3">
      <label for="precio" class="col-sm-3 col-form-label"><i class="fas fa-dollar-sign"></i> Precio:</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
      </div>
    </div>

    <div class="form-group mb-3">
      <label for="descripcion"><i class="fas fa-align-left"></i> Descripción:</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="4" cols="50" required></textarea>
    </div>

    <div class="form-group d-flex align-items-center mb-3">
      <label for="categoria" class="w-25"><i class="fas fa-tags"></i> Categoría:</label>
      <select class="form-control w-50" id="categoria" name="categoria" required>
        <?php foreach ($viewData['categorias'] as $categoria): ?>
          <option value="<?= $categoria->getIdCategoria(); ?>"><?= $categoria->getDescripcion(); ?></option>
        <?php endforeach; ?>
      </select>
      <a href="<?= URL ?>Admin/acategoria" class="btn btn-secondary ml-3 w-25"><i class="fas fa-plus mt-2"></i> Agregar categoría</a>
    </div>

    <div class="form-group row mb-3">
      <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
      <div class="col-sm-9">
        <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
      </div>
    </div>

    <input type="hidden" name="estado" value="1">
    <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-plus-circle"></i> Agregar producto</button>
  </form>
</div>


<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>


