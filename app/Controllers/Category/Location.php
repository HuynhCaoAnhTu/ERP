<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers\Category;

use App\Controllers\BaseController;

use App\Models\Category\LocationModel;

class Location extends BaseController
{
	
    protected $locationModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->locationModel = new LocationModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{
		$session = session(); // Lấy session -> Xác lập User -> Menu
	    $data = [
				'sitetitle'	=> "ERP Travel - vietnamsic.com",
				'pagetitle'	=> "Category / Location",
				'pagetitle_mobile'	=> "Location",
                'controller'	=> 'category/location',
                'title'     	=> 'location'				
			];
		
		return view('category/location', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();
		$result = $this->locationModel->getAll();
		foreach ($result as $key => $value) {		
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id_location .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id_location .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id_location,
				$value->location,
				$value->country,
				$ops				
			);
			
		} 
		$data['country'] = $this->locationModel->getAllCountry();
		$data['csrf_token'] = csrf_hash();
		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		$response['csrf_token'] = csrf_hash();
		
		$id = $this->request->getPost('id_location');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$response['data'] = $this->locationModel->where('id_location' ,$id)->first();
			
			return $this->response->setJSON($response);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();
		$response['csrf_token'] = csrf_hash();

		$fields['id_location'] = $this->request->getPost('id_location');
$fields['location'] = $this->request->getPost('location');
$fields['id_master'] = $this->request->getPost('id_master');


        $this->validation->setRules([
			            'location' => ['label' => 'Location', 'rules' => 'required|min_length[0]|max_length[100]|is_unique[location.location,id_location,{id_location}]'],
            'id_master' => ['label' => 'Id master', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->locationModel->insert($fields)) {
												
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
		$response['csrf_token'] = csrf_hash();
		
		$fields['id_location'] = $this->request->getPost('id_location');
$fields['location'] = $this->request->getPost('location');
$fields['id_master'] = $this->request->getPost('id_master');


        $this->validation->setRules([
			            'location' => ['label' => 'Location', 'rules' => 'required|min_length[0]|max_length[100]|is_unique[location.location,id_location,{id_location}]'],
            'id_master' => ['label' => 'Id master', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->locationModel->update($fields['id_location'], $fields)) {
				
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
		$response['csrf_token'] = csrf_hash();
		
		$id = $this->request->getPost('id_location');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->locationModel->where('id_location', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		public function getAllLocation()
	{
 		$response = $data['data'] = array();	

		$data = $this->locationModel->getLList();
		
		return $this->response->setJSON($data);		
		//return view('location', $data);
	}
}	
