<div class="row">
	<div class="span3 offset3">
		<h4><?php echo agenda::getMonthName($monthDate) . " - " . agenda::getYear($monthDate) ; ?></h4>
	</div>
</div>

<div class="visible-desktop">

	<div class="row">
		<div class="span2"><h4>Lunes</h4></div>
		<div class="span2"><h4>Martes</h4></div>
		<div class="span2"><h4>Mi&eacute;rcoles</h4></div>
		<div class="span2"><h4>Jueves</h4></div>
		<div class="span2"><h4>Viernes</h4></div>
		<div class="span2"><h4>Sabado</h4></div>
		<div class="span2"><h4>Domingo</h4></div>
	</div>


	<?php 
		foreach ($monthEvents as $pointerWeek => $weekEvents) {
			echo "<div class='row'>";
			foreach ($weekEvents as $pointerDay => $dayEvents) {
				echo "<div class='span2 agenda-mv-day'>";
					echo "<div style='cursor:pointer;";
						if ( (agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) > 7 && $pointerWeek == 0) || (agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) < 7 && $pointerWeek == 4) )
							echo "color:grey' ";
						else echo "' ";
						echo " onClick='changeViewToDay(\"{$weekDaysDate[$pointerWeek][$pointerDay]}\")' class='pull-left'> <strong class = 'link'>" . agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) . "</strong>" ;
					echo "</div>";
				foreach ($dayEvents as $key => $event) {
					if ($key > 2) break;
					echo "<div " . utils::onClickHref("events/view/".$event['idEvent']) . " class='span2 agenda-mv-day-event-effect'>" . $event['title']. "</div>";
					// echo "<div " . utils::onClickHref("events/view/".$event['idEvent']) . " class='span2 agenda-mv-day-event-effect'>" . utils::recorta( $event['title'] , 13 ) . "...</div>";
				}
				echo "</div>";
			}
			echo "</div>";
		} 
	?>


	

</div>


<div class="visible-tablet">

	<?php 
		foreach ($monthEvents as $pointerWeek => $weekEvents) {
			echo "<div class='row'>";
			foreach ($weekEvents as $pointerDay => $dayEvents) {
				echo "<div class='span2 agenda-mv-day'>";
					echo "<div style='cursor:pointer;";
						if ( (agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) > 7 && $pointerWeek == 0) || (agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) < 7 && $pointerWeek == 4) )
							echo "color:grey' ";
						else echo "' ";
						echo " onClick='changeViewToDay(\"{$weekDaysDate[$pointerWeek][$pointerDay]}\")' class='pull-left'> <strong class = 'link'>" . agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) . "</strong> - " . agenda::getDayName($weekDaysDate[$pointerWeek][$pointerDay]) ;
					echo "</div>";
				foreach ($dayEvents as $key => $event) {
					if ($key > 2) break;
					echo "<div " . utils::onClickHref("events/view/".$event['idEvent']) . " class='span2 agenda-mv-day-event-effect'>" . utils::recorta( $event['title'] , 13 ) . "...</div>";
				}
				echo "</div>";
			}
			echo "</div>";
		} 
	?>

</div>


<div class="visible-phone">

	<?php 
		foreach ($monthEvents as $pointerWeek => $weekEvents) {
			echo "<div class='row'>";
			foreach ($weekEvents as $pointerDay => $dayEvents) {
				echo "<div class='span3 agenda-mv-day'>";
					echo "<div style='cursor:pointer;";
						if ( (agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) > 7 && $pointerWeek == 0) || (agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) < 7 && $pointerWeek == 4) )
							echo "color:grey' ";
						else echo "' ";
						echo " onClick='changeViewToDay(\"{$weekDaysDate[$pointerWeek][$pointerDay]}\")' class='pull-left'> <strong class = 'link'>" . agenda::getDay( $weekDaysDate[$pointerWeek][$pointerDay] ) . "</strong> - " . agenda::getDayName($weekDaysDate[$pointerWeek][$pointerDay]) ;
					echo "</div>";
				foreach ($dayEvents as $key => $event) {
					if ($key > 2) break;
					echo "<div " . utils::onClickHref("events/view/".$event['idEvent']) . " class='span3 agenda-mv-day-event-noeffect'>" . utils::recorta( $event['title'] , 13 ) . "...</div>";
				}
				echo "</div>";
			}
			echo "</div>";
		} 
	?>

</div>


</html>

