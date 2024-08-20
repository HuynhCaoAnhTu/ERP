<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table            = 'erp_auth';
    protected $primaryKey       = 'id_auth';
	protected $allowedFields = [
        'name',
        'email',
		'tel',
        'password',
        'created_at',
		'update_at',
		'ostyle',
		'id_link',
		'uuid_auth'
    ];
	
	public function getOPS(){		
			$db = db_connect();	
			$result = $db->query("SELECT id_auth as id, email as name  FROM `erp_auth` WHERE uactive")->getResult();
	//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}

	public function getUserNameById($id){		
		$db = db_connect();	
		$result = $db->query("SELECT `email`  FROM `erp_auth` WHERE id_auth  = '".$id."' ")->getResult();
//		$result= $resultsql->getResultArray(); // do query
	return $result;
}
	
}
