<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers\Product;

use App\Controllers\BaseController;

use App\Models\ProductModel;
// use App\Models\OnsaleModel;
//use App\Models\OnpriceModel;
use App\Models\ObjgroupModel;
use App\Models\Category\LocationModel;
use App\Models\CategoriesModel;
use App\Models\ImageModel;
use App\Models\DurationModel;
use App\Models\ProductonsalesModel;
use App\Models\PriceModel;
use App\Models\OnsalesBlackoutModel;
use App\Models;


class ProductAdminController extends BaseController
{

	protected $ProductModel;
	protected $validation;
	protected $CategoriesModel;
	protected $DurationModel;
	protected $imageModel;
	protected $locationModel;
	protected $onsalesModel;
	protected $productonsalesModel;
	protected $priceModel;
	protected $onsalesBlackoutModel;
	// protected $objgroupModel;

	public function __construct()
	{
		$this->productonsalesModel = new ProductonsalesModel();
		$this->priceModel = new PriceModel();
		$this->ProductModel = new ProductModel();
		$this->locationModel = new LocationModel();
		$this->imageModel = new ImageModel();
		$this->onsalesBlackoutModel = new OnsalesBlackoutModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{
		$data = [
			'sitetitle'	=> 'ERP Travel',
			'pagetitle'	=> 'ERP/Products',
			'pagetitle_mobile'	=> 'Products',
			'controller'	=> 'product',
			'title'     		=> 'Product'
		];
		//return "aaaaaaaaaaaaaaa";
		return view('product/erpproduct', $data);
	}

	public function add_product($lang, $translate_id = 0)
	{
		$translate_id = intval($translate_id);
		$lang = $lang;
		print_r($lang);
		if (in_array($lang, array('vi', 'en'))) {
			//echo 'oklang'.$lang;
			$data = [
				'sitetitle'	=> 'ERP Travel',
				'pagetitle'	=> 'ERP/Product/Add',
				'pagetitle_mobile'	=> 'Product/Add',
				'controller'	=> 'product',
				'title'     		=> 'Add new product',
				'lang'     		=> '' . $lang . '',
				'translate_id' => $translate_id
			];
			return view('product/product_add', $data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function edit_product($id)
	{
		$id = intval($id);
		if ($id > 0) {

			$data = [
				'sitetitle'	=> 'ERP Travel',
				'pagetitle'	=> 'ERP/Product/Edit',
				'pagetitle_mobile'	=> 'Product/Edit',
				'controller'	=> 'product',
				'title'     		=> 'Edit product',
				'lang'     		=> 'en',
				'translate_id' => $id
			];
			return view('product/product_add', $data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}


	public function translate($lang, $translate_id = 0)
	{
		$translate_id = intval($translate_id);
		$lang = $lang;
		if (in_array($lang, array('vi', 'en'))) {
			//echo 'oklang'.$lang;
			$data = [
				'sitetitle'	=> 'ERP Travel',
				'pagetitle'	=> 'ERP/Product/Add',
				'pagetitle_mobile'	=> 'Product/Add',
				'controller'	=> 'product',
				'title'     		=> 'Add new product',
				'lang'     		=> '' . $lang . '',
				'translate_id' => $translate_id
			];
			return view('product/product_add', $data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
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
			$ops .= '<a class="dropdown-item text-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
			$ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';
			$ops .= '<a class="dropdown-item text-danger" onClick="remove(' . $value->id . ')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
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

	public function getData()
	{
		$response = array();
		$id = intval($this->request->getPost('id'));
		$lang = $this->request->getPost('lang');
		$slang = array("vi", "en");
		if (!in_array($lang, $slang)) {
			$lang = 'vi';
		}
		if ($id > 0) {
			$data['product'] = $this->ProductModel->where('id', $id)->first();
			$lang = $data['product']->product_lang;
		} else {
			$data['product'] = '';
		}

		//Get location
		$this->locationModel = new LocationModel();
		$data['location'] = $this->locationModel->getAllLocation(); //load from DB

		$this->objgroupModel = new ObjgroupModel();
		$data['product_filter'] = $this->objgroupModel->getCRMFilter(); //load from DB

		$this->CategoriesModel = new CategoriesModel();
		$data['product_categories'] = $this->CategoriesModel->getCategories('product', $lang);
		//$data['product_style'] = $this->CategoriesModel->getCategories('product_style', $lang);//load from DB
		$this->DurationModel = new DurationModel();
		$data['product_duration'] = $this->DurationModel->getDuration($lang); //load from DB

		return $this->response->setJSON($data);
	}

	public function getALlFile()
	{
		$data['image'] = $this->imageModel->orderBy('id', 'DESC')->findAll();

		$this->locationModel = new LocationModel();
		$data['location'] = $this->locationModel->getAllLocation(); //load from DB

		return $this->response->setJSON($data);

		// $page = $this->request->getGet('page') ?: 1;
		// $itemsPerPage = 21;
		// $offset = ($page - 1) * $itemsPerPage;
		// $totalItems = $this->imageModel->count_images();
		// $totalPages = ceil($totalItems / $itemsPerPage);
		// $images = $this->imageModel->get_images($itemsPerPage, $offset);
		// return $this->response->setJSON([
		// 	'image' => $images,
		// 	'total_pages' => $totalPages,
		// 	'location' => $this->locationModel->getAllLocation()
		// ]);
	}

	public function getChoosedFile()
	{
		$images = $this->request->getPost('images');
		return $this->response->setJSON($images);
	}

	public function addProduct()
	{

		$response = array();
		$session = session();
		$fields['created_by'] = $session->id;
		$fields['product_lang'] = $this->request->getPost('product_lang');
		//	$fields['product_lang'] = 'vi';
		$fields['product_code'] = $this->request->getPost('product_code');
		$fields['product_name'] = $this->request->getPost('product_name');
		$fields['product_categories'] = $this->request->getPost('product_categories');
		//$fields['product_group'] = $this->request->getPost('product_categories');
		$fields['product_duration'] = $this->request->getPost('product_duration');
		$fields['product_guide_lang'] = json_encode($this->request->getPost('product_guide_lang'));
		$fields['product_travel_from'] = $this->request->getPost('product_travel_from');
		$fields['product_location'] = json_encode($this->request->getPost('product_location'));
		$fields['product_intro'] = $this->request->getPost('product_intro');
		$fields['product_desc'] = $this->request->getPost('product_desc');
		$fields['product_rules'] = $this->request->getPost('product_rules');
		$fields['product_images'] = $this->request->getPost('product_images');

		//		$fields['id_master'] = $this->request->getPost('id_master');
		//$fields['product_filter'] = $this->request->getPost('product_filter');
		//	$fields['product_priority'] = $this->request->getPost('product_priority');
		$fields['product_slugs'] = $this->request->getPost('product_slugs');
		$fields['product_keywords'] = $this->request->getPost('product_keywords');
		$fields['product_seo'] = $this->request->getPost('product_seo');



		$this->validation->setRules([
			'product_lang' => ['label' => 'Product lang', 'rules' => 'required|min_length[2]'],
			'product_code' => ['label' => 'Product code', 'rules' => 'required|min_length[1]|max_length[50]'],
			'product_name' => ['label' => 'Product name', 'rules' => 'required|min_length[1]|max_length[250]'],
			'product_categories' => ['label' => 'Product categories', 'rules' => 'required|min_length[0]|max_length[50]'],
			'product_duration' => ['label' => 'Product duration', 'rules' => 'required|min_length[0]|max_length[11]'],
			//  'product_guide_lang' => ['label' => 'Product guide lang', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],						
			//	'product_travel_from' => ['label' => 'Start from', 'rules' => 'required|min_length[0]|max_length[50]'],
			//    'product_location' => ['label' => 'Product location', 'rules' => 'required|min_length[0]|max_length[50]'],	
			'product_intro' => ['label' => 'Product intro', 'rules' => 'required|min_length[0]'],
			'product_desc' => ['label' => 'Product desc', 'rules' => 'required|min_length[0]'],
			'product_rules' => ['label' => 'Product rules', 'rules' => 'required|min_length[0]'],
			'product_images' => ['label' => 'Product files', 'rules' => 'permit_empty|min_length[0]|max_length[1000]'],
			'product_slugs' => ['label' => 'Product slugs', 'rules' => 'required|min_length[1]|max_length[100]'],
			'product_keywords' => ['label' => 'Product keywords', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
			'product_seo' => ['label' => 'Product seo', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->ProductModel->insert($fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.insert-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.insert-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function saveProduct()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('product_id');
		$fields['product_code'] = $this->request->getPost('product_code');
		$fields['product_name'] = $this->request->getPost('product_name');
		$fields['product_categories'] = $this->request->getPost('product_categories');
		//$fields['product_group'] = $this->request->getPost('product_categories');
		$fields['product_duration'] = $this->request->getPost('product_duration');
		$fields['product_guide_lang'] = json_encode($this->request->getPost('product_guide_lang'));
		$fields['product_travel_from'] = $this->request->getPost('product_travel_from');
		$fields['product_location'] = json_encode($this->request->getPost('product_location'));
		$fields['product_intro'] = $this->request->getPost('product_intro');
		$fields['product_desc'] = $this->request->getPost('product_desc');
		$fields['product_rules'] = $this->request->getPost('product_rules');
		$fields['product_images'] = $this->request->getPost('product_images');
		$fields['product_status'] = $this->request->getPost('product_status');
		//		$fields['product_lang'] = $this->request->getPost('product_lang');
		//		$fields['id_master'] = $this->request->getPost('id_master');
		//$fields['product_filter'] = $this->request->getPost('product_filter');
		//	$fields['product_priority'] = $this->request->getPost('product_priority');
		$fields['product_slugs'] = $this->request->getPost('product_slugs');
		$fields['product_keywords'] = $this->request->getPost('product_keywords');
		$fields['product_seo'] = $this->request->getPost('product_seo');
		//		$fields['update_on'] = $this->request->getPost('update_on');


		$this->validation->setRules([
			'product_code' => ['label' => 'Product code', 'rules' => 'required|min_length[1]|max_length[50]'],
			'product_name' => ['label' => 'Product name', 'rules' => 'required|min_length[1]|max_length[250]'],
			'product_categories' => ['label' => 'Product categories', 'rules' => 'required|min_length[0]|max_length[50]'],
			'product_duration' => ['label' => 'Product duration', 'rules' => 'required|min_length[0]|max_length[11]'],
			//  'product_guide_lang' => ['label' => 'Product guide lang', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],						
			//	'product_travel_from' => ['label' => 'Start from', 'rules' => 'required|min_length[0]|max_length[50]'],
			//    'product_location' => ['label' => 'Product location', 'rules' => 'required|min_length[0]|max_length[50]'],	
			'product_intro' => ['label' => 'Product intro', 'rules' => 'required|min_length[0]'],
			'product_desc' => ['label' => 'Product desc', 'rules' => 'required|min_length[0]'],
			'product_rules' => ['label' => 'Product rules', 'rules' => 'required|min_length[0]'],
			'product_images' => ['label' => 'Product files', 'rules' => 'permit_empty|min_length[0]|max_length[1000]'],
			'product_slugs' => ['label' => 'Product slugs', 'rules' => 'required|min_length[1]|max_length[100]'],
			'product_keywords' => ['label' => 'Product keywords', 'rules' => 'permit_empty|min_length[0]|max_length[100]'],
			'product_seo' => ['label' => 'Product seo', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->ProductModel->update($fields['id'], $fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
				$response['senddata'] = $fields;
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

	public function viewFullProduct($id)
	{
		$id = intval($id);
		$db['location'] = $this->locationModel->getAllLocation();

		$data['product'] = $this->ProductModel->where('id', $id)->first();
		
		$data['controller'] = 'product';

		$idsToConvertJson = $data['product']->product_location;

		$idsToConvert = json_decode($idsToConvertJson, true);

		// Tạo một mảng để tra cứu tên theo ID
		$idToNameMap = array_column($db['location'], 'name', 'id');

		// Chuyển đổi mảng ID thành tên
		$location_names = array_map(function ($id) use ($idToNameMap) {
			return $idToNameMap[$id];
		}, $idsToConvert);

		$location_string = implode(' - ', $location_names);
		$data['product_location'] = $location_string;

		$duration = $this->ProductModel->getDuration($data['product']->product_duration);
		$data['product_duration'] = $duration[0];
		$data['product_category'] = $this->ProductModel->getCategory_Name($data['product']->product_categories)[0];
		return view('product/viewfullproduct', $data);
		// return $this->response->setJSON($data);
	}
	public function loadPacket()
	{

		$id_product = intval($this->request->getPost('id'));
		$html = '';
			$res = $this->productonsalesModel->where('id_product',$id_product)->where('onsales_status',1)->findAll();
			$data['onsalescount'] = count($res);
			foreach ($res as $key => $items) {
				$data['items'] = $items;
				$id_onsales = $items->id;
				$data['skus'] = $this->priceModel->getOnSalesPrice($id_onsales);
				$data['blackouts'] = $this->onsalesBlackoutModel->getBlackouts($id_onsales);
				// $priceGroupNames = array_column($data, 'price_group_name');
				// $data['price_group_name']  = $priceGroupNames ;

				$html .= view('product/packet_view_product', $data);
			}
			// $html = str_replace(array("\r\n", "\r", "\n", "\t"), '', $html);
			$data['html'] = $html;
		
		return $this->response->setJSON($data);
	}
}
