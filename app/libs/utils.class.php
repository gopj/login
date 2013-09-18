<?php
class utils {
	
	public static function pre($arr,$exit = true){
		echo "<pre>";
			print_r($arr);
		echo "</pre>";
		if($exit)exit;
	}

	public static function recorta($str, $tam = 12) {
		return substr(html_entity_decode($str, ENT_COMPAT, 'UTF-8'), 0, $tam);
	}

	public static function onClickHref($view){
		return "onclick='window.location.href=\"" . Path . $view . "\"'";
	}

	public static function urlConvert($view){
		return  Path . $view ;
	}

	public static function br($value=0){
		if ( $value == 0 ) return false;
		$return = "";
		for ( $i = $value ; $i > 0 ; $i--) { 
			$return .= "<br>";
		}	
		return $return;
	}

	public static function nbs($value=0){
		if ( $value == 0 ) return false;
		$return = "";
		for ( $i = $value ; $i > 0 ; $i--) { 
			$return .= "&nbsp;";
		}	
		return $return;
	}

	public static function baseUrl() {
		return Path ;
	}


	public static function fechas($date){

		$date  = date("H:i", strtotime($date));

		return $date."<br />";
	}
	

}

?>
