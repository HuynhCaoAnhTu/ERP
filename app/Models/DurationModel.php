<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class DurationModel extends Model {
    
	protected $table = 'erp_product_duration';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['value_vi', 'value_en'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
	public function getDuration($lang){	
			$db = db_connect();
			
			if($lang=='vi'){
				$result = $db->query("SELECT `id`, `value_vi` as name FROM `erp_product_duration` ORDER BY value_vi DESC")->getResult();
			}else{
				$result = $db->query("SELECT `id`, `value_en` as name FROM `erp_product_duration` ORDER BY value_vi DESC")->getResult();
			}
			if ($result) {
				return $result;	
			}else{
				return False;
			}	
	}	
}