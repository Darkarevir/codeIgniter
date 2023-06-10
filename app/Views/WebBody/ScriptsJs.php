<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

<script>
function validarEnteroPositivo(input) {
    var valor = parseInt(input.value);
    if (isNaN(valor) || valor < 1) {
        input.setCustomValidity("Ingrese un número entero positivo.");
    } else {
        input.setCustomValidity("");
    }
}

function validarDecimalPositivo(input) {
    var valor = parseFloat(input.value);
    if (isNaN(valor) || valor <= 0) {
        input.setCustomValidity("Ingrese un número decimal positivo.");
    } else {
        input.setCustomValidity("");
    }
}
</script>