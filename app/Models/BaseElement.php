<?php 

namespace App\Models;

// require_once 'Printable.php';

class BaseElement implements Printable {
    // function __construct(argument) {
    // }
    // private $title;
    protected $title; //Permitir a hijos acceder a las propiedades/Metodos 
    public $description;
    public $visible = true;
    public $monts;

    public function __construct($title, $description){
      $this->setTitle($title);
      $this->description = $description;
    }


    public function setTitle($title) {
      $this->title = ($title == '') ? 'N/A' : $title;
    }

    public function getTitle() {
      return $this->title;
    }

    public function getDurationAsString() {

	    $years= floor($this->monts / 12);
	    $extraMonts = $this->monts % 12;

	    if (($years == 0) && ($this->monts == 1)) {
	      return "$this->monts mes"; 
	    } else if (($years == 0) && ($this->monts > 1)) {
	      return "$this->monts meses"; 
	    } else if (($years == 1) && ($extraMonts == 0)) {
	      return "$years año";
	    } else if (($years == 1) && ($extraMonts == 1)) {
	      return "$years año $extraMonts mes";
	    } else if (($years == 1) && ($extraMonts > 1)) {
	      return "$years año $extraMonts meses";
	    } else if (($years > 1) && ($extraMonts == 0)) {
	      return "$years años";
	    } else if (($years > 1) && ($extraMonts == 1)) {
	      return "$years años $extraMonts mes";
	    } else if (($years > 1) && ($extraMonts > 1)) {
	      return "$years años $extraMonts meses";
	    }
  	}

  	public function getDescription(){
		return $this->description;
	}	

}



?>