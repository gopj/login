<?php
	class session_controller extends appcontroller { 
		public function __construct () { 
			parent ::__construct () ;
			$this->view->setLayout("bs3-session");
			$this->title_for_layout('Agenda') ;
		}

		//
		// REQUIRED FUNCTION
		//

		public function index( $id=null ) {}

		//
		// LOGIN VIEW
		//
		// if already logged in show user info

		public function login( $id = null ) {
			if ( $this->session->check('login') ) 
				$this->redirect('index/');
			
			if ( $this->data ) {

				if ( $this->data['inputUsername'] != "" && $this->data['inputPassword'] != "" ) {

					$username = $this->data['inputUsername'];
					$password = $this->data['inputPassword'];

					$users = new users();
					$user = $users->validate( $username , $password );

					$return = array();

					if ( isset( $user['idUser'] ) && $user['idUser'] != null && $user['idUser'] != "" ){

						$this->session->login = true;
						$this->session->idUser = $user['idUser'];
						$this->session->nombre = $user['nombre'];
						$this->session->apellido = $user['apellido'];
						$this->session->usuario = $user['username'];
						$this->session->perfil = $user['idProfile'];

						$return['valid'] = 'true';
						echo json_encode( $return );

					}else{

						$this->session->destroy("login");
						$this->session->destroy("idUser");
						$this->session->destroy("nombre");
						$this->session->destroy("apellido");
						$this->session->destroy("username");
						$this->session->destroy("idProfile");

						session_unset("vistas");

						session_destroy();
						
						$this->session->login = false;
						$return['valid'] = 'false';
						echo json_encode( $return );

					}

				}else{

					$this->session->destroy("login");
					$this->session->destroy("idUser");
					$this->session->destroy("nombre");
					$this->session->destroy("apellido");
					$this->session->destroy("username");
					$this->session->destroy("idProfile");

					session_unset("vistas");

					session_destroy();
					
					$return['valid'] = 'false';
					echo json_encode( $return );

				}

			}else{
				$this->render();
			}

		}


		//
		// SHOW USER INFO IF LOGGED IN
		//

		public function info( $id = null ) {
			if ( ! $this->session->check('login') )
				$this->redirect('session/login/');
			

		}


		//
		// SHOW USER INFO IF LOGGED IN
		//

		public function logout( $id = null ) {
			if ( ! $this->session->check('login') )
				$this->redirect('session/login/');

			$this->session->destroy("login");
			$this->session->destroy("idUser");
			$this->session->destroy("nombre");
			$this->session->destroy("apellido");
			$this->session->destroy("username");
			$this->session->destroy("idProfile");

			session_unset("vistas");


			$this->redirect("index/index/");
		}
	}
?>