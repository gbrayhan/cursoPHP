<?php 
namespace App\Controllers;
	
	use App\Models\User;
	use Zend\Diactoros\Response\RedirectResponse;


	class AuthController extends BaseController {

		public function getLogin($request){
			$responseMessage = null;
			
			return $this->renderHTML('login.twig', [
            	'responseMessage' => $responseMessage
        	]);
		}

		public function postLogin($request){
			$responseMessage = null;
			
            $postData = $request->getParsedBody();

            $user = User::where('user',$postData['user'])->first();

            if ($user) {
       			if (\password_verify($postData['password'], $user->password)) {
       				// echo "Todo Correcto";
       				$_SESSION['userId'] = $user->id;
       				return new RedirectResponse('/admin');
     
       			} else{
       				$responseMessage = "Password Invaido";
            			return $this->renderHTML('login.twig', [
        					'responseMessage' => $responseMessage
       					]);
       			}
            } else{
            	$responseMessage = "Usuario no encontrado";
            	return $this->renderHTML('login.twig', [
        			'responseMessage' => $responseMessage
       			]);
            }

		}
		public function getLogout($request){

			unset($_SESSION['userId']);
       		return new RedirectResponse('/login');
		}

		
	} 




 ?>