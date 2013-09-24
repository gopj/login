<div class="row">
	<div class="col-md-2">
		Seleccione la escuela	
	</div>

	<?php echo $this->html->form("reporte/index");?>

		<div class="col-md-5">
			<?php echo $this->html->select("facultad",$facultades); ?>
		</div>

		<div class="col-md-2">
			<button class="btn btn-primary">Generar reporte</button>
		</div>

	</form>
	
</div>

<?php 
	if ($generated) {
	echo utils::br(1); 
	// utils::pre($estudiantesFaltantes);
?>

<hr>

<?php echo utils::br(1); ?>

<div class="row">
	<div class="col-md-4">
		<h4>Resultados de reporte</h4>
	</div>
</div>

<div class="row">
	<div class="col-md-10">
		<table class="table table-striped">
			<thead>
				<th>Programa educativo</th>
				<th>A encuestar</th>
				<th>Encuestados</th>
				<th>Faltan</th>
			</thead>
			<tbody>
				<?php
				for ($i=0; $i < count($programasEducativos); $i++) { 
					echo "<tr>";
					echo "<td>{$programasEducativos[$i]['carrera']}</td>";
					echo "<td>{$aEncuestar[$i]['AEncuestar']}</td>";
					echo "<td>{$encuestados[$i]['encuestados']}</td>";
					echo "<td>{$faltan[$i]}</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		<?php echo $this->html->linkTo("Descargar reporte","excel/reporte/{$facultad}","class='btn btn-primary pull-right'"); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<h4>Estudiantes faltantes</h4>
	</div>
</div>

<div class="row">
	<div class="col-md-10">
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Programa</th>
			</thead>
			<tbody>
				<?php
				foreach ($estudiantesFaltantes as $key => $value) {
					echo "<tr>";
						echo "<td>{$value['nombre']}</td>";
						echo "<td>{$value['carrera']}</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		<?php echo $this->html->linkTo("Descargar reporte","excel/eFaltantes/{$facultad}","class='btn btn-primary pull-right'"); ?>
	</div>
</div>

<?php echo utils::br(5);} ?>
</html>