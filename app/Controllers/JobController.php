<?php
	namespace App\Controllers;

	class JobController {
		public function getAddJobAction(){
			// echo "Funcion Get Add Job Action";

			if (!empty($_POST)) {
				$job = new Job();

				$job->title = $_POST['title'];
				$job->description = $_POST['description'];
				$job->save();	
			}
			include '../Views/addJob.php';
		}
	} 

