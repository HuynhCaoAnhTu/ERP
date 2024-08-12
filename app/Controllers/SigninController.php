<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AuthModel;
  
class SigninController extends Controller
{
    public function index()
    {
        helper(['form']);
		//$data["hash"] = password_hash("0905101199", PASSWORD_DEFAULT);
		//echo $data["hash"];
        echo view('erp_signin');
    } 
  
    public function loginAuth()
    {
        
		$session = session();
        $authModel = new AuthModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
		$loginTO = $this->request->getVar('loginTO');
		$rememberME = $this->request->getVar('rememberME');
		$ostyle = 0;
		switch ($loginTO) {
		  case "ERP":
			$ostyle = 9;
			break;
		  case "SCM": //Supply Chain Management
			$ostyle = 4;
			break;
		  case "B2B":
			$ostyle = 2;
			break;
		  case "CRM":
			$ostyle = 1;
			break;
		  default:
		  $ostyle = 0;
		}
		if($ostyle == 0){
			$session->setFlashdata('msg', $loginTO);
			return redirect()->to('/signin');
		}
        $authkey = ['email' => $email, 'uactive' => $ostyle];
        $data = $authModel->where($authkey)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
				// GET LEVEL and add level session
				//
				$user_img = base_url('asset/img/user.jpg');
				if(file_exists('asset/img/'.$data['id_auth'].'.jpg')){
					$user_img = base_url('asset/img/'.$data['id_auth'].'.jpg'); 
				}
                $ses_data = [
                    'id' => $data['id_auth'],
					'uuid' => $data['uuid_auth'],
                    'name' => $data['name'],
                    'email' => $data['email'],
					'id_link' => $data['id_link'],
					'ostyle' => $data['uactive'],
					'img' => $user_img,
					//'lang' => $data['lang'],
					'lang' => 'vi',//
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
				
                return redirect()->to('/home');
            
            }else{
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to('/signin');
            }
        }else{
            $session->setFlashdata('msg', 'Your account does not exist.');
            return redirect()->to('/signin');
        }
    }
	public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/signin');
    }
}