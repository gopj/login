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
			
			$errorType = 0;

			if ( $this->data ) {

				if ( $this->data['inputUsername'] != "" && $this->data['inputPassword'] != "" ) {

					$username = $this->data['inputUsername'];
					$password = $this->data['inputPassword'];

					$users = new users();
					$logs = new logs();
					$user = $users->validate( $username , $password );

					if ( isset( $user['idUser'] ) && $user['idUser'] != null && $user['idUser'] != "" ){

						if ( Validate == true ){
							
							$_log = $logs->findBy('idUser',$user['idUser']);
							
							if ( $_log['idLog'] != null ){
								return;
							}
							
						}

						$newLog = new logs();
						$newLog['idUser'] = $user['idUser'];
						$newLog['created'] = date("Y-m-d H:i:s");
						$newLog->save();

						$this->session->login = true;
						$this->session->idUser = $user['idUser'];

						$this->redirect("index/index");

					}else{
						$this->session->destroy("login");
						$this->session->destroy("idUser");

						$errorType = 1;
					}

				}else{
					$this->session->destroy("login");
					$this->session->destroy("idUser");

					$errorType = 2;
				}
	
			}

			$errorHtml = "";

			if ($errorType == 1) {
				$errorHtml = "<div class ='alert alert-danger'><b>Favor de verificar sus datos</b></div>";
			}elseif ($errorType == 2) {
				$errorHtml = "<div class ='alert alert-info'><b>Campos en blanco</b></div>";
			}
			
			$this->view->errorHtml = $errorHtml;
			$this->render();

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

			$this->redirect("index/index/");
		}
	}
?>