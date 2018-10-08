<?php
	namespace App\Controllers;
	use App\Models\Job;



	class JobController {
		public function getAddJobAction($request){
			// echo "Funcion Get Add Job Action";
			var_dump($request->getBody());
			var_dump($request->getParsedBody());

			if ($request->getMethod() == 'POST') {

				$postData = $request->getParsedBody();

				$job = new Job();
				$job->title = $postData['title'];
				$job->description = $postData['description'];
				$job->save();	
			}
			include '../Views/addJob.php';
		}
	} 

