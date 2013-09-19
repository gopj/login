<?php
	class users extends models{

		public function __construct() {
			parent::__construct();
		}

		public function validate( $user = null , $password = null ) {
			if ( $user == null || $password == null )
				return FALSE;

			$query = $this->findBySql("
					SELECT
						*
					FROM
						users
					WHERE
						username = '{$user}'
						AND password = md5('{$password}')
				");

			return $query;
		}

	}
?>
