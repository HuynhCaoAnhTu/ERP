<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers\Product;

use App\Controllers\BaseController;

use App\Models\ProductModel;
//use App\Models\OnsaleModel;
//use App\Models\OnpriceModel;

class ProductController extends BaseController
{
	
    protected $ProductModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->ProductModel = new ProductModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{
			    $data = [
				'sitetitle'	=> 'ERP Travel',
				'pagetitle'	=> 'ERP/Products',
				'pagetitle_mobile'	=> 'Products',
				'controller'	=> 'product',
                'title'     		=> 'Products'				
			];
		//return "aaaaaaaaaaaaaaa";
		return view('product/erpproduct', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		//$result = $this->ProductModel->select()->findAll();
		//$result = $this->locationModel->getAll();
		$result = $this->ProductModel->getAll();
		
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
				$value->product_code,
				$value->product_name,
				$value->product_duration,
				$value->categories_name,
				$value->travel_from,
				$value->travel_to,
				$value->product_status,
				$value->update_on,
				$value->owner,
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
			
			$data = $this->ProductModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['product_code'] = $this->request->getPost('product_code');
$fields['product_name'] = $this->request->getPost('product_name');
$fields['product_categories'] = $this->request->getPost('product_categories');
$fields['product_location'] = $this->request->getPost('product_location');
$fields['product_style'] = $this->request->getPost('product_style');
$fields['product_time'] = $this->request->getPost('product_time');
$fields['product_intro'] = $this->request->getPost('product_intro');
$fields['product_desc'] = $this->request->getPost('product_desc');
$fields['product_rules'] = $this->request->getPost('product_rules');
$fields['product_files'] = $this->request->getPost('product_files');
$fields['product_lang'] = $this->request->getPost('product_lang');
$fields['id_master'] = $this->request->getPost('id_master');
$fields['product_guide_lang'] = $this->request->getPost('product_guide_lang');
$fields['product_filter'] = $this->request->getPost('product_filter');
$fields['product_priority'] = $this->request->getPost('product_priority');
$fields['product_slugs'] = $this->request->getPost('product_slugs');
$fields['product_keywords'] = $this->request->getPost('product_keywords');
$fields['product_seo'] = $this->request->getPost('product_seo');
$fields['product_status'] = $this->request->getPost('product_status');
$fields['update_on'] = $this->request->getPost('update_on');


        $this->validation->setRules([
			            'product_code' => ['label' => 'Product code', 'rules' => 'required|min_length[1]|max_length[50]'],
            'product_name' => ['label' => 'Product name', 'rules' => 'required|min_length[1]|max_length[250]'],
            'product_categories' => ['label' => 'Product categories', 'rules' => 'required|min_length[0]|max_length[50]'],
            'product_location' => ['label' => 'Product location', 'rules' => 'required|min_length[0]|max_length[50]'],
            'product_style' => ['label' => 'Product style', 'rules' => 'required|min_length[0]|max_length[50]'],
            'product_time' => ['label' => 'Product time', 'rules' => 'required|min_length[0]|max_length[11]'],
            'product_intro' => ['label' => 'Product intro', 'rules' => 'required|min_length[0]'],
            'product_desc' => ['label' => 'Product desc', 'rules' => 'required|min_length[0]'],
            'product_rules' => ['label' => 'Product rules', 'rules' => 'required|min_length[0]'],
            'product_files' => ['label' => 'Product files', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'product_lang' => ['label' => 'Product lang', 'rules' => 'required|min_length[2]|max_length[2]'],
            'id_master' => ['label' => 'Id master', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'product_guide_lang' => ['label' => 'Product guide lang', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'product_filter' => ['label' => 'Product filter', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'product_priority' => ['label' => 'Product priority', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'product_slugs' => ['label' => 'Product slugs', 'rules' => 'required|min_length[1]|max_length[100]'],
            'product_keywords' => ['label' => 'Product keywords', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'product_seo' => ['label' => 'Product seo', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
            'product_status' => ['label' => 'Product status', 'rules' => 'required|min_length[0]|max_length[11]'],
            'update_on' => ['label' => 'Update on', 'rules' => 'permit_empty|valid_date|min_length[0]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->ProductModel->insert($fields)) {
												
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
$fields['product_code'] = $this->request->getPost('product_code');
$fields['product_name'] = $this->request->getPost('product_name');
$fields['product_categories'] = $this->request->getPost('product_categories');
$fields['product_location'] = $this->request->getPost('product_location');
$fields['product_style'] = $this->request->getPost('product_style');
$fields['product_time'] = $this->request->getPost('product_time');
$fields['product_intro'] = $this->request->getPost('product_intro');
$fields['product_desc'] = $this->request->getPost('product_desc');
$fields['product_rules'] = $this->request->getPost('product_rules');
$fields['product_files'] = $this->request->getPost('product_files');
$fields['product_lang'] = $this->request->getPost('product_lang');
$fields['id_master'] = $this->request->getPost('id_master');
$fields['product_guide_lang'] = $this->request->getPost('product_guide_lang');
$fields['product_filter'] = $this->request->getPost('product_filter');
$fields['product_priority'] = $this->request->getPost('product_priority');
$fields['product_slugs'] = $this->request->getPost('product_slugs');
$fields['product_keywords'] = $this->request->getPost('product_keywords');
$fields['product_seo'] = $this->request->getPost('product_seo');
$fields['product_status'] = $this->request->getPost('product_status');
$fields['update_on'] = $this->request->getPost('update_on');


        $this->validation->setRules([
			            'product_code' => ['label' => 'Product code', 'rules' => 'required|min_length[1]|max_length[50]'],
            'product_name' => ['label' => 'Product name', 'rules' => 'required|min_length[1]|max_length[250]'],
            'product_categories' => ['label' => 'Product categories', 'rules' => 'required|min_length[0]|max_length[50]'],
            'product_location' => ['label' => 'Product location', 'rules' => 'required|min_length[0]|max_length[50]'],
            'product_style' => ['label' => 'Product style', 'rules' => 'required|min_length[0]|max_length[50]'],
            'product_time' => ['label' => 'Product time', 'rules' => 'required|min_length[0]|max_length[11]'],
            'product_intro' => ['label' => 'Product intro', 'rules' => 'required|min_length[0]'],
            'product_desc' => ['label' => 'Product desc', 'rules' => 'required|min_length[0]'],
            'product_rules' => ['label' => 'Product rules', 'rules' => 'required|min_length[0]'],
            'product_files' => ['label' => 'Product files', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'product_lang' => ['label' => 'Product lang', 'rules' => 'required|min_length[2]|max_length[2]'],
            'id_master' => ['label' => 'Id master', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'product_guide_lang' => ['label' => 'Product guide lang', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'product_filter' => ['label' => 'Product filter', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'product_priority' => ['label' => 'Product priority', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
            'product_slugs' => ['label' => 'Product slugs', 'rules' => 'required|min_length[1]|max_length[100]'],
            'product_keywords' => ['label' => 'Product keywords', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
            'product_seo' => ['label' => 'Product seo', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
            'product_status' => ['label' => 'Product status', 'rules' => 'required|min_length[0]|max_length[11]'],
            'update_on' => ['label' => 'Update on', 'rules' => 'permit_empty|valid_date|min_length[0]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->ProductModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->ProductModel->where('id', $id)->delete()) {
								
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
