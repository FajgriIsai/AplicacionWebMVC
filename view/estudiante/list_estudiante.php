<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=estudiante&action=edit" class="btn btn-outline-primary">Estudiantes de Computación en el servidor Web (MEXINGSOF) UNIR</a>
        <a href="index.php?controller=asignatura&action=edit" class="btn btn-outline-primary">Asignatura del primer semestre de UNIR</a>

        <hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $note){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $note['nombre']; ?></h5>
					<div class="card-text"><?php echo nl2br($note['apellido']); ?></div>
					<hr class="mt-1"/>
					<a href="index.php?controller=estudiante&action=edit&id=<?php echo $note['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="index.php?controller=estudiante&action=confirmDelete&id=<?php echo $note['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen estudiantes de UNIR.
		</div>
		<?php
	}
	?>
</div>