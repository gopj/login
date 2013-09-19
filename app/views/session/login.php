
<!-- <div class="row"> -->
	<div class="col-lg-12 border" style="background-color:white">
		<center>
			<?php echo $this->html->image("logo.gif");?>
		</center>
	</div>
<!-- </div> -->

<div class="container">

	<?php

	if (isset($errorHtml)) {
		if ($errorHtml != "") {
			echo @$errorHtml;
		}	
	}
	

	?>

	<div class = 'form-login' style="margin-top:100px;">
		<h3>T&iacute;tulo de la APP</h3>
			
			<?php echo $this->html->form( 'session/login/' , 'POST' , " name = 'login' id = 'login' class = 'form-horizontal' ") ?>
				
				<div class="form-group" id = 'form-username'>

					<label for="inputUsername" class="col-lg-4 control-label">Usuario</label>

					<div class="col-lg-6">

						<input type="text" class="form-control" name="inputUsername" id="inputUsername"  onfocus="inputFocus()">

					</div>

				</div>

				<div class="form-group" id = 'form-password'>
					<label for="inputPassword" class="col-lg-4 control-label">Contraseña</label>

					<div class="col-lg-6">

						<input type="password" class="form-control" name="inputPassword" id="inputPassword" onfocus="inputFocus()">						

					</div>

				</div>


				<div class="form-group" id = 'form-password'>
					<div class="col-lg-4">

					</div>

					<div class="col-lg-6">

						<button type="submit" class="btn btn-success btn-block" >Entrar</button>						

					</div>

				</div>

			</form>

	</div>

</div>

<p>&nbsp;</p>
		<div id="footer">           		
            	&copy; Derechos reservados 2013. Universidad de Colima - <a href="http://www.ucol.mx/docencia/">Coordinaci&oacute;n General de Docencia</a><br />
				Av. Universidad #333. Colonia Las V&iacute;boras. C.P. 28040. Colima, Col., M&eacute;xico. Tel +52 (312) 316-1059.
            </div>

<script type="text/javascript">
	
	$(function(){
		
		$('#inputUsername').focus();

	});
	
</script>