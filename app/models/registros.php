<?php
	class registros extends models{

		public function __construct() {
			parent::__construct();
		}

		public function getFacultades(){
			$query = $this->findAllBySql("
					SELECT DISTINCT
						facultad
					FROM
						registros
				");

			foreach ($query as $key => $value) {
				$return[] = $value['facultad'];
			}

			return $return;
		}

		public function getProgramasEducativos($value='')
		{
			$query = $this->findAllBySql("
					SELECT DISTINCT
						carrera
					FROM
						registros
					WHERE
						facultad = '{$value}'
				");

			// foreach ($query as $key => $value) {
			// 	$return = $value['']
			// }
			return $query;
		}

		public function getAEncuestar($value='')
		{
			$query = $this->findBySql("
					SELECT
						count(no_cuenta) as AEncuestar
					FROM
						registros
					WHERE
						carrera = '{$value}'
				");

			return $query;
		}

		public function getEncuestados($value='')
		{
			$query = $this->findBySql("
					SELECT
						count(no_cuenta) as encuestados
					FROM
						logs, registros
					WHERE
						logs.idUser = registros.no_cuenta	AND
						registros.carrera = '{$value}'
				");

			return $query;
		}


		public function getEstudiantesFaltantes($value='')
		{
			$query = $this->findAllBySql("
					SELECT 
						registros.nombre as nombre, registros.carrera as carrera
					FROM
						registros
					WHERE
						no_cuenta not in (
							SELECT
									idUser
							FROM
									logs
						) 
					AND
						facultad = '{$value}'

				");

			return $query;
		}

	}
?>
