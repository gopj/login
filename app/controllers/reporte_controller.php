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
			
			$this->render();
		}

	}
?>