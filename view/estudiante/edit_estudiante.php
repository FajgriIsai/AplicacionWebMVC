<?php
$id = $nombre = $apellido = $nacionalidad = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["apellido"])) $apellido = $dataToView["data"]["apellido"];
if(isset($dataToView["data"]["nacionalidad"])) $nacionalidad = $dataToView["data"]["nacionalidad"];


?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=estudiante&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=estudiante&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Apellido</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="apellido"><?php echo $apellido; ?></textarea>
		</div>
        <div class="form-group mb-2">
            <label>Nacionalidad</label>
            <input class="form-control" type="text" name="nacionalidad" value="<?php echo $nacionalidad; ?>" />
        </div>
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=estudiante&action=list">Cancelar</a>
	</form>
</div>