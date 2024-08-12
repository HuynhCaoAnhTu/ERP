<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class PriceTempModel extends Model {
    
	protected $table = 'erp_price_temp';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_onsales', 'price_group', 'price_group_name', 'SKU', 'price_for', 'price_unit', 'price_currency', 'price_vat', 'price_seat', 'select_min', 'select_max', 'price_type', 'price_notes'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    

	public function getTempOnsalePrice($id) {
		$db = db_connect();	
		$result = $db->query("SELECT * FROM `erp_price_temp` WHERE `id_onsales_temp`= '".$id."';")->getResult();
//		$result= $resultsql->getResultArray(); // do query
	return $result;
}
}
