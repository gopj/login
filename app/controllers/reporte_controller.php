<?php
	class reporte_controller extends appcontroller { 
		public function __construct () { 
			parent ::__construct () ;
			$this->view->setLayout("bootstrap3");
			$this->title_for_layout("T&iacute;tulo de la app");
		}

		//
		// INDEX - SHOW LOGIN FORM
		//

		public function index( $id = null ) {

			$registros = new registros();

			$this->view->facultades = $registros->getFacultades();
			$this->render();
		}

		public function generar($id = null) {
			if ($id==null) $this->redirect("reporte/index");

			$registros = new registros();
			$programasEducativos = $registros->getProgramasEducativos($id);

			if ( count($programasEducativos) > 0) {
			
				$aEncuestar = array();
				$encuestados = array();
				$estudiantesFaltantes = array();

				foreach ($programasEducativos as $key => $value) {
					$aEncuestar[] = $registros->getAEncuestar($value['carrera']);
					$encuestados[] = $registros->getEncuestados($value['carrera']);
					$estudiantesFaltantes[] = $registros->getEstudiantesFaltantes($value['carrera']);
				}

				$faltan = array();
				foreach ($aEncuestar as $key => $value) {
					$faltan[] = $encuestados[$key] - value;
				}

			}

			$this->view->facultades = $registros->getFacultades();
			$this->render();

		}

	}
?>