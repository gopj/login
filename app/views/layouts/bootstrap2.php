<!--
 /* ===========================

	FlavorPHP - because php should have a better taste
	homepage: http://www.flavorphp.com/
	git repository: https://github.com/Axloters/FlavorPHP

	FlavorPHP is a free software licensed under the MIT license
	Copyright (C) 2008 by Pedro Santana <contacto at pedrosantana dot mx>
	
	Team:
		Pedro Santana
	Victor Bracco
	Victor de la Rocha
	Jorge Condomí
	Aaron Munguia

	=========================== */
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
				"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	
	<head>
		<title><?php echo $title_for_layout; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="generator" content="flavorPHP" />
		
		<?php
			echo $this->html->charsetTag("UTF-8");
			echo $this->html->includeCss("bootstrap2/css/bootstrap");
			echo $this->html->includeCss("bootstrap2/css/bootstrap-responsive");
			echo $this->html->includeCss("agenda");
			echo $this->html->includeCss("bootstrap-datetimepicker.min");
			echo $this->html->includeCss("docs");
			echo $this->html->includeCss("bootstrap-select");
			echo $this->html->includeCss("bootstrap-formhelpers");
			echo $this->html->includeCss("jquery.dataTables");
			echo $this->html->includeCss("datepicker");
			echo $this->html->includeCss("bootstrap-timepicker");
			
		?>

		<?php
			echo $this->html->includeJs("jquery-1.10.1.min");
			echo $this->html->includeJs("bootstrap2/bootstrap");
			echo $this->html->includeJs("agenda-fechas");
			echo $this->html->includeJs("agenda-loader");
			echo $this->html->includeJs("agenda-functions");
			echo $this->html->includeJs("agenda-ajax");
			echo $this->html->includeJs("bootstrap-datetimepicker.min");
			echo $this->html->includeJs("bootstrap-select");
			echo $this->html->includeJs("bootstrap-formhelpers-selectbox");
			echo $this->html->includeJs("jquery.dataTables");
			echo $this->html->includeJs("bootstrap-datepicker");
			echo $this->html->includeJs("bootstrap-timepicker");
			
		?>

		<script type="text/javascript">
			var base_url = '<?php echo utils::urlConvert(""); ?>';
		</script>
		
	</head>

	<body>

		<div class="navbar navbar-fixed-top navbar" style="position: static;">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>

					<?php echo $this->html->linkTo("","index","class='brand brand-white'"); ?>
					<div class="navbar nav-collapse collapse navbar-inverse-collapse">
						<ul class="nav">
							<li> <?php echo @$this->html->linkTo($_SESSION['vistas'][0], @$_SESSION['vistas'][1]."/", ""); ?> </li>
						</ul>

						<ul class="nav pull-right">

							<!-- <form class="navbar-search">
								<input type="text" class="search-query" placeholder="Buscar">
							</form> -->

							<?php if ( $this->session->check('login') === true ) { ?>

								<li class="dropdown">
									
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<?php echo @$this->session->nombre. " " . @$this->session->apellido . " ( " . @$this->session->usuario ." )"; ?>
										<b class="caret"></b>
									</a>

									<ul class="dropdown-menu">
										<li><?php echo $this->html->linkTo( "Eventos creados" , "events?user=".$this->session->usuario , " " ); ?></li>
										<li><?php echo $this->html->linkTo( "Editar perfil" , "users/update/{$this->session->idUser}" , "" ); ?></li>
										<li class="divider"></li>
										<li><?php echo $this->html->linkTo( "Cerrar sesi&oacute;n" , "session/logout" , "" ); ?></li>
									</ul>

								</li>

							<?php }else{ ?>
								<li class="dropdown">
									<?php echo $this->html->linkTo("Iniciar sesi&oacute;n","session/login/","class='dropdown-toggle'") ?>
								</li>
							<?php } ?>
						</ul>
					</div><!-- /.nav-collapse -->
				</div>
			</div><!-- /navbar-inner -->
		</div><!-- /navbar -->

		<div class = 'container'>
			<?php echo $content_for_layout ?>
		</div>

		<p>&nbsp;</p>
		<div id="footer">           		
            	&copy; Derechos reservados 2013. Universidad de Colima - <a href="http://www.ucol.mx/docencia/">Coordinaci&oacute;n General de Docencia</a><br />
				Av. Universidad #333. Colonia Las V&iacute;boras. C.P. 28040. Colima, Col., M&eacute;xico. Tel +52 (312) 316-1059.
            </div>

	</body>

</html>