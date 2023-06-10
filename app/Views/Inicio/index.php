<div class="container text-center">
    <div class="row">
        <div class="col-2">
        </div>

        <div class="col-12">
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach ($datos  as $fila): ?>
                    <tr>
                        <td><?php echo $fila->Codigo; ?></td>
                        <td><?php echo $fila->Categoria; ?></td>
                        <td><?php echo $fila->Nombre; ?></td>
                        <td><?php echo $fila->Descripcion; ?></td>
                        <td><?php echo $fila->Precio; ?></td>
                        <td><?php echo $fila->Stock; ?></td>
                        <td>
                            <form method="POST" action="<?php echo base_url(); ?>historial">
                                <input type="hidden" name="id" value="<?php echo $fila->Codigo; ?>">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>
                            <form method="POST" action="extras/deleteProduct.php">
                                <input type="hidden" name="idDelete" value="<?php //echo $fila['id']; ?>">
                                <button type="submit" class="btn btn-danger">Sup.</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>