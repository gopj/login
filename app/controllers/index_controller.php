<?php
	class Index_controller extends appcontroller { 
		p
		ublic function __construct () { 
			parent ::__construct () ;
			$this->view->setLayout("bootstrap2");
			$this->title_for_layout("T&iacute;tulo de la app");
		}

		//
		// INDEX - SHOW LOGIN FORM
		//

		public function index( $id = null ) {

			// REDIRECT IF NOT ALREADY LOGGED IN
			if ( ! $this->session->check('login') ) 
				$this->redirect('session/login/');
			
			$this->render();
		}

	}
?>