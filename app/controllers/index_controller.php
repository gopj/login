<?php
	class Index_controller extends appcontroller { 
		public function __construct () { 
			parent ::__construct () ;
			$this->view->setLayout("bootstrap2");
			$this->title_for_layout("Agenda");
		}



		//
		// INDEX - SHOW LOGIN FORM
		//

		public function index( $id = null ) {
			
			$_SESSION['vistas'] = array("Eventos", "events");

			// REDIRECT IF NOT ALREADY LOGGED IN
			// if ( ! $this->session->check('login') ) 
			// 	$this->redirect('session/login/');

			$this->title_for_layout('Agenda');
			
			$this->render();
		}


		//
		// DOWNLOAD THE ICS
		//

		public function download ( $id=null ){ 
			//require_once APP_ROOT . '/flavor/classes/icalcreator.class.php';

			$v = new vcalendar(); // create a new calendar instance

			$v->setConfig( 'unique_id', 'icaldomain.com' ); // set Your unique id
			$v->setProperty( 'method', 'PUBLISH' ); // required of some calendar software

			$vevent = new vevent(); // create an event calendar component
			$vevent->setProperty( 'dtstart', array( 'year'=>2013, 'month'=>3, 'day'=>14, 'hour'=>19, 'min'=>0, 'sec'=>0 ));
			$vevent->setProperty( 'dtend', array( 'year'=>2013, 'month'=>3, 'day'=>14, 'hour'=>22, 'min'=>30, 'sec'=>0 ));
			$vevent->setProperty( 'LOCATION', 'Central Placa' ); // property name - case independent
			$vevent->setProperty( 'summary', 'PHP summit' );
			$vevent->setProperty( 'description', 'This is a description' );
			$vevent->setProperty( 'comment', 'This is a comment' );
			$vevent->setProperty( 'attendee', 'attendee1@icaldomain.net' );
			$v->setComponent ( $vevent ); // add event to calendar
			$vevent = new vevent();
			$vevent->setProperty( 'dtstart', '20130314', array('VALUE' => 'DATE'));// alt. date format, now for an all-day event
			$vevent->setProperty( "organizer" , 'boss@icaldomain.com');
			$vevent->setProperty( 'summary', 'ALL-DAY event' );
			$vevent->setProperty( 'description', 'This is a description for an all-day event' );
			$vevent->setProperty( 'resources', 'COMPUTER PROJECTOR' );
			$vevent->setProperty( 'rrule', array( 'FREQ' => 'WEEKLY', 'count' => 4));// occurs also four next weeks
			$vevent->parse( 'LOCATION:1CP Conference Room 4350' );// supporting parse of strict rfc2445 formatted text
			$v->setComponent ( $vevent ); // add event to calendar

			// all calendar components are described in rfc2445
			// a complete iCalcreator function list (ex. setProperty) in iCalcreator manual

			$v->returnCalendar(); // redirect calendar file to browser
		}


	}
?>