<div class="row">
	<form class="form" action="index.php?controller=estudiante&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desea eliminar a este Estudiante?:</b>
			<i><?php echo $dataToView["data"]["nombre"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=estudiante&action=list">Cancelar</a>
	</form>
</div>