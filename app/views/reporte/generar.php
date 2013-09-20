<div class="row">
	<div class="col-xs-2">
		Seleccione la escuela	
	</div>

	<?php echo $this->html->form("reporte/generar");?>

		<div class="col-xs-3">
			<?php echo $this->html->select("facultades",$facultades); ?>
		</div>

		<div class="col-xs-3">
			<button class="btn btn-primary">Generar reporte</button>
		</div>

	</form>
	
</div>

<?php echo utils::br(1); ?>

<hr>

<?php echo utils::br(1); ?>

<div class="row">
	<div class="col-sx-2">
		Resultados de reporte
	</div>
</div>

<div class="row">
	<div class="col-sx-10">
		<table class="table table-striped">
			<thead></thead>
		</table>
	</div>
</div>


</html