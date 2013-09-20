<div class="row">
	<div class="col-xs-3 border">
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