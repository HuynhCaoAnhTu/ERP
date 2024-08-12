<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models\Category;
use CodeIgniter\Model;

class LocationModel extends Model {
    
	protected $table = 'location';
	protected $primaryKey = 'id_location';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['location', 'id_master'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;   
	
	public function getAll(){		
			$db = db_connect();
			$result = $db->query("SELECT a.id_location as id_location, a.location as location , b.location as country FROM location AS a LEFT JOIN location AS b ON a.id_master = b.id_location ORDER by b.location, a.location")->getResult();
	//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
	public function getAllLocation(){		
		if ( null === ($result= cache("location"))){
			$db = db_connect();
			$result = $db->query("SELECT a.id_location as id, concat_ws(', ',a.location, b.location) as name FROM location AS a LEFT JOIN location AS b ON a.id_master = b.id_location ORDER by b.location, a.location")->getResult();
	//		$result= $resultsql->getResultArray(); // do query
			cache()->save("location", $result, 300); //save to cache
		}
		return $result;
	}
	public function getAllCountry(){		
			$db = db_connect();
			$result = $db->query("SELECT id_location as id, location as name FROM location WHERE id_master = 0 ORDER by id_location")->getResult();
		return $result;
	}
}