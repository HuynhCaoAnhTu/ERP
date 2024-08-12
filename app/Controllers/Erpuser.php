<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ErpuserModel;

class Erpuser extends BaseController
{
	
    protected $erpuserModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->erpuserModel = new ErpuserModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'erpuser',
                'title'     		=> 'ERP USER MANAGER'				
			];
		
		return view('erpuser', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->erpuserModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_auth .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_auth .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id_auth,
$value->name,
$value->email,
$value->tel,
$value->id_link,
$value->creat_at,
$value->updated_at,
$value->uactive,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id_auth');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->erpuserModel->where('id_auth' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id_auth'] = $this->request->getPost('id_auth');
$fields['uuid_auth'] = $this->request->getPost('uuid_auth');
$fields['name'] = $this->request->getPost('name');
$fields['email'] = $this->request->getPost('email');
$fields['tel'] = $this->request->getPost('tel');
$fields['password'] = $this->request->getPost('password');
$fields['id_link'] = $this->request->getPost('id_link');
$fields['creat_at'] = $this->request->getPost('creat_at');
$fields['updated_at'] = $this->request->getPost('updated_at');
$fields['uactive'] = $this->request->getPost('uactive');


        $this->validation->setRules([
			            'uuid_auth' => ['label' => 'Uuid auth', 'rules' => 'required|min_length[0]|max_length[36]|is_unique[erp_auth.uuid_auth,id_auth,{id_auth}]'],
            'name' => ['label' => 'Name', 'rules' => 'required|min_length[0]|max_length[100]'],
            'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[100]|is_unique[erp_auth.email,id_auth,{id_auth}]'],
            'tel' => ['label' => 'Tel', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[100]'],
            'id_link' => ['label' => 'Id link', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'creat_at' => ['label' => 'Creat at', 'rules' => 'required|valid_date|min_length[0]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'required|valid_date|min_length[0]'],
            'uactive' => ['label' => 'Uactive', 'rules' => 'required|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->erpuserModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id_auth'] = $this->request->getPost('id_auth');
$fields['uuid_auth'] = $this->request->getPost('uuid_auth');
$fields['name'] = $this->request->getPost('name');
$fields['email'] = $this->request->getPost('email');
$fields['tel'] = $this->request->getPost('tel');
$fields['password'] = $this->request->getPost('password');
$fields['id_link'] = $this->request->getPost('id_link');
$fields['creat_at'] = $this->request->getPost('creat_at');
$fields['updated_at'] = $this->request->getPost('updated_at');
$fields['uactive'] = $this->request->getPost('uactive');


        $this->validation->setRules([
			            'uuid_auth' => ['label' => 'Uuid auth', 'rules' => 'required|min_length[0]|max_length[36]|is_unique[erp_auth.uuid_auth,id_auth,{id_auth}]'],
            'name' => ['label' => 'Name', 'rules' => 'required|min_length[0]|max_length[100]'],
            'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[100]|is_unique[erp_auth.email,id_auth,{id_auth}]'],
            'tel' => ['label' => 'Tel', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[100]'],
            'id_link' => ['label' => 'Id link', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'creat_at' => ['label' => 'Creat at', 'rules' => 'required|valid_date|min_length[0]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'required|valid_date|min_length[0]'],
            'uactive' => ['label' => 'Uactive', 'rules' => 'required|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->erpuserModel->update($fields['id_auth'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id_auth');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->erpuserModel->where('id_auth', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
