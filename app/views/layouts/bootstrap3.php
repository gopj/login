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

		<meta name="generator" content="flavorPHP" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
			echo $this->html->charsetTag("UTF-8");
			echo $this->html->includeCss("bootstrap3/css/bootstrap");
			echo $this->html->includeCss("agenda");
			echo $this->html->includeCss("bootstrap-datetimepicker.min");
			echo $this->html->includeCss("jquery-ui-1.10.3.custom");
			echo $this->html->includeCss("jquery-ui-timepicker-addon");
		?>

		<?php
			echo $this->html->includeJs("jquery-1.10.1.min");
			echo $this->html->includeJs("bootstrap3/bootstrap");
			echo $this->html->includeJs("agenda_login");
			echo $this->html->includeJs("bootstrap-datetimepicker.min");
			echo $this->html->includeJs("jquery-ui-1.10.3.custom");
			echo $this->html->includeJs("jquery-ui-timepicker-addon");
		?>

		<script type="text/javascript">
			var base_url = '<?php echo utils::urlConvert(""); ?>';
		</script>
		
	</head>

	<body>
		<?php echo "BT3" ?>


		<div class="visible-lg">			
		
			<div class = 'container'>

				<div class="navbar navbar-inverse navbar-fixed-top">

					<?php echo $this->html->linkTo( "Agenda" , "index/index" , " class = 'navbar-brand brand-white' " ); ?>
					<ul class = 'nav navbar-nav'>
						<li> <?php echo $this->html->linkTo( "Crear evento" , "events/create/" ); ?> </li>
						<li>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown">
									Mostrar por <span class='caret'></span>
								</button>
								<ul class="dropdown-menu">
									<li><?php echo $this->html->linkTo( "Dia" , "event/index" , "" ); ?></li>
									<li><?php echo $this->html->linkTo( "Semana" , "event/index" , "" ); ?></li>
									<li><?php echo $this->html->linkTo( "Mes" , "event/index" , "" ); ?></li>
								</ul>
							</div>
						</li>
					</ul>

					

					<!-- SEARCH -->
					<div class="btn-group pull-right" style="margin-left:50px;">
						<button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown">
							{Nombre} <span class='caret'></span>
						</button>
						<ul class="dropdown-menu">
							<li><?php echo $this->html->linkTo( "Eventos creados" , "event/index" , "" ); ?></li>
							<li><?php echo $this->html->linkTo( "Editar perfil" , "event/index" , "" ); ?></li>
							<li class="divider"></li>
							<li><?php echo $this->html->linkTo( "Cerrar sesi&oacute;n" , "event/index" , "" ); ?></li>
						</ul>
					</div>

					<?php echo $this->html->form( 'session/login/' , 'POST' , " name = 'form-search' id = 'form-search' class = 'navbar-form pull-right' ") ?>
						<?php echo $this->html->textField( 'form-search-query' , " class = 'form-control' style='width:250px;' placeholder = 'Busqueda' " ); ?>
					</form>

				</div>

				<?php echo utils::br(3); ?>

				<?php echo $content_for_layout ?>

			</div> 

		</div> <!-- LG -->




		<div class="visible-md ">
			
			<div class = 'container'>

				<div class="navbar navbar-inverse navbar-fixed-top">

					<?php echo $this->html->linkTo( "Agenda" , "index/index" , " class = 'navbar-brand brand-white' " ); ?>
					<ul class = 'nav navbar-nav'>
						<li> <?php echo $this->html->linkTo( "Crear evento" , "event/create/" ); ?> </li>
						<li>
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown">
									Mostrar por <span class='caret'></span>
								</button>
								<ul class="dropdown-menu">
									<li><?php echo $this->html->linkTo( "Dia" , "event/index" , "" ); ?></li>
									<li><?php echo $this->html->linkTo( "Semana" , "event/index" , "" ); ?></li>
									<li><?php echo $this->html->linkTo( "Mes" , "event/index" , "" ); ?></li>
								</ul>
							</div>
						</li>
					</ul>

					

					<!-- SEARCH -->
					<div class="btn-group pull-right" style="margin-left:50px;">
						<button type="button" class="btn btn-default dropdown-toggle navbar-btn" data-toggle="dropdown">
							{Nombre} <span class='caret'></span>
						</button>
						<ul class="dropdown-menu">
							<li><?php echo $this->html->linkTo( "Eventos creados" , "event/index" , "" ); ?></li>
							<li><?php echo $this->html->linkTo( "Editar perfil" , "event/index" , "" ); ?></li>
							<li class="divider"></li>
							<li><?php echo $this->html->linkTo( "Cerrar sesi&oacute;n" , "event/index" , "" ); ?></li>
						</ul>
					</div>

					<?php echo $this->html->form( 'session/login/' , 'POST' , " name = 'form-search' id = 'form-search' class = 'navbar-form pull-right' ") ?>
						<?php echo $this->html->textField( 'form-search-query' , " class = 'form-control' style='width:250px;' placeholder = 'Busqueda' " ); ?>
					</form>

				</div>

				<?php echo utils::br(3); ?>

				<?php echo $content_for_layout ?>

			</div>

		</div> <!-- MD -->

		<div class="visible-sm">
			<?php echo $content_for_layout ?>
		</div>  <!-- SM -->
		
	</body>


</html>



