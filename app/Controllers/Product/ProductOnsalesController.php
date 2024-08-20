<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers\Product;

use App\Controllers\BaseController;

use App\Models\ProductOnsalesModel;
use App\Models\ProductModel;
use App\Models\PriceModel;
use App\Models\AuthModel;
use App\Models\PriceTempModel;
use App\Models\ProductonsalespriceModel;
use App\Models\PricetemponsalesModel;
use App\Models\OnsalesBlackoutModel;


class ProductOnsalesController extends BaseController
{

	protected $productonsalesModel;
	protected $productModel;
	protected $validation;
	protected $priceModel;
	protected $userModel;
	protected $priceTempModel;
	protected $onsalesModel;
	protected $productonsalespriceModel;
	protected $priceOnsaleTemp;
	protected $onsalesBlackoutModel;

	public function __construct()
	{
		$this->productModel = new ProductModel();
		$this->productonsalesModel = new ProductonsalesModel();
		$this->priceModel = new PriceModel();
		$this->priceTempModel = new PriceTempModel();
		$this->userModel = new AuthModel();
		$this->onsalesModel = new ProductonsalesModel();
		$this->productonsalespriceModel = new ProductonsalespriceModel();
		$this->priceOnsaleTemp = new PricetemponsalesModel();
		$this->onsalesBlackoutModel = new OnsalesBlackoutModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> 'productonsales',
			'title'     		=> 'product_onsales'
		];

		return view('productonsales', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->productonsalesModel->select()->findAll();

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
				$value->onsales_code,
				$value->onsales_name,
				$value->onsales_info,
				$value->onsales_style,
				$value->date_from,
				$value->date_ends,
				$value->time_cutoff,
				$value->onsales_slot,
				$value->onsales_over,
				$value->file_b2b,
				$value->file_b2c,
				$value->pick_up,
				$value->drop_off,
				$value->id_sale,
				$value->id_op,
				$value->onsales_status,
				$value->created_by,
				$value->created_on,
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

			$data = $this->productonsalesModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}
	public function getOnsaleForm()
	{
		$id_product = intval($this->request->getPost('id_product'));
		$onsale_style = $this->request->getPost('onsale_style');
		$html = "";
		if ($onsale_style == 4) {
			$data['ops'] = $this->userModel->getOPS();
			$data['temp'] = $this->priceOnsaleTemp->findAll();
			$data['blackout_temp'] = $this->onsalesBlackoutModel->getBlackoutTemp();
			$data['id_product'] = $id_product;
			$html .= view('product/onsales_inbound', $data);
			$data['html'] = $html;
			$data['controller'] = 'product';
		} else 	if ($onsale_style == 1) {
			$data['ops'] = $this->userModel->getOPS();
			$data['id_product'] = $id_product;
			$html .= view('product/onsales_singleday', $data);
			$data['html'] = $html;
			$data['controller'] = 'product';
		}



		return $this->response->setJSON($data);
	}

	public function getPricesTemp()
	{
		$id_temp = $this->request->getPost('temp_id');

		$data = $this->priceTempModel->getTempOnsalePrice($id_temp);

		return $this->response->setJSON($data);
	}

	public function getBlackoutsTemp()
	{
		$id_temp = $this->request->getPost('temp_id');

		$data = $this->onsalesBlackoutModel->getTempOnsaleBlackout($id_temp);

		return $this->response->setJSON($data);
	}


	public function getForm()
	{
		$response = array();
		$id_onsales = intval($this->request->getPost('id_onsales'));
		$onsales_style = intval($this->request->getPost('onsales_style'));
		$onsales_style = 1;
		$html = '';
		// Lưu ý check sở hữu!!! mới cho add/edit
		if ($id_onsales > 0) {
			$data['onsales'] = 'EDIT';
			// Lưu ý check sở hữu!!! mới cho edit
			$items = $this->productonsalesModel->where('id', $id_onsales)->first();
			if ($items) {
				$data['items'] = $items;
				$data['blackouts'] = $this->onsalesBlackoutModel->where('id_onsales', $id_onsales)->findAll();
				$data['skus'] = $this->priceModel->getOnSalesPrice_PriceGroup($id_onsales);
				$data['ops'] = $this->userModel->getOPS();
				$onsales_style = $items->onsales_style;
				$data['temp'] = $this->priceOnsaleTemp->findAll();
				try {
					$html .= view('product/onsales_edit1', $data);
				} catch (\Throwable $e) {
					$html .= $e->getMessage();
				}
			} else {
				$html = 'NOT FOUND!';
			}
		} else {
			$data['onsales'] = 'ADD NEW';
			//Load $items from temp
			$items = $this->productonsalesModel->where('id', $id_onsales)->first();
			if ($items) {
				$data['items'] = $items;
				$data['skus'] = $this->priceModel->getOnSalesPrice($id_onsales);
				$data['ops'] = $this->userModel->getOPS();
				$data['blackouts'] = $this->onsalesBlackoutModel->where('id_onsales', $id_onsales)->findAll();
				$onsales_style = $items->onsales_style;
				$data['temp'] = $this->priceOnsaleTemp->findAll();
				try {
					$html .= view('product/onsales_edit' . $onsales_style, $data);
					$html = str_replace(array("\r\n", "\r", "\n", "\t"), '', $html);
				} catch (\Throwable $e) {
					$html .= $e->getMessage();
				}
				$data['temp'] = $this->priceOnsaleTemp->findAll();
			} else {
				$html = 'NOT FOUND!';
			}
			//Load temp
			//$this->locationModel = new LocationModel();
			//$data['location'] = $this->locationModel->getAllLocation();//load from DB

		}
		$data['html'] = $html;
		//echo $html;
		return $this->response->setJSON($data);
	}

	// LIST Onsales
	public function listOnSales()
	{
		$response = array();
		$id_product = intval($this->request->getPost('id_product'));
		$id_status = intval($this->request->getPost('id_status'));
		$price_group_name = '';
		$html = '';
		if ($this->validation->check($id_product, 'required|numeric') and ($id_product > 0)) {
			if ($id_status == '9') {
				$res = $this->productonsalesModel->where('id_product', $id_product)->orderBy('id', 'DESC')->findAll();
			} else {
				$res = $this->productonsalesModel->where('id_product', $id_product)->where('onsales_status', $id_status)->orderBy('id', 'DESC')->findAll();
			}

			$data['onsalescount'] = count($res);
			foreach ($res as $key => $items) {
				$data['items'] = $items;
				$id_onsales = $items->id;
				$data['blackouts'] = $this->onsalesBlackoutModel->getBlackouts($id_onsales);
				$data['skus'] = $this->priceModel->getOnSalesPrice($id_onsales);
				$data['ops'] = $this->userModel->getOPS();
				$data['sales'] = $this->userModel->getUserNameById($data['items']->id_sale);
				$data['ops'] = $this->userModel->getUserNameById($data['items']->id_op);
				// $priceGroupNames = array_column($data, 'price_group_name');
				// $data['price_group_name']  = $priceGroupNames ;

				$html .= view('product/onsales_view1', $data);
			}

			// $html = str_replace(array("\r\n", "\r", "\n", "\t"), '', $html);
			$data['html'] = $html;
		} else {

			return false;
		}
		return $this->response->setJSON($data);
	}

	public function listOnSales_old()
	{
		$response = array();
		$id_product = intval($this->request->getPost('id_product'));
		//$id_product = 1;
		$html = '';
		if ($this->validation->check($id_product, 'required|numeric') and ($id_product > 0)) {
			$res = $this->productonsalesModel->getOnsales($id_product);
			$data['onsalescount'] = count($res);
			foreach ($res as $key => $items) {
				//echo $items->onsales_name;
				$html .= '<div class="card card-outline card-success">';
				$html .= '<div class="card-body">';
				$html .= '<div class="row"><div class="col-md-4"><b>CODE+NAME</b><br>Info<br>B2B file</div>';
				$html .= '<div class="col-md-2"><table class="table"><tr><th>Date</th><td>01/08/2024</td></tr><th>Cutoff</th><td>01/07/2024</td></tr><th>Slot</th><td>25</td></tr><th>Over</th><td>0</td></tr><tr></table></div>';
				$html .= '<div class="col-md-4">';
				$html .= '<table class="table table-bordered"><tr><th>SKU</th><th>Item</th><th>B2C Price</th><th>B2B Discount</th></tr>';
				$html .= '<tr><td>001</td><td>Người lớn</td><td class="text-right">10.000.000đ</td><td class="text-right">1.000.000đ</td></tr>';
				$html .= '<tr><td>001</td><td>Trẻ em</td><td class="text-right">9.000.000đ</td><td class="text-right">1.000.000đ</td></tr>';
				$html .= '<tr><td>001</td><td>Em bé</td><td>5.000.000đ</td><td class="text-right">0đ</td></tr>';
				$html .= '<tr><td>001</td><td>Phụ thu phòng đơn</td><td>5.000.000đ</td><td>0đ</td></tr>';
				$html .= '</table>';
				$html .= '</div>';
				$html .= '<div class="col-md-2 card card-outline card-success">';
				$html .= '<div class="col-md-12">taothang@gmail.com<br>Update: 2024/01/01 10:10:10<br>Sale:<br>Op:<br><br></div>';
				$html .= '<div class="col-md-12 text-center">Status: <span class="badge bg-warning">Active</span><br></div>';

				$html .= '<hr><div class="col-md-12 text-center"><button type="button" id= "edit-onsales-raw" class="btn btn-danger" onClick="edit_onsales(' . $value->id . ')">Edit</button></div></div>';
				$html .= '</div></div></div>';
			}
			$html .= '<div class="col-md-3"><button class="dt-button btn btn-success" tabindex="0" type="button" onclick="select_onsales_style()"><span>+ Add new</span></button></div><div class="col-md-9"></div>';
			//echo $html;
			$data['html'] = $html;
			return $this->response->setJSON($data);
		} else {

			return false;
		}
	}

	public function getOnSales()
	{
		$response = array();

		$id_product = intval($this->request->getPost('id_product'));
		$id_product = 1;

		if ($this->validation->check($id_product, 'required|numeric') and ($id_product > 0)) {

			$data['onsales'] = $this->productonsalesModel->getOnsales($id_product);
			$data['onsalescount'] = count($data['onsales']);
			return $this->response->setJSON($data);
		} else {
			return false;
		}
	}



	//---save
	public function saveOnsales()
	{
		$onsale_price_data3 = [];
		$onsale_data = [];
		$response = array();
		$fields = [
			// onsale data
			'id_product' => $this->request->getPost('id_product'),
			'onsales_code' => $this->request->getPost('onsales_code'),
			'onsales_info' => $this->request->getPost('onsale_infor_editor'),
			'onsales_name' => $this->request->getPost('onsales_name'),
			'onsales_style' => $this->request->getPost('onsales_style'),
			'date_from' => $this->request->getPost('date_from'),
			'date_ends' => $this->request->getPost('date_ends'),
			'time_cutoff' => $this->request->getPost('time_cutoff'),
			'onsales_slot' => $this->request->getPost('onsales_slot'),
			'onsales_over' => $this->request->getPost('onsales_over'),
			//blackout
			'blackout_name' => $this->request->getPost('blackout_name'),
			'blackout_from' => $this->request->getPost('blackout_from'),
			'blackout_to' => $this->request->getPost('blackout_to'),

			// onsale price data
			'price_for' => $this->request->getPost('price_for'),
			'price_group' => $this->request->getPost('price_group'),
			'validity_from' => $this->request->getPost('validity_from'),
			'validity_to' => $this->request->getPost('validity_to'),
			'price_seat' => $this->request->getPost('seat'),
			'price_3' => $this->request->getPost('price_3'),
			'price_4' => $this->request->getPost('price_4'),
			'price_5' => $this->request->getPost('price_5'),
			'price_group3' => $this->request->getPost('price_group3'),
			'price_group4' => $this->request->getPost('price_group4'),
			'price_group5' => $this->request->getPost('price_group5'),
			'price_notes' => $this->request->getPost('price_note'),
			'price_seat' => $this->request->getPost('price_seat'),
			'price_unit' => $this->request->getPost('price_unit'),
			'price_currency' => $this->request->getPost('price_currency'),
			'price_vat' => $this->request->getPost('price_vat'),
			'select_min' => $this->request->getPost('select_min'),
			'select_max' => $this->request->getPost('select_max'),

			'file_b2b' => $this->request->getPost('file_b2b'),
			'id_sale' => $this->request->getPost('id_sale'),
			'id_op' => $this->request->getPost('id_op'),
			'onsales_status' => $this->request->getPost('onsales_status'),
		];
		// $this->validation->setRules([
		// 	'id_product' => ['label' => 'Id product', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_code' => ['label' => 'Onsales code', 'rules' => 'min_length[0]|max_length[100]'],
		// 	'onsales_name' => ['label' => 'Onsales name', 'rules' => 'required|min_length[0]|max_length[250]'],
		// 	'onsales_info' => ['label' => 'Onsales info', 'rules' => 'permit_empty|min_length[0]'],
		// 	'onsales_style' => ['label' => 'Onsales style', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'date_from' => ['label' => 'Date from', 'rules' => 'required|valid_date|min_length[0]'],
		// 	'date_ends' => ['label' => 'Date ends', 'rules' => 'required|valid_date|min_length[0]'],
		// 	'time_cutoff' => ['label' => 'Time cutoff', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_slot' => ['label' => 'Onsales slot', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_over' => ['label' => 'Onsales over', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'file_b2b' => ['label' => 'File b2b', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
		// 	'file_b2c' => ['label' => 'File b2c', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
		// 	'pick_up' => ['label' => 'Pick up', 'rules' => 'permit_empty|min_length[0]'],
		// 	'drop_off' => ['label' => 'Drop off', 'rules' => 'permit_empty|min_length[0]'],
		// 	'id_sale' => ['label' => 'Id sale', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'id_op' => ['label' => 'Id op', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_status' => ['label' => 'Onsales status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'created_by' => ['label' => 'Created by', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'created_on' => ['label' => 'Created on', 'rules' => 'permit_empty|valid_date|min_length[0]'],
		// 	'update_on' => ['label' => 'Update on', 'rules' => 'permit_empty|valid_date|min_length[0]'],
		// 	'deleted' => ['label' => 'Deleted', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
		// 	'deleted_by' => ['label' => 'Deleted by', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'deleted_on' => ['label' => 'Deleted on', 'rules' => 'permit_empty|valid_date|min_length[0]'],

		// ]);;

		// if ($this->validation->run($fields) == FALSE) {

		// 	$response['success'] = false;
		// 	$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		// } else {

		$onsale_data = [
			'id_product' => $fields['id_product'],
			'onsales_code' => $fields['onsales_code'] != null ? $fields['onsales_code'] : null,
			'onsales_name' => $fields['onsales_name'] != null ? $fields['onsales_name'] : null,
			'onsales_info' => $fields['onsales_info'] != null ? $fields['onsales_info'] : null,
			'onsales_slot' => $fields['onsales_slot'] != null ? $fields['onsales_slot'] : null,
			'file_b2b' => $fields['file_b2b'] != null ? $fields['file_b2b'] : null,
			'id_sale' => $fields['id_sale'] != null ? $fields['id_sale'] : null,
			'id_op' => $fields['id_op'] != null ? $fields['id_op'] : null,
			'onsales_status' => $fields['onsales_status'],
		];


		if ($this->onsalesModel->insert($onsale_data)) {
			$id_onsales = $this->onsalesModel->getInsertID();
			if (!empty($fields['blackout_name'])) {
				foreach ($fields['blackout_name'] as $key => $value) {
					$blackout_data = [
						'id_onsales' => $id_onsales,
						'blackout_name' => $value,
						'blackout_from' => $fields['blackout_from'][$key],
						'blackout_to' => $fields['blackout_to'][$key],

					];
					$this->onsalesBlackoutModel->insert($blackout_data);
				}
			}

			if (!empty($fields['price_for'])) {
				foreach ($fields['price_for'] as $key => $value) {
					$onsale_price_data3 = [
						'id_onsales' => $id_onsales,
						'price_group' => $fields['price_group3'][$key] != null ? $fields['price_group3'][$key] : null,
						'price_for' => $value != null ? $value : null,
						'price_valied_from' => $fields['validity_from'][$key] != null ? $fields['validity_from'][$key] : null,
						'price_valied_to' => $fields['validity_to'][$key] != null ? $fields['validity_to'][$key] : null,
						'price_seat' => $fields['price_seat'][$key] != null ? $fields['price_seat'][$key] : null,
						'price_unit' => $fields['price_unit'][$key] != null ? $fields['price_unit'][$key] : null,
						'price_currency' => $fields['price_currency'][$key] != null ? $fields['price_currency'][$key] : null,
						// 'price_b2c' => $fields['price_b2c'][$key],
						'price_b2b' => $fields['price_3'][$key] != null ? $fields['price_3'][$key] : null,
						'price_vat' => $fields['price_vat'][$key] != null ? $fields['price_vat'][$key] : null,
						'price_notes' => $fields['price_notes'][$key] != null ? $fields['price_notes'][$key] : null,
						'select_min' => $fields['select_min'][$key] != null ? $fields['select_min'][$key] : null,
						'select_max' => $fields['select_max'][$key] != null ? $fields['select_max'][$key] : null,
					];

					$this->productonsalespriceModel->insert($onsale_price_data3);
					$id_onsales_price = $this->productonsalespriceModel->getInsertID();
					$product_code = $this->productModel->getProductCode($fields['id_product']);
					$product_code_val = $product_code[0]->product_code;
					$sku = $product_code_val . "_" . $fields['onsales_code'] . "_" . $id_onsales_price;
					$data = [
						'SKU' => $sku
					];
					$this->productonsalespriceModel->update($id_onsales_price, $data);

					$onsale_price_data4 = [
						'id_onsales' => $id_onsales,
						'price_group' => $fields['price_group4'][$key] != null ? $fields['price_group4'][$key] : null,
						'price_for' =>  $value != null ? $value : null,
						'price_valied_from' => $fields['validity_from'][$key] != null ? $fields['validity_from'][$key] : null,
						'price_valied_to' => $fields['validity_to'][$key] != null ? $fields['validity_to'][$key] : null,
						'price_seat' => $fields['price_seat'][$key] != null ? $fields['price_seat'][$key] : null,
						'price_unit' => $fields['price_unit'][$key] != null ? $fields['price_unit'][$key] : null,
						'price_currency' => $fields['price_currency'][$key] != null ? $fields['price_currency'][$key] : null,
						// 'price_b2c' => $fields['price_b2c'][$key],
						'price_b2b' => $fields['price_4'][$key] != null ? $fields['price_4'][$key] : null,
						'price_vat' => $fields['price_vat'][$key] != null ? $fields['price_vat'][$key] : null,
						'price_notes' => $fields['price_notes'][$key] != null ? $fields['price_notes'][$key] : null,
						'select_min' => $fields['select_min'][$key] != null ? $fields['select_min'][$key] : null,
						'select_max' => $fields['select_max'][$key] != null ? $fields['select_max'][$key] : null,
					];

					$this->productonsalespriceModel->insert($onsale_price_data4);
					$id_onsales_price = $this->productonsalespriceModel->getInsertID();
					$product_code = $this->productModel->getProductCode($fields['id_product']);
					$product_code_val = $product_code[0]->product_code;
					$sku = $product_code_val . "_" . $fields['onsales_code'] . "_" . $id_onsales_price;
					$data = [
						'SKU' => $sku
					];
					$this->productonsalespriceModel->update($id_onsales_price, $data);
					$next_key5 = $key + 1;
					$onsale_price_data5 = [
						'id_onsales' => $id_onsales,
						'price_group' => $fields['price_group5'][$key] != null ? $fields['price_group5'][$key] : null,
						'price_for' => $value != null ? $value : null,
						'price_valied_from' => $fields['validity_from'][$key] != null ? $fields['validity_from'][$key] : null,
						'price_valied_to' => $fields['validity_to'][$key] != null ? $fields['validity_to'][$key] : null,
						'price_seat' => $fields['price_seat'][$key] != null ? $fields['price_seat'][$key] : null,
						'price_b2b' => $fields['price_5'][$key] != null ? $fields['price_5'][$key] : null,
						'price_vat' => $fields['price_vat'][$key] != null ? $fields['price_vat'][$key] : null,
						'price_unit' => $fields['price_unit'][$key] != null ? $fields['price_unit'][$key] : null,
						'price_currency' => $fields['price_currency'][$key] != null ? $fields['price_currency'][$key] : null,
						'price_notes' => $fields['price_notes'][$key] != null ? $fields['price_notes'][$key] : null,
						'select_min' => $fields['select_min'][$key] != null ? $fields['select_min'][$key] : null,
						'select_max' => $fields['select_max'][$key] != null ? $fields['select_max'][$key] : null,
					];

					$this->productonsalespriceModel->insert($onsale_price_data5);
					$id_onsales_price = $this->productonsalespriceModel->getInsertID();
					$product_code = $this->productModel->getProductCode($fields['id_product']);
					$product_code_val = $product_code[0]->product_code;
					$sku = $product_code_val . "_" . $fields['onsales_code'] . "_" . $id_onsales_price;
					$data = [
						'SKU' => $sku
					];
					$this->productonsalespriceModel->update($id_onsales_price, $data);
				}




				// 	if ($this->productonsalespriceModel->insert($onsale_price_data3)) {	
				// } else {

				// 	$response['success'] = false;
				// 	$response['messages'] = lang("App.insert-error");
				// }
				// $onsale_price_data4 = [
				// 	'id_onsales' => $id_onsales,
				// 	'price_group' => $value,
				// 	'price_for' => $fields['price_3'][$key + 1],
				// 	'price_valied_from' => $fields['validity_from'][$key],
				// 	'price_valied_to' => $fields['validity_to'][$key],
				// 	'price_seat' => $fields['price_seat'][$key],
				// 	'price_b2c' => $fields['price_b2c'][$key],
				// 	'price_b2b' => $fields['price_b2c'][$key],
				// 	'price_vat' => $fields['price_vat'][$key],
				// 	'price_notes' => $fields['price_notes'][$key],
				// 	'select_min' => $fields['select_min'],
				// 	'select_max' => $fields['select_max'],
				// ];
				// if ($this->productonsalespriceModel->insert($onsale_price_data)) {

				// 	$response['success'] = true;
				// 	$response['messages'] = lang("App.insert-success");
				// } else {

				// 	$response['success'] = false;
				// 	$response['messages'] = lang("App.insert-error");
				// }

			}
			$response['success'] = true;
			$response['messages'] = lang("App.insert-success");
		}
		return $this->response->setJSON($response);
		// }

	}

	public function updateOnsales()
	{
		$response = array();
		$data;
		$fields = [
			// onsale data
			'id_product' => $this->request->getPost('id_product'),
			'id_onsales' => $this->request->getPost('id_onsales'),
			'onsales_code' => $this->request->getPost('onsales_code'),
			'onsales_info' => $this->request->getPost('onsale_infor_editor'),
			'onsales_name' => $this->request->getPost('onsales_name'),
			'onsales_style' => $this->request->getPost('onsales_style'),
			'date_from' => $this->request->getPost('date_from'),
			'date_ends' => $this->request->getPost('date_ends'),
			'time_cutoff' => $this->request->getPost('time_cutoff'),
			'onsales_slot' => $this->request->getPost('onsales_slot'),
			'onsales_over' => $this->request->getPost('onsales_over'),

			// onsale price data
			'price_for' => $this->request->getPost('price_for'),
			'price_group' => $this->request->getPost('price_group'),
			'validity_from' => $this->request->getPost('validity_from'),
			'validity_to' => $this->request->getPost('validity_to'),
			'price_seat' => $this->request->getPost('seat'),
			'price_3' => $this->request->getPost('price_3'),
			'price_4' => $this->request->getPost('price_4'),
			'price_5' => $this->request->getPost('price_5'),
			'id_price_3' => $this->request->getPost('id_price_3'),
			'id_price_4' => $this->request->getPost('id_price_4'),
			'id_price_5' => $this->request->getPost('id_price_5'),
			'price_group3' => $this->request->getPost('price_group3'),
			'price_group4' => $this->request->getPost('price_group4'),
			'price_group5' => $this->request->getPost('price_group5'),
			'price_notes' => $this->request->getPost('price_note'),
			'price_seat' => $this->request->getPost('price_seat'),
			'price_unit' => $this->request->getPost('price_unit'),
			'price_currency' => $this->request->getPost('price_currency'),
			'price_vat' => $this->request->getPost('price_vat'),
			'select_min' => $this->request->getPost('select_min'),
			'select_max' => $this->request->getPost('select_max'),

			'file_b2b' => $this->request->getPost('file_b2b'),
			'id_sale' => $this->request->getPost('id_sale'),
			'id_op' => $this->request->getPost('id_op'),
			'onsales_status' => $this->request->getPost('onsales_status'),
		];
		// $this->validation->setRules([
		// 	'id_product' => ['label' => 'Id product', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_code' => ['label' => 'Onsales code', 'rules' => 'min_length[0]|max_length[100]'],
		// 	'onsales_name' => ['label' => 'Onsales name', 'rules' => 'required|min_length[0]|max_length[250]'],
		// 	'onsales_info' => ['label' => 'Onsales info', 'rules' => 'permit_empty|min_length[0]'],
		// 	'onsales_style' => ['label' => 'Onsales style', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'date_from' => ['label' => 'Date from', 'rules' => 'required|valid_date|min_length[0]'],
		// 	'date_ends' => ['label' => 'Date ends', 'rules' => 'required|valid_date|min_length[0]'],
		// 	'time_cutoff' => ['label' => 'Time cutoff', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_slot' => ['label' => 'Onsales slot', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_over' => ['label' => 'Onsales over', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'file_b2b' => ['label' => 'File b2b', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
		// 	'file_b2c' => ['label' => 'File b2c', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
		// 	'pick_up' => ['label' => 'Pick up', 'rules' => 'permit_empty|min_length[0]'],
		// 	'drop_off' => ['label' => 'Drop off', 'rules' => 'permit_empty|min_length[0]'],
		// 	'id_sale' => ['label' => 'Id sale', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
		// 	'id_op' => ['label' => 'Id op', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'onsales_status' => ['label' => 'Onsales status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'created_by' => ['label' => 'Created by', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'created_on' => ['label' => 'Created on', 'rules' => 'permit_empty|valid_date|min_length[0]'],
		// 	'update_on' => ['label' => 'Update on', 'rules' => 'permit_empty|valid_date|min_length[0]'],
		// 	'deleted' => ['label' => 'Deleted', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
		// 	'deleted_by' => ['label' => 'Deleted by', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
		// 	'deleted_on' => ['label' => 'Deleted on', 'rules' => 'permit_empty|valid_date|min_length[0]'],

		// ]);;

		// if ($this->validation->run($fields) == FALSE) {

		// 	$response['success'] = false;
		// 	$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		// } else {

		$onsale_data = [
			'id_product' => $fields['id_product'],
			'onsales_code' => $fields['onsales_code'],
			'onsales_name' => $fields['onsales_name'],
			'onsales_info' => $fields['onsales_info'],
			'onsales_slot' => $fields['onsales_slot'],
			'file_b2b' => $fields['file_b2b'],
			'id_sale' => $fields['id_sale'],
			'id_op' => $fields['id_op'],
			'onsales_status' => $fields['onsales_status'],
		];
		if ($this->onsalesModel->update($fields['id_onsales'], $onsale_data)) {
			if ($fields['id_price_3'] == null && $fields['id_price_4'] == null && $fields['id_price_5'] == null) {

				if (!empty($fields['price_for'])) {
					foreach ($fields['price_for'] as $key => $value) {
						$onsale_price_data3 = [
							'id_onsales' => $fields['id_onsales'],
							'price_group' => $fields['price_group3'][$key],
							'price_for' => $value,
							'price_valied_from' => $fields['validity_from'][$key],
							'price_valied_to' => $fields['validity_to'][$key],
							'price_seat' => $fields['price_seat'][$key],
							'price_unit' => $fields['price_unit'][$key],
							'price_currency' => $fields['price_currency'][$key],
							'price_b2b' => $fields['price_3'][$key],
							'price_vat' => $fields['price_vat'][$key],
							'price_notes' => $fields['price_notes'][$key],
							'select_min' => $fields['select_min'][$key],
							'select_max' => $fields['select_max'][$key],
						];

						$this->productonsalespriceModel->insert($onsale_price_data3);
						$id_onsales_price = $this->productonsalespriceModel->getInsertID();
						$product_code = $this->productModel->getProductCode($fields['id_product']);
						$product_code_val = $product_code[0]->product_code;
						$sku = $product_code_val . "_" . $fields['onsales_code'] . "_" . $id_onsales_price;
						$data = [
							'SKU' => $sku
						];
						$this->productonsalespriceModel->update($id_onsales_price, $data);

						$onsale_price_data4 = [
							'id_onsales' => $fields['id_onsales'],
							'price_group' => $fields['price_group4'][$key],
							'price_for' =>  $value,
							'price_valied_from' => $fields['validity_from'][$key],
							'price_valied_to' => $fields['validity_to'][$key],
							'price_seat' => $fields['price_seat'][$key],
							'price_unit' => $fields['price_unit'][$key],
							'price_currency' => $fields['price_currency'][$key],
							// 'price_b2c' => $fields['price_b2c'][$key],
							'price_b2b' => $fields['price_4'][$key],
							'price_vat' => $fields['price_vat'][$key],
							'price_notes' => $fields['price_notes'][$key],
							'select_min' => $fields['select_min'][$key],
							'select_max' => $fields['select_max'][$key],
						];

						$this->productonsalespriceModel->insert($onsale_price_data4);
						$id_onsales_price = $this->productonsalespriceModel->getInsertID();
						$product_code = $this->productModel->getProductCode($fields['id_product']);
						$product_code_val = $product_code[0]->product_code;
						$sku = $product_code_val . "_" . $fields['onsales_code'] . "_" . $id_onsales_price;
						$data = [
							'SKU' => $sku
						];
						$this->productonsalespriceModel->update($id_onsales_price, $data);

						$onsale_price_data5 = [
							'id_onsales' => $fields['id_onsales'],
							'price_group' => $fields['price_group5'][$key],
							'price_for' => $value,
							'price_valied_from' => $fields['validity_from'][$key],
							'price_valied_to' => $fields['validity_to'][$key],
							'price_seat' => $fields['price_seat'][$key],
							'price_b2b' => $fields['price_5'][$key],
							'price_vat' => $fields['price_vat'][$key],
							'price_unit' => $fields['price_unit'][$key],
							'price_currency' => $fields['price_currency'][$key],
							'price_notes' => $fields['price_notes'][$key],
							'select_min' => $fields['select_min'][$key],
							'select_max' => $fields['select_max'][$key],
						];

						$this->productonsalespriceModel->insert($onsale_price_data5);
						$id_onsales_price = $this->productonsalespriceModel->getInsertID();
						$product_code = $this->productModel->getProductCode($fields['id_product']);
						$product_code_val = $product_code[0]->product_code;
						$sku = $product_code_val . "_" . $fields['onsales_code'] . "_" . $id_onsales_price;
						$data = [
							'SKU' => $sku
						];
						$this->productonsalespriceModel->update($id_onsales_price, $data);
					}
				}
			} else {

				foreach ($fields['price_for'] as $key => $value) {

					$onsale_price_data3 = [
						'price_group' => $fields['price_group3'][$key],
						'price_for' => $value,
						'price_valied_from' => $fields['validity_from'][$key],
						'price_valied_to' => $fields['validity_to'][$key],
						'price_seat' => $fields['price_seat'][$key],
						'price_unit' => $fields['price_unit'][$key],
						// 'price_currency' => $fields['price_currency'][$key],
						// 'price_b2c' => $fields['price_b2c'][$key],
						'price_b2b' => $fields['price_3'][$key],
						'price_vat' => $fields['price_vat'][$key],
						'price_notes' => $fields['price_notes'][$key],
						'select_min' => $fields['select_min'][$key],
						'select_max' => $fields['select_max'][$key],
					];

					$this->productonsalespriceModel->update($fields['id_price_3'][$key], $onsale_price_data3);


					$onsale_price_data4 = [
						'price_group' => $fields['price_group4'][$key],
						'price_for' => $value,
						'price_valied_from' => $fields['validity_from'][$key],
						'price_valied_to' => $fields['validity_to'][$key],
						'price_seat' => $fields['price_seat'][$key],
						'price_unit' => $fields['price_unit'][$key],
						// 'price_currency' => $fields['price_currency'][$key],
						// 'price_b2c' => $fields['price_b2c'][$key],
						'price_b2b' => $fields['price_4'][$key],
						'price_vat' => $fields['price_vat'][$key],
						'price_notes' => $fields['price_notes'][$key],
						'select_min' => $fields['select_min'][$key],
						'select_max' => $fields['select_max'][$key],
					];

					$this->productonsalespriceModel->update($fields['id_price_4'][$key], $onsale_price_data4);




					$onsale_price_data5 = [
						'price_group' => $fields['price_group5'][$key],
						'price_for' => $value,
						'price_valied_from' => $fields['validity_from'][$key],
						'price_valied_to' => $fields['validity_to'][$key],
						'price_seat' => $fields['price_seat'][$key],
						'price_b2b' => $fields['price_5'][$key],
						'price_vat' => $fields['price_vat'][$key],
						'price_unit' => $fields['price_unit'][$key],
						// 'price_currency' => $fields['price_currency'][$key],
						'price_notes' => $fields['price_notes'][$key],
						'select_min' => $fields['select_min'][$key],
						'select_max' => $fields['select_max'][$key],
					];

					$this->productonsalespriceModel->update($fields['id_price_5'][$key], $onsale_price_data5);
				}









				// 	// 	if ($this->productonsalespriceModel->insert($onsale_price_data3)) {	
				// 	// } else {

				// 	// 	$response['success'] = false;
				// 	// 	$response['messages'] = lang("App.insert-error");
				// 	// }
				// 	// $onsale_price_data4 = [
				// 	// 	'id_onsales' => $id_onsales,
				// 	// 	'price_group' => $value,
				// 	// 	'price_for' => $fields['price_3'][$key + 1],
				// 	// 	'price_valied_from' => $fields['validity_from'][$key],
				// 	// 	'price_valied_to' => $fields['validity_to'][$key],
				// 	// 	'price_seat' => $fields['price_seat'][$key],
				// 	// 	'price_b2c' => $fields['price_b2c'][$key],
				// 	// 	'price_b2b' => $fields['price_b2c'][$key],
				// 	// 	'price_vat' => $fields['price_vat'][$key],
				// 	// 	'price_notes' => $fields['price_notes'][$key],
				// 	// 	'select_min' => $fields['select_min'],
				// 	// 	'select_max' => $fields['select_max'],
				// 	// ];
				// 	// if ($this->productonsalespriceModel->insert($onsale_price_data)) {

				// 	// 	$response['success'] = true;
				// 	// 	$response['messages'] = lang("App.insert-success");
				// 	// } else {

				// 	// 	$response['success'] = false;
				// 	// 	$response['messages'] = lang("App.insert-error");
				// 	// }

			}
			$response['success'] = true;
			$response['messages'] = lang("App.insert-success");
		}
		return $this->response->setJSON($response);
		// }

	}



	//------------------------	
	public function add()
	{
		$response = array();
		$fields['id'] = $this->request->getPost('id');
		$fields['id_product'] = $this->request->getPost('id_product');
		$fields['onsales_code'] = $this->request->getPost('onsales_code');
		$fields['onsales_name'] = $this->request->getPost('onsales_name');
		$fields['onsales_info'] = $this->request->getPost('onsales_info');
		$fields['date_from'] = $this->request->getPost('date_from');
		$fields['date_ends'] = $this->request->getPost('date_ends');
		$fields['time_cutoff'] = $this->request->getPost('time_cutoff');
		$fields['onsales_slot'] = $this->request->getPost('onsales_slot');
		$fields['onsales_over'] = $this->request->getPost('onsales_over');
		$fields['file_b2b'] = $this->request->getPost('file_b2b');
		$fields['id_sale'] = $this->request->getPost('id_sale');
		$fields['id_op'] = $this->request->getPost('id_op');
		$fields['onsales_status'] = $this->request->getPost('onsales_status');




		$this->validation->setRules([
			'id_product' => ['label' => 'Id product', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_code' => ['label' => 'Onsales code', 'rules' => 'required|min_length[0]|max_length[100]'],
			'onsales_name' => ['label' => 'Onsales name', 'rules' => 'required|min_length[0]|max_length[250]'],
			'onsales_info' => ['label' => 'Onsales info', 'rules' => 'permit_empty|min_length[0]'],
			'onsales_style' => ['label' => 'Onsales style', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'date_from' => ['label' => 'Date from', 'rules' => 'permit_empty|valid_date|min_length[0]'],
			'date_ends' => ['label' => 'Date ends', 'rules' => 'permit_empty|valid_date|min_length[0]'],
			'time_cutoff' => ['label' => 'Time cutoff', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_slot' => ['label' => 'Onsales slot', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_over' => ['label' => 'Onsales over', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'file_b2b' => ['label' => 'File b2b', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'file_b2c' => ['label' => 'File b2c', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'pick_up' => ['label' => 'Pick up', 'rules' => 'permit_empty|min_length[0]'],
			'drop_off' => ['label' => 'Drop off', 'rules' => 'permit_empty|min_length[0]'],
			'id_sale' => ['label' => 'Id sale', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'id_op' => ['label' => 'Id op', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_status' => ['label' => 'Onsales status', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'created_by' => ['label' => 'Created by', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'created_on' => ['label' => 'Created on', 'rules' => 'required|valid_date|min_length[0]'],
			'update_on' => ['label' => 'Update on', 'rules' => 'required|valid_date|min_length[0]'],
			'deleted' => ['label' => 'Deleted', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
			'deleted_by' => ['label' => 'Deleted by', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'deleted_on' => ['label' => 'Deleted on', 'rules' => 'permit_empty|valid_date|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->productonsalesModel->insert($fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.insert-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.insert-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['id_product'] = $this->request->getPost('id_product');
		$fields['onsales_code'] = $this->request->getPost('onsales_code');
		$fields['onsales_name'] = $this->request->getPost('onsales_name');
		$fields['onsales_info'] = $this->request->getPost('onsales_info');
		$fields['onsales_style'] = $this->request->getPost('onsales_style');
		$fields['date_from'] = $this->request->getPost('date_from');
		$fields['date_ends'] = $this->request->getPost('date_ends');
		$fields['time_cutoff'] = $this->request->getPost('time_cutoff');
		$fields['onsales_slot'] = $this->request->getPost('onsales_slot');
		$fields['onsales_over'] = $this->request->getPost('onsales_over');
		$fields['file_b2b'] = $this->request->getPost('file_b2b');
		$fields['file_b2c'] = $this->request->getPost('file_b2c');
		$fields['pick_up'] = $this->request->getPost('pick_up');
		$fields['drop_off'] = $this->request->getPost('drop_off');
		$fields['id_sale'] = $this->request->getPost('id_sale');
		$fields['id_op'] = $this->request->getPost('id_op');
		$fields['onsales_status'] = $this->request->getPost('onsales_status');
		$fields['created_by'] = $this->request->getPost('created_by');
		$fields['created_on'] = $this->request->getPost('created_on');
		$fields['update_on'] = $this->request->getPost('update_on');
		$fields['deleted'] = $this->request->getPost('deleted');
		$fields['deleted_by'] = $this->request->getPost('deleted_by');
		$fields['deleted_on'] = $this->request->getPost('deleted_on');


		$this->validation->setRules([
			'id_product' => ['label' => 'Id product', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_code' => ['label' => 'Onsales code', 'rules' => 'required|min_length[0]|max_length[100]'],
			'onsales_name' => ['label' => 'Onsales name', 'rules' => 'required|min_length[0]|max_length[250]'],
			'onsales_info' => ['label' => 'Onsales info', 'rules' => 'permit_empty|min_length[0]'],
			'onsales_style' => ['label' => 'Onsales style', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'date_from' => ['label' => 'Date from', 'rules' => 'permit_empty|valid_date|min_length[0]'],
			'date_ends' => ['label' => 'Date ends', 'rules' => 'permit_empty|valid_date|min_length[0]'],
			'time_cutoff' => ['label' => 'Time cutoff', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_slot' => ['label' => 'Onsales slot', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_over' => ['label' => 'Onsales over', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'file_b2b' => ['label' => 'File b2b', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'file_b2c' => ['label' => 'File b2c', 'rules' => 'permit_empty|min_length[0]|max_length[250]'],
			'pick_up' => ['label' => 'Pick up', 'rules' => 'permit_empty|min_length[0]'],
			'drop_off' => ['label' => 'Drop off', 'rules' => 'permit_empty|min_length[0]'],
			'id_sale' => ['label' => 'Id sale', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'id_op' => ['label' => 'Id op', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'onsales_status' => ['label' => 'Onsales status', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'created_by' => ['label' => 'Created by', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'created_on' => ['label' => 'Created on', 'rules' => 'required|valid_date|min_length[0]'],
			'update_on' => ['label' => 'Update on', 'rules' => 'required|valid_date|min_length[0]'],
			'deleted' => ['label' => 'Deleted', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[1]'],
			'deleted_by' => ['label' => 'Deleted by', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
			'deleted_on' => ['label' => 'Deleted on', 'rules' => 'permit_empty|valid_date|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->productonsalesModel->update($fields['id'], $fields)) {

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

			if ($this->productonsalesModel->where('id', $id)->delete()) {

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
