<?php require_once VIEW_LAYOUT_PATH . 'header.php' ?>

    <div class="container">
    <h1 class="mt-5">Actualizar Producto</h1>
        <form method="post"  enctype="multipart/form-data" action="<?php echo URL . 'Admin/actualizarproducto'?> ">
            <input type="hidden" name="id" value="<?php echo $viewData['producto']->getIdProducto(); ?>">
            <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $viewData['producto']->getNombre(); ?>">
            </div>
            <div class="form-group">
            <label for="precio">Precio</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $viewData['producto']->getPrecio(); ?>">
            </div>
            <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?php echo $viewData['producto']->getDescripcionProd(); ?></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                <?php foreach($viewData['categorias'] as $categoria): ?>
                    <?php $selected = ($categoria->getIdCategoria() == $viewData['producto']->getCategoria()) ? 'selected' : ''; ?>
                    <option value="<?php echo $categoria->getIdCategoria(); ?>" <?php echo $selected; ?>><?php echo $categoria->getDescripcion(); ?></option>
                <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
            <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="1"<?php echo ($viewData['producto']->getEstado() == 1) ? ' selected' : ''; ?>>Disponible</option>
                    <option value="2"<?php echo ($viewData['producto']->getEstado() == 2) ? ' selected' : ''; ?>>No disponible</option>
                </select>
            </div>


            <div class="form-group row mb-3">
                <label for="image_url" class="col-sm-3 col-form-label"><i class="fas fa-image"></i> Subir imagen:</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    

<?php require_once VIEW_LAYOUT_PATH . "footer.php"; ?>
