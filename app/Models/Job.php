<?php
	
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;

	class Job extends Model {
		protected $table = 'jobs';

		public function getDurationAsString() {

		    $years= floor($this->months / 12);
		    $extraMonts = $this->months % 12;

		    if (($years == 0) && ($this->months == 1)) {
		      return "Job Duration: $this->months month"; 
		    } else if (($years == 0) && ($this->months > 1)) {
		      return "Job Duration: $this->months months"; 
		    } else if (($years == 1) && ($extraMonts == 0)) {
		      return "Job Duration: $years year";
		    } else if (($years == 1) && ($extraMonts == 1)) {
		      return "Job Duration: $years year $extraMonts month";
		    } else if (($years == 1) && ($extraMonts > 1)) {
		      return "Job Duration: $years year $extraMonts months";
		    } else if (($years > 1) && ($extraMonts == 0)) {
		      return "Job Duration: $years years";
		    } else if (($years > 1) && ($extraMonts == 1)) {
		      return "Job Duration: $years years $extraMonts month";
		    } else if (($years > 1) && ($extraMonts > 1)) {
		      return "Job Duration: $years years $extraMonts months";
		    }
  		}	
	}

?>