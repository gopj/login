
<!-- <div class="row"> -->
	<div class="col-lg-12 border" style="background-color:white">
		<center>
			<?php echo $this->html->image("logo.gif");?>
		</center>
	</div>
<!-- </div> -->

<div class="container">

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

						<button type="button" class="btn btn-warning btn-block" <?php echo utils::onclickHref("index/")?>>Atras</button>						

					</div>

					<div class="col-lg-6">

						<button type="submit" class="btn btn-success btn-block" onclick="loginModal('myModal')">Entrar</button>						

					</div>

				</div>

			</form>

	</div>


	<!-- Modal -->
	<div class="modal fade" id="myModal">
		<div class = 'modal-dialog'>
			<div class = 'modal-content'>
				<div class="modal-body">
					Espere por favor
					<center>
						<div class="progress progress-striped active">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
							</div>
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>

<p>&nbsp;</p>
		<div id="footer">           		
            	&copy; Derechos reservados 2013. Universidad de Colima - <a href="http://www.ucol.mx/docencia/">Coordinaci&oacute;n General de Docencia</a><br />
				Av. Universidad #333. Colonia Las V&iacute;boras. C.P. 28040. Colima, Col., M&eacute;xico. Tel +52 (312) 316-1059.
            </div>

<script type="text/javascript">
	
	$(function(){
		
		$('#myModal').modal({
			backdrop: 'static',
			keyboard: false ,
			show: false
		});

		login_url = '<?php echo utils::urlConvert("session/login/"); ?>';
		
		$('#inputUsername').focus();

	});
	
</script>