<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class OnsalesViewModel extends Model {
    
	protected $tbl_products = 'erp_product';
	protected $tbl_onsales = 'erp_product_onsales';
	
	function __construct() {
        //$this->proTable = 'products';
        
    } 
	
	public function getAll(){		
			$db = db_connect();
			$result = $db->query("SELECT * FROM erp_product")->getResult();
	//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
	public function getOutbound(){		
			$db = db_connect();
			$result = $db->query("SELECT * FROM erp_product")->getResult();
	//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
}