<?php
/**
* CLASE CON FUNCIONES PARA CREAR LA AGENDA
*/
class agenda
{

	private $daysOfWeek;

	public function __construct () {
		date_default_timezone_set('America/Mexico_City');
	}







	/*
	GET THE DATE OF THE DAYS IN THE WEEK
	*/
	public function weekDaysDate( $year = null , $month = null , $day = null ) {
		if ( $day == null )
			$day = date( "d" );
		
		if ( $month == null ) 
			$month = date( "m" );

		if ( $year == null ) 
			$year = date( "Y" );
		
		$daysAfterMonday = date( "N" , mktime(0, 0, 0, $month, $day, $year ) ) - 1;
		$expectedMonday = date("Y-m-d", strtotime( "{$year}-{$month}-{$day} - {$daysAfterMonday} days" ) );

		list($year,$month,$day) = explode("-", $expectedMonday);

		$expectedSunday = date("Y-m-d", strtotime( "{$year}-{$month}-{$day} + 6 days" ) );

		$daysOfWeek = array();
		
		for ($i=0; $i < 7 ; $i++) { 
			array_push($daysOfWeek, date("Y-m-d", strtotime("{$year}-{$month}-{$day} + {$i} days") ) );
		}

		return $daysOfWeek;
	}


	








	public static function printEventDayWeek( $url , $title , $info , $time ) {
		$url = utils::onClickHref("events/view/".$url);
		if ( strlen($title) > 12 ){
			$title = utils::recorta($title,12)."...";
		}
		if ( strlen($info) > 25 ){
			$info = utils::recorta($info,25)."...";
		}
		
		$r = "
		<div class='span2 agenda-element-margin' {$url} >
			<div class='agenda-element'>
				<center>
					<div class='agenda-element-background-title'>
						<h5>{$title}</h5>
					</div>

					<div class='agenda-element-info'>
						{$info}
					</div>

					<div>
						{$time}
					</div>
				</center>
			</div>
		</div>
		";
		return $r;
	}







	public static function printEventDay( $url , $title , $info , $time ) {
		$url = utils::onClickHref("events/view/".$url);
		if ( strlen($title) > 17 ){
			$title = utils::recorta($title,17)."...";
		}
		if ( strlen($info) > 40 ){
			$info = utils::recorta($info,40)."...";
		}
		
		$r = "
		<div class='span3 agenda-element-margin' {$url} >
			<div class='agenda-element'>
				<center>
					<div class='agenda-element-background-title border-title'>
						<h5>{$title}</h5>
					</div>

					<div class='agenda-element-info'>
						{$info}
					</div>

					<div>
						{$time}
					</div>
				</center>
			</div>
		</div>
		";
		return $r;
	}



	public static function getYear($date){
		list($year,$month,$day) = explode("-", $date);
		return $year;
	}

	public static function getMonth($date){
		list($year,$month,$day) = explode("-", $date);
		return $month;
	}

	public static function getDay($date){
		list($year,$month,$day) = explode("-", $date);
		return $day;
	}

	public static function getDayName($date){
		$dayName = date("l" , strtotime( $date ) );
		switch ($dayName) {
			case 'Monday':
				$dayName = "Lunes";
				break;

			case 'Tuesday':
				$dayName = "Martes";
				break;

			case 'Wednesday':
				$dayName = "Mi&eacute;rcoles";
				break;

			case 'Thursday':
				$dayName = "Jueves";
				break;

			case 'Friday':
				$dayName = "Viernes";
				break;

			case 'Saturday':
				$dayName = "Sabado";
				break;

			case 'Sunday':
				$dayName = "Domingo";
				break;
			
			default:
				break;
		}
		return $dayName;
	}

	public static function getMonthName($date){
		$monthName = date("M" , strtotime( $date ) );
		switch ($monthName) {
			case 'Jan':
				$monthName = "Enero";
				break;
			
			case 'Feb':
				$monthName = "Febrero";
				break;

			case 'Mar':
				$monthName = "Marzo";
				break;

			case 'Apr':
				$monthName = "Abril";
				break;
			
			case 'May':
				$monthName = "Mayo";
				break;

			case 'Jun':
				$monthName = "Junio";
				break;

			case 'Jul':
				$monthName = "Julio";
				break;
			
			case 'Aug':
				$monthName = "Agosto";
				break;

			case 'Sep':
				$monthName = "Septiembre";
				break;

			case 'Oct':
				$monthName = "Octubre";
				break;
			
			case 'Nov':
				$monthName = "Noviembre";
				break;

			case 'Dec':
				$monthName = "Diciembre";
				break;

		}

		return $monthName;
	}





}
?>