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

			return $query;
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

			return $query;
		}

		public function getAEncuestar($value='')
		{
			$query = $this->findBySql("
					SELECT
						sum(nocuenta)
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
						sum(nocuenta)
					FROM
						registros
					WHERE
						carrera = '{$value}'
				");

			return $query;
		}


		public function getEstudiantesFaltantes($value='')
		{
			$query = $this->findAllBySql("
					SELECT
						sum(nocuenta)
					FROM
						registros
					WHERE
						carrera = '{$value}'
				");

			return $query;
		}

	}
?>
