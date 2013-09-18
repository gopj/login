<div class="row">
	<div class="visible-desktop">

		<div class="row">
			<div class="span3">
				<h4><?php echo agenda::getMonthName($weekDate). " - " . agenda::getYear($weekDate) ; ?></h4>
			</div>
		</div>

		<div class="span2">
			<div class="pull-left">
				<h4>Lunes</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[0] );?>
				</h5>
			</div>
			
			<?php

			
			foreach ($weekEvents[0] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}
			
			?>
			
		</div>



		<div class="span2">
			<div class="pull-left">
				<h4>Martes</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[1] );?>
				</h5>
			</div>
			
			<?php

			foreach ($weekEvents[1] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}

			?>
			
		</div>





		<div class="span2">
			<div class="pull-left">
				<h4>Mi&eacute;rcoles</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[2] );?>
				</h5>
			</div>
			
			<?php

			foreach ($weekEvents[2] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}

			?>
			
		</div>








		<div class="span2">
			<div class="pull-left">
				<h4>Jueves</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[3] );?>
				</h5>
			</div>
			
			<?php

			foreach ($weekEvents[3] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}

			?>
			
		</div>







		<div class="span2">
			<div class="pull-left">
				<h4>Viernes</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[4] );?>
				</h5>
			</div>
			
			<?php

			foreach ($weekEvents[4] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}

			?>
			
		</div>











		<div class="span2">
			<div class="pull-left">
				<h4>Sabado</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[5] );?>
				</h5>
			</div>
			
			<?php

			foreach ($weekEvents[5] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}

			?>
			
		</div>









		<div class="span2">
			<div class="pull-left">
				<h4>Domingo</h4>
			</div>

			<div class="pull-left" style="margin-left:10px;">
				<h5 style="color:grey;">
					<?php echo agenda::getDay( $weekDaysDate[6] );?>
				</h5>
			</div>
			
			<?php

			foreach ($weekEvents[6] as $event) {
				echo agenda::printEventDayWeek(
						$event['idEvent'],
						$event['title'],
						$event['description'],
						$event['timeStart']
					);
			}

			?>
			
		</div>





		<!-- EMPTY -->
		<?php if ($vacio) { ?>
			<div class="span10">
				<div class="alert">
					<h4>No hay eventos para esta semana</h4>
				</div>
			</div>
		<?php } ?>

	</div>












	<div class="visible-tablet visible-phone">

		<div class="row">
			<div class="span2">
				<h4><?php echo agenda::getMonthName($weekDate) ; ?> </h4>
			</div>
		</div>

		<div class="accordion" id="accordion2">

			<!-- MONDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[0] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" style="background-color:#<?php echo $color?>">
						<h5>
							Lunes
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[0] );?>
							</span>
						</h5>
					</a>
				</div>
				<div id="collapseOne" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[0] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>
				
			</div>

			<!-- TUESDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[1] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" style="background-color:#<?php echo $color?>">
						<h5>
							Martes
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[1] );?>
							</span>
						</h5>
					</a>
				</div>
				<div id="collapseTwo" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[1] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>
				
			</div>

			<!-- WEDNESDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[2] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" style="background-color:#<?php echo $color?>">
						<h5>
							Mi&eacute;rcoles
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[2] );?>
							</span>
						</h5>
					</a>
				</div>
				<div id="collapseThree" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[2] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>

			</div>

			<!-- THURSDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[3] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour" style="background-color:#<?php echo $color?>">
						<h5>
							Jueves
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[3] );?>
							</span>
						</h5>
					</a>
				</div>
				<div id="collapseFour" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[3] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>
				
			</div>

			<!-- FRIDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[4] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive" style="background-color:#<?php echo $color?>">
						<h5>
							Viernes
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[4] );?>
							</span>
						</h5>
					</a>
				</div>
				<div id="collapseFive" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[4] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>
				
			</div>


			<!-- SATURDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[5] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix" style="background-color:#<?php echo $color?>">
						<h5>
							Sabado
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[5] );?>
							</span>
						</h5>
					</a>
				</div>
				<div id="collapseSix" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[5] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>
				
			</div>


			<!-- SUNDAY -->

			<div class="accordion-group">

				<div class="accordion-heading">
					<?php ( count( $weekEvents[6] ) > 0 ? $color = "bbb" : $color = "eee"  ); ?>
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven" style="background-color:#<?php echo $color?>">
						<h5>
							Domingo
							<span style="color:000;margin-left:10px;"> 
								<?php echo agenda::getDay( $weekDaysDate[6] );?>
							</span>
						</h5>
					</a>
				</div>

				<div id="collapseSeven" class="accordion-body collapse in">
					<div class="accordion-inner">
						<?php

						foreach ($weekEvents[6] as $event) {
							echo agenda::printEventDay(
									$event['idEvent'],
									$event['title'],
									$event['description'],
									$event['timeStart']
								);
						}

						?>
					</div>
				</div>
				
			</div>

			
		</div>

	</div>

</div>

<script type="text/javascript">
	$('#collapseOne').collapse("hide");
	$('#collapseTwo').collapse("hide");
	$('#collapseThree').collapse("hide");
	$('#collapseFour').collapse("hide");
	$('#collapseFive').collapse("hide");
	$('#collapseSix').collapse("hide");
	$('#collapseSeven').collapse("hide");
</script>