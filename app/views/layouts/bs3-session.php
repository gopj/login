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
			echo $this->html->includeCss("encuesta");
		?>

		<?php
			echo $this->html->includeJs("jquery-1.10.1.min");
			echo $this->html->includeJs("bootstrap3/bootstrap");
			echo $this->html->includeJs("agenda_login");
		?>

		<script type="text/javascript">
			var base_url = '<?php echo utils::urlConvert(""); ?>';
		</script>
		
	</head>

	<body>

		
			<?php echo $content_for_layout ?>
		

	</body>
</html>