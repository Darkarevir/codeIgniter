<div class="container text-center">
    <div class="row">
        <div class="col-2">
        </div>

        <div class="col-12">
            <table class="table table-dark table-striped table-hover table-bordered" id="datos">
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
                    <?php if(count($datos)>0):?>
                    <?php foreach ($datos  as $fila): ?>
                    <tr>
                        <td><?php echo $fila->Codigo; ?></td>
                        <td><?php echo $fila->Categoria; ?></td>
                        <td><?php echo $fila->Nombre; ?></td>
                        <td><?php echo $fila->Descripcion; ?></td>
                        <td><?php echo $fila->Precio; ?></td>
                        <td><?php echo $fila->Stock; ?></td>
                        <td>
                            <form method="GET" action="<?php echo base_url(); ?>historial">
                                <input type="hidden" name="id" value="<?php echo $fila->Codigo; ?>">
                                <button type="submit" class="btn btn-primary">Ver</button>
                            </form>
                            <form method="GET" action="<?php echo base_url(); ?>delete"
                                onsubmit="return confirm('¿Estás seguro de que deseas borrar <?php echo $fila->Nombre; ?>?');">
                                <input type="hidden" name="idDelete" value="<?php echo $fila->Codigo; ?>">
                                <button type="submit" class="btn btn-danger">Sup.</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
let table = new DataTable('#datos');
</script>