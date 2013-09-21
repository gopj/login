<?php
class xlsx {	
  
	protected $path;
	protected $registry;    
	private $properties;
	private $phpExcel;
	public $cols;
	protected $sheetName = "Worksheet";
	const MERGEROWCELL = "MERGEROWCELL";
	const MERGECOLCELL = "MERGECOLCELL";
	public $pointHeader = array("r" => 5, "c" => 1);
	
	public function __construct() {
		$this->registry = registry::getInstance();
		$this->path = $this->registry["path"];
		$this->phpExcel = new PHPExcel();
		$this->properties = array(
			"creator" => "Universidad de Colima",
			"title" => "",
			"subject" => "PIFI",
			"description" => "Programa Integral de Fortalecimiento Institucional."
		);
		$this->cols = array(
			"A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U", "V", "W", "X", "Y", "Z",
			"AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ", 
			"BA", "BB", "BC", "BD", "BE", "BF", "BG", "BH", "BI", "BJ", "BK", "BL", "BM", "BN", "BO", "BP", "BQ", "BR", "BS", "BT", "BU", "BV", "BW", "BX", "BY", "BZ",
			"CA", "CB", "CC", "CD", "CE", "CF", "CG", "CH", "CI", "CJ", "CK", "CL", "CM", "CN", "CO", "CP", "CQ", "CR", "CS", "CT", "CU", "CV", "CW", "CX", "CY", "CZ"
		);
		$this->setProperties();
	}

	public function setProperties(){
		$this->phpExcel->getActiveSheet()->setTitle($this->properties["title"]);
		$this->phpExcel->getActiveSheet()->setTitle($this->sheetName);		
		$this->phpExcel->getProperties()->setCreator($this->properties["creator"]);
		$this->phpExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
		$this->phpExcel->getDefaultStyle()->getFont()->setSize(10);		
		$this->phpExcel->getActiveSheet()->getSheetView()->setZoomScale(100);
		$this->phpExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(11);
		//$this->phpExcel->getActiveSheet()->getPageSetup()->setPrintArea("A1:V147");
		$this->phpExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setScale(41);
	}

	public function setTitle($title){
		$this->properties["title"] = $title;
		$this->sheetName = $title;
	}

	public function setWorksheetTitle($title){
		$this->phpExcel->getActiveSheet()->setTitle($title);
		$this->sheetName = $title;
	}
	
	public function addImage($img, $pos, $height = 36, $name = "", $desc = "", $offset = 10) {
		$imgPath = "app/views/images/".$img;
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName($name);
		$objDrawing->setDescription($desc);
		$objDrawing->setPath($imgPath);
		$objDrawing->setHeight($height);
		$objDrawing->setCoordinates($pos);
		$objDrawing->setOffsetX($offset);
		$objDrawing->setWorksheet($this->phpExcel->getActiveSheet());
	}
	
	public function colAndRow2Cell($col, $row) {
		return $this->cols[$col].$row;
	}
	
	public function expandCell($cell) { 
		preg_match("/[0-9]/", $cell, $matches);
		$parts = array(
				"letter" => substr($cell, 0, strpos($cell, $matches[0])),
				"number" => substr($cell, strpos($cell, $matches[0]))
			);
		$i = array_keys($this->cols, $parts["letter"]); 
		return array("c" => $i[0], "r" => $parts["number"], "l" => $parts["letter"]);
	}
	
	public function addTable($header, $body, $footer, $cell = "A1", $centered = false, $autoSize = false, $isUTF8 = false) {
		if (!isset($header) or !isset($body) or !isset($footer)) {
			throw new exception("Faltan parametros. <code>addTable($header, $body, $footer, <em>$cell</em>)</code>");
		} else {			
			$this->point = $this->expandCell($cell);
		}
			
		foreach($header as $k => $row) {
			foreach($row as $kc => $data) {
				$this->setCellByColumnAndRow($this->point["c"] + $kc, $this->point["r"] + $k, $data, $isUTF8);
				$cellHeader = ($this->cols[$this->point["c"] + $kc]) . ($this->point["r"] + $k);
				$this->setBold($cellHeader);
				$this->phpExcel->getActiveSheet()->getStyle($cellHeader)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			}
		}
		foreach($body as $k => $row){
			foreach($row as $kc => $data){
				$this->setCellByColumnAndRow($this->point["c"] + $kc, $this->point["r"] + $k + count($header), $data, $isUTF8);
				if($autoSize) {
					$this->setAutoSize($this->cols[$this->point["c"] + $kc]);
				}
				if($centered) {
					$cellBody = ($this->cols[$this->point["c"] + $kc]) . ($this->point["r"] + $k + count($header));
					$this->phpExcel->getActiveSheet()->getStyle($cellBody)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				}
			}
		}
		foreach($footer as $k => $row){
			foreach($row as $kc => $data){
				$this->setCellByColumnAndRow($this->point["c"] + $kc, $this->point["r"] + count($header) + count($body) + $k, $data, $isUTF8);
				$cellFooter = ($this->cols[$this->point["c"] + $kc]) . ($this->point["r"] + count($header) + count($body) + $k);
				$this->phpExcel->getActiveSheet()->getStyle($cellFooter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			}
		}
	}


	public function setColumnWidth($col = 'A', $size = 12) {
		$this->phpExcel->getActiveSheet()->getColumnDimension($col)->setWidth($size);
	}
	
	public function setCell($cell, $value, $isUTF8 = false) {
		$str = ($isUTF8) ? $value : utf8_encode($value);		
		$this->phpExcel->getActiveSheet()->setCellValue($cell, $str);
	}
	
	public function setCellByColumnAndRow($col, $row, $value, $isUTF8 = false) {
		$value = ($isUTF8) ? $value : utf8_encode($value);
		$this->phpExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
	}
	
	public function getCell($cell, $calculated = false) {
		if ($calculated) {
			$this->phpExcel->getActiveSheet()->getCell($cell)->getCalculatedValue();
		} else {
			$this->phpExcel->getActiveSheet()->getCell($cell)->getValue();
		}
	}
	
	public function mergeCells($cells, $center = false) {
		$this->phpExcel->getActiveSheet()->mergeCells($cells);
		if ($center) {
			$this->phpExcel->getActiveSheet()->getStyle($cells)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		}
	}
	
	public function setColor($cell, $color) {		
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getFont()->getColor()->setARGB($color);
	}
	
	public function setBold($cell, $active = true) {
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getFont()->setBold($active);
	}
	
	public function setCenter($cell) {
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	}

	public function setCenterCol($col){
		$col = $col . "1:" . $col;
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	}
	
	public function setLeft($cell) {
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
	}

	public function setLeftCol($col){
		$col = $col . "1:" . $col;
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	}
	
	public function setRight($cell) {
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
	}

	public function setRightCol($col){
		$col = $col . "1:" . $col;
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
	}
	
	public function setWrap($cell) {
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getAlignment()->setWrapText(true);
	}
	
	public function setBgColor($cell, $color, $type= PHPExcel_Style_Fill::FILL_SOLID) {
		$this->phpExcel->getActiveSheet()->getStyle($cell)->getFill()->setFillType($type)->getStartColor()->setARGB($color);
	}
	
	public function setFont($font){
		$this->phpExcel->getActiveSheet()->getDefaultStyle()->getFont()->setName($font);
	}

	public function setBorder($cells, $style) {
		$this->phpExcel->getActiveSheet()->getStyle($cells)->applyFromArray($style);
	}

	public function setAllBorders($cells, $color){ //Esta función poner bordes en las celdas
		$styleArray = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => $color),
				),
			),
		);

		$this->phpExcel->getActiveSheet()->getStyle(
		    $cells.
		   	$this->phpExcel->getActiveSheet()->getHighestRow()
		)->applyFromArray($styleArray);
	}

	public function setBottomBorder($cells) {
		$this->phpExcel->getActiveSheet()->getStyle($cells)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	}
	
	public function setAutoSize($cell) {
		$this->phpExcel->getActiveSheet()->getColumnDimension($cell)->setAutoSize(true);
	}

	public function setColumnWrap($col){ //Esta función ajusta el texto de las celdas de un columna en particular
		$col = $col . "1:" . $col;
		$this->phpExcel->getActiveSheet()->getStyle($col.$this->phpExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true); 
	}
	
	protected function formatSheet() {
		/*$this->phpExcel->getDefaultStyle()->getFont()->setName('Arial Narrow');
		$this->phpExcel->getDefaultStyle()->getFont()->setSize(10);
		$this->phpExcel->getActiveSheet()->getSheetView()->setZoomScale(73);
		$this->phpExcel->getActiveSheet()->getDefaultColumnDimension()->setWidth(15);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 5);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_LETTER);
		$this->phpExcel->getActiveSheet()->getPageSetup()->setScale(50);	*/
	}
	
	private function fixEncoding($str) {
	  $cur_encoding = mb_detect_encoding($str) ;
	  if($cur_encoding == "UTF-8" && mb_check_encoding($str,"UTF-8"))
		return $str;
	  else
		return utf8_encode($str);
	}
	
	public function download(){
		$this->formatSheet();		
		// Set properties
		$this->phpExcel->getProperties()->setTitle($this->properties["title"]);
		$this->phpExcel->getProperties()->setCreator($this->properties["creator"]);
		
		$objWriter = new PHPExcel_Writer_Excel2007($this->phpExcel);
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="'.$this->properties["title"].'"');
		header('Cache-Control: max-age:0');
		
		/*$objWriter = new PHPExcel_Writer_PDF($this->phpExcel);
		header('Content-type: application/pdf');
		header('Content-Disposition: attachment; filename="'.$this->properties["title"].'.pdf"');
		header('Cache-Control: max-age:0');*/
		
		$objWriter->save('php://output');
	}
	
	public function save($title = null){
		$this->formatSheet();				
		// Set properties
		$this->phpExcel->getProperties()->setTitle($this->properties["title"]);
		$this->phpExcel->getProperties()->setCreator($this->properties["creator"]);
		
		$objWriter = new PHPExcel_Writer_Excel2007($this->phpExcel);
		$objWriter->save($this->properties["title"].".xlsx");
	}
}
?>
