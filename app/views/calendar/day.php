<div class="row">
	<div class="row">
		<div class="span4">
			<div class="float-left">
				<h4><?php echo agenda::getMonthName($dayDate) . " - " . agenda::getYear($dayDate) ; ?> </h4>
			</div>
			<div class="float-left" style="margin-left:10px;">
				<h4><?php echo agenda::getDayName($dayDate); ?></h4>
			</div>
			<div class="float-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay($dayDate); ?>
				</h5>
			</div>
		</div>
	</div>



	<?php if ( count( $dayEvents) < 1 ) { ?> 
		<div class="span10">
			<div class="alert">
				<h4>No hay eventos para este d&iacute;a</h4>
			</div>
		</div>
	<?php } 

		foreach ($dayEvents as $key => $dayEventsHour): ?>

		<?php foreach ($dayEventsHour as $event): ?>

			<div class="row">
				
				<div class="span1"><h4><?php echo $key; ?>:00</h4></div>

				<div class="span10">
					<div class="row">

						<?php 

							echo agenda::printEventDay(
								$event['idEvent'],
								$event['title'],
								$event['description'],
								$event['timeStart']
							); 
						?>

					</div>

					<hr>

				</div>

			</div>

		<?php endforeach; ?>

	<?php endforeach; ?>
	
</div>