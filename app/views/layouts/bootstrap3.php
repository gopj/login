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
		?>

		<?php
			echo $this->html->includeJs("jquery-1.10.1.min");
			echo $this->html->includeJs("bootstrap3/bootstrap");
		?>

		<script type="text/javascript">
			var base_url = '<?php echo utils::urlConvert(""); ?>';
		</script>
		
	</head>

	<body>
		<?php echo "BT3" ?>


		<div class="visible-lg">			
		
			<div class = 'container'>

				<?php echo utils::br(3); ?>

				<?php echo $content_for_layout ?>

			</div> 

		</div> <!-- LG -->




		<div class="visible-md ">
			
			<div class = 'container'>

				


				<?php echo utils::br(3); ?>

				<?php echo $content_for_layout ?>

			</div>

		</div> <!-- MD -->

		<div class="visible-sm">
			<?php echo $content_for_layout ?>
		</div>  <!-- SM -->
		
	</body>


</html>



