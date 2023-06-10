<div class="container text-center">
    <div class="row">
        <div class="col-2">

        </div>
        <div class="col-8">
            <form method="POST" action="<?php echo base_url(); ?>Save">
                <div class="mb-3">

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span id="categoriaSeleccionadaTexto">Categoria</span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php foreach ($datos as $proveedor): ?>
                            <li><a class="dropdown-item" href="#"
                                    onclick="seleccionarCategoria(<?php echo $proveedor->idCa; ?>, '<?php echo $proveedor->nombre; ?>')"><?php echo $proveedor->nombre; ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <input type="hidden" name="idCa" id="idCa" value="">


                    <input class="form-control" name="Producto" type="text" placeholder="Nombre del Producto"
                        aria-label="Nombre del Producto">
                    <label for="Nombre del Producto" class="form-label">Decripción del Producto</label>
                    <input class="form-control" name="Descripcion" type="text" placeholder="Decripción del Producto"
                        aria-label="Nombre del Producto">
                    <label for="Cantidad" class="form-label">Cantidad</label>
                    <input class="form-control" name="Cantidad" type="number" min="1" placeholder="Cantidad"
                        aria-label="Cantidad" oninput="validarEnteroPositivo(this)">
                    <label for="Precio" class="form-label">Precio</label>
                    <input class="form-control" name="Precio" type="number" step="0.01" placeholder="Precio"
                        aria-label="Precio" oninput="validarDecimalPositivo(this)">
                    <p></p>
                    <button type="submit" class="btn btn-primary"> Agregar</button>
                </div>
            </form>
        </div>
        <div class="col-2">
        </div>

    </div>
</div>

<script>
function seleccionarCategoria(idCa, nombre) {
    document.getElementById('idCa').value = idCa;
    document.getElementById('categoriaSeleccionadaTexto').textContent = nombre;
    console.log(idCa)
    console.log(document.getElementById('idCa').value)
}
</script>