<?php
class excel_controller extends appcontroller { 
	public function __construct () { 
		parent ::__construct () ;
		$this->view->setLayout("bootstrap3");
		$this->title_for_layout("T&iacute;tulo de la app");
	}

	public function index( $id = null ) {

		$this->render();
	}

	public function reporte($facultad){
		$objExcel = new xlsx();
		$objExcel->setTitle("Reporte");

		$objExcel->setColumnWidth('A', 40);
		$objExcel->setColumnWidth('B', 20);
		$objExcel->setColumnWidth('C', 20);
		$objExcel->setColumnWidth('D', 20);
		
		$objExcel->setCell("A1", "Programa educativo");	
		$objExcel->setCell("B1", "A encuestar");
		$objExcel->setCell("C1", "Encuestados");
		$objExcel->setCell("D1", "Faltan");

		$registros = new registros();
		$generated = true;
		

		$programasEducativos = $registros->getProgramasEducativos($facultad);
		
		if ( count($programasEducativos) > 0) {
		
			$aEncuestar = array();
			$encuestados = array();


			$f = 1;
			

			foreach ($programasEducativos as $key => $value) {
				$aEncuestar[] = $registros->getAEncuestar($value['carrera']);
				$encuestados[] = $registros->getEncuestados($value['carrera']);
			}
			
			$this->view->encuestados = $encuestados;
			$this->view->aEncuestar = $aEncuestar;
			
			$faltan = array();
			for ($i=0; $i < count($programasEducativos) ; $i++) { 
				$faltan[$i] = $aEncuestar[$i]['AEncuestar'] - $encuestados[$i]['encuestados'];
			}


			for ($i=0; $i < count($programasEducativos); $i++) { 
				$body[$f][0] = $programasEducativos[$i]['carrera'];
				$body[$f][1] = $aEncuestar[$i]['AEncuestar'];
				$body[$f][2] = $encuestados[$i]['encuestados'];
				$body[$f][3] = $faltan[$i];
				
				$f++;
			}


			$header = array();
		
			$footer = array();
			
			$objExcel->addTable($header, $body, $footer, 'A1', TRUE);

			$objExcel->download();
		}
	}

	public function eFaltantes($facultad){
		$objExcel = new xlsx();
		$registros = new registros();
		$objExcel->setTitle("Estudiantes Faltantantes de " . $facultad);
		
		$objExcel->setCell("A1", "Nombre");	
		$objExcel->setCell("B1", "Programa");


		$estudiantesFaltantes = $registros->getEstudiantesFaltantes($facultad);

		$f = 1; 
		foreach ($estudiantesFaltantes as $key => $value) {
			$body[$f][0] = $value['nombre'];
			$body[$f][1] = $value['carrera'];

			$f++;
		}
		
		$header = array();
	
		$footer = array();
		
		$objExcel->addTable($header, $body, $footer, 'A1', TRUE);

		$objExcel->download();
	}


}
?>