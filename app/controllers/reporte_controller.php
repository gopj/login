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
			$generated = false;

			if ($this->data) {
				$generated = true;
				$facultad = $this->data['facultad'];
				$this->view->facultad = $facultad;
				$programasEducativos = $registros->getProgramasEducativos($facultad);
				$estudiantesFaltantes = $registros->getEstudiantesFaltantes($facultad);
				// utils::pre($programasEducativos);
				$this->view->programasEducativos = $programasEducativos;
				$this->view->estudiantesFaltantes = $estudiantesFaltantes;
				if ( count($programasEducativos) > 0) {
				
					$aEncuestar = array();
					$encuestados = array();


					foreach ($programasEducativos as $key => $value) {
						$aEncuestar[] = $registros->getAEncuestar($value['carrera']);
						$encuestados[] = $registros->getEncuestados($value['carrera']);
					}
					// utils::pre($aEncuestar);
					$this->view->encuestados = $encuestados;
					$this->view->aEncuestar = $aEncuestar;
					
					$faltan = array();
					for ($i=0; $i < count($programasEducativos) ; $i++) { 
						$faltan[$i] = $aEncuestar[$i]['AEncuestar'] - $encuestados[$i]['encuestados'];
					}

					$this->view->faltan = $faltan;

				}
			}

			$this->view->generated = $generated;
			$this->view->facultades = $registros->getFacultades();
			$this->render();
		}

		public function generar($id = null) {

			$facultad = $this->data['facultad'];
			$registros = new registros();

				

			$this->view->facultades = $registros->getFacultades();
			$this->render();

		}

	}
?>