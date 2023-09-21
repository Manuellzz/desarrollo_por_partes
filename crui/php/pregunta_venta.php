<?php
for ($i = 0; $i < 3; $i++) {
    $id = "producto_" . $i;
    echo '<form action="php/visualizar_venta" method="POST">';
    echo '<div id="' . $id . '">';
    echo '<label class="form-label">Ingrese el nombre del producto</label>';
    echo '<input type="text" class="form-control" name="nombre_p[]">';
    echo '<label class="form-label">Valor del producto</label>';
    echo '<input type="number" class="form-control" name="valor_p[]">';
    echo '</div>';
}
echo '<div id="contenedor_campos" class="contenedor-campos"></div>

<div class="mb-4">
<label class="form-label">porcentaje impuesto en porcentaje</label>
<div class="input-group">
    <input type="number" class="form-control" name="impuesto_p" step="0.01" required>
    <span class="input-group-text">%</span>
</div>
</div>';
echo '<button type="submit" class="btn btn-secondary btn-lg" name="submit_registro_venta" onclick="eliminarCamposVacios()">Vender</button>
<button type="button" class="btn btn-secondary btn-lg" onclick="regresar2()">Cancelar</button>
<div id="contenedor_campos"></div>
<br>
<button type="button" class="btn btn-secondary btn-lg" onclick="agregarCampos()">Insertar nuevo campos</button>
</form> ;
';


?>



<script src="javascript/acciones.js"></script>