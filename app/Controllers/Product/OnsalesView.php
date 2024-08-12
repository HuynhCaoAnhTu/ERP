<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers\Product;

use App\Controllers\BaseController;

use App\Models\OnsalesViewModel;
//use App\Models\OnsaleModel;
//use App\Models\OnpriceModel;

class OnsalesView extends BaseController
{
	
  //  protected $ProductModel;
  //  protected $validation;
	
	public function __construct()
	{
	    $this->OnsalesViewModel = new OnsalesViewModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{	
	    $data = [
				'sitetitle'	=> 'ERP Travel',
				'pagetitle'	=> 'ERP/Products/Outbound',
				'pagetitle_mobile'	=> 'Outbound',
				'controller'	=> 'erp/products/outbound',
                'title'     		=> 'On sales - Oubound'				
			];

		//return "aaaaaaaaaaaaaaa";
		return view('product/onsalesview', $data);
			
	}
	
	public function outbound()
	{
	
	    $data = [
				'sitetitle'	=> 'ERP Travel',
				'pagetitle'	=> 'ERP/Products/Outbound',
				'pagetitle_mobile'	=> 'Outbound',
				'controller'	=> 'erp/products/outbound',
                'title'     		=> 'On sales - Oubound'				
			];
		//echo "aaaaaaaaaaaaaaa";
		return view('product/onsalesview_outbound', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->ProductModel->select()->findAll();
		//$result = $this->locationModel->getAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="btn-group">';
			$ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
			$ops .= '<div class="dropdown-menu">';
			$ops .= '<a class="dropdown-item text-info" onClick="view('. $value->id .')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.view")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="booking('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.booking")  . '</a>';
			$ops .= '</div></div>';

			$data['data'][$key] = array(
				$value->id,
				$value->product_code,
				$value->product_name,
				$value->product_time,
				$value->product_lang,
				$value->product_status,
				$value->update_on,
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
}	
