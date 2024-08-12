<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ObjModel;
use App\Models\ObjgroupModel;
use App\Models\Category\LocationModel;

class CRMController extends BaseController
{
	
    protected $objdbModel;
    protected $validation;
	protected $ogroup; // Nhóm mặc định SCM
	//protected $supplier; // "KS", "NH", "LT", "VC", "HD"
	
	public function __construct()
	{
	    $this->objdbModel = new ObjModel();
       	$this->validation =  \Config\Services::validation();
		$this->ogroup = 'CRM';
		
	}
	
	public function index()
	{
		//$this->validation->check($sup, 'required|max_length[2]');
		//$this->objgroupModel = new ObjgroupModel();
		//$supname = $this->objgroupModel->getSCM($sup);;//load from DB
		//strtolower(); strtoupper();
		//$sgroup = array("KS", "NH", "LT", "VC", "HD"); //load from DB
			$session = session(); // Lấy session -> Xác lập User -> Menu
			$data = [
					'sitetitle'	=> 'ERP Travel',
					'pagetitle'	=> 'CRM - My customers',
					'pagetitle_mobile'	=> 'CRM',
					'controller'	=> 'customers',
					'title'     	=> 'CRM manager',
					'ogroup'	=> $this->ogroup,
//					'ostyle' => $supname['id'],
//					'ostylename' => $supname['gname'],
//					'ostylecode' => $sup
				];
			return view('object/CRM_list', $data);
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	
		$db = db_connect();
		$result = $db->query('SELECT obj_id, ocode, oname, concat_ws(", ",a.location, b.location) as location, tel, email, concat_ws(":",company, tax)as company, (SELECT erp_auth.email FROM erp_auth WHERE o.id_creat = erp_auth.id_auth limit 1) as owner, (SELECT erp_auth.email FROM erp_auth WHERE o.id_update = erp_auth.id_auth limit 1) as sale, o.updated_at FROM obj_db AS o LEFT JOIN location AS a ON o.location_id = a.id_location LEFT JOIN location AS b ON a.id_master = b.id_location WHERE ogroup="CRM" ORDER BY o.updated_at DESC');
		//$result = $this->objdbModel->getAll("KS");
		//$result = $this->objdbModel->select()->findAll();
		foreach ($result->getResult() as $key => $value) {
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="save('. $value->obj_id .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove('. $value->obj_id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->ocode,
				$value->oname,
				$value->location,
				$value->tel,
				$value->email,
				$value->company,
				$value->owner,
				$value->sale,
				$value->updated_at,
				$ops				
			);
		} 
		//Get location
		$this->locationModel = new LocationModel();
		$data['location'] = $this->locationModel->getAllLocation();//load from DB
		$this->objgroupModel = new ObjgroupModel();
		$data['ofilter'] = $this->objgroupModel->getCRMFilter();//load from DB
		//$data['csrf_token'] = csrf_hash();
		return $this->response->setJSON($data);	
		
	}
	
	public function getOne()
	{
		$id = $this->request->getPost('obj_id');
		$data['csrf_token'] = csrf_hash();	
		if ($this->validation->check($id, 'required|numeric')) {
			$data['data'] = $this->objdbModel->where('obj_id' ,$id)->first();
			return $this->response->setJSON($data);	
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
	}	

	public function add()
	{
        $response = array();
		$session = session();
		
		$fields['ogroup'] = $this->request->getPost('ogroup');
		$fields['ostyle'] = $this->request->getPost('ostyle');
		$fields['ocode'] = $this->request->getPost('ocode');
		if($fields['ocode']==""){
			$sup = $this->request->getPost('ostylecode');
			$this->objgroupModel = new ObjgroupModel();
			$autoid = $this->objgroupModel->getSCMautoid($sup);;//load from DB
				$fields['ocode']=$sup.''.sprintf("%'.06d\n",$autoid);
			}
		$fields['oname'] = $this->request->getPost('oname');
		$fields['location_id'] = $this->request->getPost('location_id');
		$fields['contact'] = $this->request->getPost('contact');
		$fields['tel'] = $this->request->getPost('tel');
		$fields['email'] = $this->request->getPost('email');
		$fields['bday'] = $this->request->getPost('bday');
		$fields['company'] = $this->request->getPost('company');
		$fields['tax'] = $this->request->getPost('tax');
		$fields['addr'] = $this->request->getPost('addr');
		$fields['accno'] = $this->request->getPost('accno');
		$fields['bank'] = $this->request->getPost('bank');
		$fields['swift'] = $this->request->getPost('swift');
		$fields['level'] = $this->request->getPost('level');
		$fields['chanel'] = $this->request->getPost('chanel');
		//$fields['ofilter'] = implode(",",$this->request->getPost('ofilter')); 
		$fields['ofilter'] = json_encode($this->request->getPost('ofilter')); 
		$fields['notes'] = $this->request->getPost('notes');
		
		$fields['id_creat'] = $session->id;
		$fields['id_update'] = $session->id;


        $this->validation->setRules([
			'ogroup' => ['label' => 'Ogroup', 'rules' => 'permit_empty|min_length[0]|max_length[3]'],
            'ostyle' => ['label' => 'Ostyle', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'ocode' => ['label' => 'Ocode', 'rules' => 'required|min_length[3]|max_length[10]|is_unique[obj_db.ocode,obj_id,{obj_id}]'],
            'oname' => ['label' => 'Oname', 'rules' => 'required|min_length[3]|max_length[150]'],
            'location_id' => ['label' => 'Location id', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'contact' => ['label' => 'Contact', 'rules' => 'required|min_length[0]|max_length[100]'],
            'tel' => ['label' => 'Tel', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[50]'],
            'bday' => ['label' => 'Bday', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'company' => ['label' => 'Company', 'rules' => 'permit_empty|min_length[0]|max_length[150]'],
            'tax' => ['label' => 'Tax', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],
            'addr' => ['label' => 'Addr', 'rules' => 'permit_empty|min_length[0]|max_length[150]'],
            'accno' => ['label' => 'Accno', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],
            'bank' => ['label' => 'Bank', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'swift' => ['label' => 'Swift', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],
            'level' => ['label' => 'Level', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'chanel' => ['label' => 'Chanel', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'ofilter' => ['label' => 'Ofilter', 'rules' => 'permit_empty|min_length[0]|max_length[150]'],
            'notes' => ['label' => 'Notes', 'rules' => 'permit_empty|min_length[0]'],
            'id_creat' => ['label' => 'Id creat', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'id_update' => ['label' => 'Id update', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {
			

            if ($this->objdbModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		$response['csrf_token'] = csrf_hash();	
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['obj_id'] = $this->request->getPost('obj_id');
$fields['ogroup'] = $this->request->getPost('ogroup');
$fields['ostyle'] = $this->request->getPost('ostyle');
$fields['ocode'] = $this->request->getPost('ocode');
$fields['oname'] = $this->request->getPost('oname');
$fields['location_id'] = $this->request->getPost('location_id');
$fields['contact'] = $this->request->getPost('contact');
$fields['tel'] = $this->request->getPost('tel');
$fields['email'] = $this->request->getPost('email');
$fields['bday'] = $this->request->getPost('bday');
$fields['company'] = $this->request->getPost('company');
$fields['tax'] = $this->request->getPost('tax');
$fields['addr'] = $this->request->getPost('addr');
$fields['accno'] = $this->request->getPost('accno');
$fields['bank'] = $this->request->getPost('bank');
$fields['swift'] = $this->request->getPost('swift');
$fields['level'] = $this->request->getPost('level');
$fields['chanel'] = $this->request->getPost('chanel');
//$fields['ofilter'] = $this->request->getPost('ofilter');
$fields['ofilter'] = json_encode($this->request->getPost('ofilter')); 
$fields['notes'] = $this->request->getPost('notes');
$fields['id_creat'] = $this->request->getPost('id_creat');
$fields['id_update'] = $this->request->getPost('id_update');
$fields['created_at'] = $this->request->getPost('created_at');
$fields['updated_at'] = $this->request->getPost('updated_at');
$fields['oactive'] = $this->request->getPost('oactive');


        $this->validation->setRules([
			            'ogroup' => ['label' => 'Ogroup', 'rules' => 'permit_empty|min_length[0]|max_length[3]'],
            'ostyle' => ['label' => 'Ostyle', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'ocode' => ['label' => 'Ocode', 'rules' => 'required|min_length[3]|max_length[10]|is_unique[obj_db.ocode,obj_id,{obj_id}]'],
            'oname' => ['label' => 'Oname', 'rules' => 'required|min_length[3]|max_length[150]'],
            'location_id' => ['label' => 'Location id', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'contact' => ['label' => 'Contact', 'rules' => 'required|min_length[0]|max_length[100]'],
            'tel' => ['label' => 'Tel', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[50]'],
            'bday' => ['label' => 'Bday', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'company' => ['label' => 'Company', 'rules' => 'permit_empty|min_length[0]|max_length[150]'],
            'tax' => ['label' => 'Tax', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],
            'addr' => ['label' => 'Addr', 'rules' => 'permit_empty|min_length[0]|max_length[150]'],
            'accno' => ['label' => 'Accno', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],
            'bank' => ['label' => 'Bank', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'swift' => ['label' => 'Swift', 'rules' => 'permit_empty|min_length[0]|max_length[20]'],
            'level' => ['label' => 'Level', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'chanel' => ['label' => 'Chanel', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'ofilter' => ['label' => 'Ofilter', 'rules' => 'permit_empty|min_length[0]|max_length[150]'],
            'notes' => ['label' => 'Notes', 'rules' => 'permit_empty|min_length[0]'],
            'id_creat' => ['label' => 'Id creat', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'id_update' => ['label' => 'Id update', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'oactive' => ['label' => 'Oactive', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->objdbModel->update($fields['obj_id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		$response['csrf_token'] = csrf_hash();	
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		$id = $this->request->getPost('obj_id');
		if (!$this->validation->check($id, 'required|numeric')) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {	
			if ($this->objdbModel->where('obj_id', $id)->delete()) {			
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
			} else {
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}	
		$response['csrf_token'] = csrf_hash();	
        return $this->response->setJSON($response);		
	}	
		
}	

