<?php
$id = $codigo = $nombre = "";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["codigo"])) $codigo = $dataToView["data"]["codigo"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];


?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=asignatura&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=asignatura&action=save" method="POST">
		<input type="hidden" name="id" value="<?php echo $id; ?>" />
		<div class="form-group">
			<label>Código</label>
			<input class="form-control" type="text" name="codigo" value="<?php echo $codigo; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Asignatura</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="nombre"><?php echo $nombre; ?></textarea>
		</div>

		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=asignatura&action=list">Cancelar</a>
	</form>
</div>