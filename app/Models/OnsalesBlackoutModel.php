<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class OnsalesBlackoutModel extends Model
{

	protected $table = 'erp_onsales_blackout';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_onsales', 'blackout_name', 'blackout_from', 'blackout_to', 'blackout_notes'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;


	public function getBlackouts($id)
	{
		$builder = $this->builder();
		$builder->select("id, id_onsales, blackout_name, blackout_to, 
                          DATE_FORMAT(blackout_from, '%d-%b-%y') AS blackout_from,
                          DATE_FORMAT(blackout_to, '%d-%b-%y') AS blackout_to");
		$builder->where('id_onsales', $id);

		$query = $builder->get();
		return $query->getResult();
	}

	public function getBlackoutTemp()
	{
		$db = db_connect();
		$result = $db->query("SELECT * FROM `blackout_temp`")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
	public function getTempOnsaleBlackout($id)
	{
		$db = db_connect();
		$result = $db->query("SELECT * FROM `erp_onsales_blackout` WHERE `id_blackout_temp`= '" . $id . "';")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
}
