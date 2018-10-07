<?php 
	
	namespace App\Controllers;

	use App\Models\{Job, Project};

	class IndexController {
		public function indexAction() {
			// echo "Accion del controller";

			$name = 'Alex Guerrero';
			$limitMonts = 100;

			$jobs = Job::all();
			$projects = Project::all();

			include '../Views/index.php';
		}
	}