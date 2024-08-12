<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ObjgroupModel;

class Objgroup extends BaseController
{
	
    protected $objgroupModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->objgroupModel = new ObjgroupModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'objgroup',
                'title'     		=> 'obj_group'				
			];
		
		return view('objgroup', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->objgroupModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->id .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id,
$value->gcode,
$value->gname,
$value->ogroup,
$value->masterid,
$value->lastid,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->objgroupModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['gcode'] = $this->request->getPost('gcode');
$fields['gname'] = $this->request->getPost('gname');
$fields['ogroup'] = $this->request->getPost('ogroup');
$fields['masterid'] = $this->request->getPost('masterid');
$fields['lastid'] = $this->request->getPost('lastid');


        $this->validation->setRules([
			            'gcode' => ['label' => 'Gcode', 'rules' => 'required|min_length[0]|max_length[2]'],
            'gname' => ['label' => 'Gname', 'rules' => 'required|min_length[0]|max_length[50]'],
            'ogroup' => ['label' => 'Ogroup', 'rules' => 'required|min_length[0]|max_length[3]'],
            'masterid' => ['label' => 'Masterid', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'lastid' => ['label' => 'Lastid', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->objgroupModel->insert($fields)) {
												
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
		
		$fields['id'] = $this->request->getPost('id');
$fields['gcode'] = $this->request->getPost('gcode');
$fields['gname'] = $this->request->getPost('gname');
$fields['ogroup'] = $this->request->getPost('ogroup');
$fields['masterid'] = $this->request->getPost('masterid');
$fields['lastid'] = $this->request->getPost('lastid');


        $this->validation->setRules([
			            'gcode' => ['label' => 'Gcode', 'rules' => 'required|min_length[0]|max_length[2]'],
            'gname' => ['label' => 'Gname', 'rules' => 'required|min_length[0]|max_length[50]'],
            'ogroup' => ['label' => 'Ogroup', 'rules' => 'required|min_length[0]|max_length[3]'],
            'masterid' => ['label' => 'Masterid', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'lastid' => ['label' => 'Lastid', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->objgroupModel->update($fields['id'], $fields)) {
				
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
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->objgroupModel->where('id', $id)->delete()) {
								
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
