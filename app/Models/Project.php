<?php 
namespace App\Models;

// require_once 'BaseElement.php';
use Illuminate\Database\Eloquent\Model;


class Project extends Model {
	protected $table = 'projects';

	public function getDurationAsString() {

	    $years= floor($this->monts / 12);
	    $extraMonts = $this->monts % 12;

	    if (($years == 0) && ($this->monts == 1)) {
	      return "Project Duration: $this->monts mont"; 
	    } else if (($years == 0) && ($this->monts > 1)) {
	      return "Project Duration: $this->monts monts"; 
	    } else if (($years == 1) && ($extraMonts == 0)) {
	      return "Project Duration: $years year";
	    } else if (($years == 1) && ($extraMonts == 1)) {
	      return "Project Duration: $years year $extraMonts mont";
	    } else if (($years == 1) && ($extraMonts > 1)) {
	      return "Project Duration: $years year $extraMonts monts";
	    } else if (($years > 1) && ($extraMonts == 0)) {
	      return "Project Duration: $years years";
	    } else if (($years > 1) && ($extraMonts == 1)) {
	      return "Project Duration: $years years $extraMonts mont";
	    } else if (($years > 1) && ($extraMonts > 1)) {
	      return "Project Duration: $years years $extraMonts monts";
	    }
	}
}

?>