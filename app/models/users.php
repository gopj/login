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

		public function userProfile(){

			$query = $this->findAllBySql("
				SELECT 
					u.*, p.txt_profile 
				FROM 
					users u, profiles p
				WHERE
					u.idProfile = p.idProfile;
			");

			return $query;

		}
	}
?>
