<?php
 /* ===========================

  FlavorPHP - because php should have a better taste
  homepage: http://www.flavorphp.com/
  git repository: https://github.com/Axloters/FlavorPHP

  FlavorPHP is a free software licensed under the MIT license
  Copyright (C) 2008 by Pedro Santana <contacto at pedrosantana dot mx>
  
  Team:
  	Pedro Santana
	Victor Bracco
	Victor de la Rocha
	Jorge Condom�
	Aaron Munguia

  =========================== */
?>
<?php

/**
  * Ported from Victor de la Rocha's class: http://mis-algoritmos.com/digg-style-pagination-class/
  */

class pagination extends singleton {
	
	protected $registry;
	protected $path;
	protected $l10n;
	
    private $total_rows;
    private $limit;
    public $page;
    public $targetpage;
	
	public function __construct() {
		$this->registry = registry::getInstance();
		$this->path = $this->registry["path"];
		$this->l10n = l10n::getInstance();
	}
	
	public static function getInstance($class = NULL) {
		return parent::getInstance(get_class());
	}
	
    function init($tr, $page, $limit, $targetpage) {
		$this->total_rows   = (int) $tr;
		$this->page         = (int) $page;
		$this->limit        = (int) $limit;
		$this->targetpage   = (string) $targetpage;

        return $this->getPagination();          
    }


	private function getPagination($adjacents = 1) {
		$prev = $this->page - 1;
		$next = $this->page + 1;
		$lastpage = ceil($this->total_rows / $this->limit);
		$lpm1 = $lastpage - 1;	   
		$pagination = "";		   
		if ($lastpage > 1) {   
			$pagination .= "<div class=\"pagination\">";
				   
			//previous button
			if ($this->page > 1) {
				$pagination .= "<a href=\"". $this->targetpage. $prev ."\">".$this->l10n->__("Anterior")."</a>";
			} else {
				$pagination .= "<span class=\"disabled\">".$this->l10n->__("Anterior")."</span>";
			}
		   
			//pages   
			if ( $lastpage < 7 + ($adjacents * 2)) {
				for ($counter = 1; $counter <= $lastpage; $counter++) {
					if ($counter == $this->page) {
						$pagination .= '<span class="current">'.$counter.'</span>';
					} else {
				    	$pagination .= '<a href="'.$this->targetpage . $counter . '">'.$counter.'</a>';
					}
				}
			} elseif ($lastpage >= 7 + ($adjacents * 2)) {
				if ($this->page < 1 + ($adjacents * 3)) {
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
						if ($counter == $this->page) {
							$pagination .= '<span class="current">'.$counter.'</span>';
						} else {
							$pagination .= '<a href="'.$this->targetpage . $counter.'">'.$counter.'</a>';
						}
					}
					$pagination .= "...";
					$pagination .= '<a href="'.$this->targetpage . $lpm1 .'">'.$lpm1.'</a>';
					$pagination .= '<a href="'.$this->targetpage. $lastpage.'">'.$lastpage.'</a>';       
				} elseif ($lastpage - ($adjacents * 2) > $this->page && $this->page > ($adjacents * 2)) {
					$pagination .= '<a href="'.$this->targetpage.'1/">1</a>';
					$pagination .= '<a href="'.$this->targetpage.'2/">2</a>';
					$pagination .= '...';
					for ($counter = $this->page - $adjacents; $counter <= $this->page + $adjacents; $counter++) {
						if ($counter == $this->page) {
							$pagination .= '<span class="current">'.$counter.'</span>';
						} else {
							$pagination .= '<a href="'.$this->targetpage.$counter.'">'.$counter.'</a>';
						}
					}
					$pagination .= '...';
					$pagination .= '<a href="'.$this->targetpage.$lpm1.'">'.$lpm1.'</a>';
					$pagination .= '<a href="'.$this->targetpage.$lastpage.'">'.$lastpage.'</a>';
				} else {
					$pagination .= '<a href="'.$this->targetpage.'1/">1</a>';
					$pagination .= '<a href="'.$this->targetpage.'2/">2</a>';
					$pagination .= '...';
					for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++) {
						if ($counter == $this->page) {
							$pagination .= '<span class="current">'.$counter.'</span>';
						} else {
							$pagination .= '<a href="'.$this->targetpage.$counter.'">'.$counter.'</a>';
						}
					}
				}
			}
		   
			//next button
			if ( $this->page < $counter - 1 ) {
				$pagination .= "<a href=\"".$this->targetpage . $next."\">".$this->l10n->__("Siguiente")."</a>";
			} else {
				$pagination .= "<span class=\"disabled\">".$this->l10n->__("Siguiente")."</span>";
			}
		   
			$pagination .= '</div>';
		}
		return $pagination;
	}
	
	
}
?>