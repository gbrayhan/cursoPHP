<?php 
	
	namespace App\Controllers;

	use App\Models\{Job, Project};

	class IndexController extends BaseController {
		public function indexAction() {
			// echo "Accion del controller";

			$name = 'Alex Guerrero';
			$limitMonts = 100;

			$jobs = Job::all();
			$projects = Project::all();

			return  $this->renderHTML('index.twig', [
				'name' => $name,
				'jobs' => $jobs,
				'projects' => $projects
			]);
		}
	}