<?php
	namespace App\Controllers;
	
	use App\Models\User;
	use Respect\Validation\Validator as v;


	class UserController extends BaseController {
		public function postAddUserAction($request){
			$responseMessage = null;
			
			if ($request->getMethod() == 'POST') {

				$postData = $request->getParsedBody();

				$jobValidator = v::key('user', v::stringType()->notEmpty())->key('password', v::stringType()->notEmpty())->key('email', v::stringType()->notEmpty());

	            try {
	                $jobValidator->assert($postData);
	                $postData = $request->getParsedBody();

	                $user = new User();

	                $user->user = $postData['user'];
	                $user->password =password_hash($postData['password'], PASSWORD_DEFAULT);
	                $user->email = $postData['email'];

	                $user->save();

	                $responseMessage = 'Saved';
	            } catch (\Exception $e) {
	                $responseMessage = $e->getMessage();
	            }
			}

			return $this->renderHTML('addUser.twig', [
            	'responseMessage' => $responseMessage
        	]);
		}

		public function getAddUserAction($request){
			$responseMessage = null;
			
			return $this->renderHTML('addUser.twig', [
            	'responseMessage' => $responseMessage
        	]);
		}
	} 

