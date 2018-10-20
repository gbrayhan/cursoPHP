<?php 
	
	namespace App\Controllers;


	use App\Models\{Job, Project, User};

	class AdminController extends BaseController {
		private function findById($id){
			return User::where('id',$id)->first();	
    	}

		public function getIndex() {

			$user = $this->findById($_SESSION['userId']);
			
			return  $this->renderHTML('admin.twig', [
				'user' => $user
			]);
		}

		public function getUserData($request){

			$data = (int) $request->getAttribute('id');
			// var_dump($data);
			// die();
			$user = $this->findById($data);

			return  $this->renderHTML('muestraUsuario.twig', [
				'user' => $user
			]);
			

		}
	}