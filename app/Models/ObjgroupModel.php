<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ObjgroupModel extends Model {
    
	protected $table = 'obj_group';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['gcode', 'gname', 'ogroup', 'masterid', 'autoid'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    

	public function getSCMname($gcode = false)
	{		
	$gcode = strtoupper($gcode);
		if ($this->validation->check($gcode, 'required|max_length[2]')) {
			$array = array(['gcode' => $gcode, 'ogroup' => 'SCM', 'masterid' => 0]);
			$where = "gcode = '$gcode' AND ogroup = 'SCM' AND masterid = 0";
			$result = $this->where($where)->first();
			if ($result) {
				return $result->gname;	
			}else{
				return False;
			}	
		} else {
			return False;
		}	
	}		
	
	public function getSCM($gcode = false)
	{		
	$gcode = strtoupper($gcode);
		if ($this->validation->check($gcode, 'required|max_length[2]')) {
			//$array = array(['gcode' => $gcode, 'ogroup' => 'SCM', 'masterid' => 0]);
			$where = "gcode = '$gcode' AND ogroup = 'SCM' AND masterid = 0";
			$result = $this->where($where)->first();
			if ($result) {
				return ['id' => $result->id, 'gname' =>$result->gname];	
			}else{
				return False;
			}	
		} else {
			return False;
		}	
	}
	
	public function getSCMautoid($gcode = false)
	{		
	$gcode = strtoupper($gcode);
		if ($this->validation->check($gcode, 'required|max_length[2]')) {
			$where = "gcode = '$gcode' AND ogroup = 'SCM' AND masterid = 0";
			$result = $this->where($where)->first();
			if ($result) {
				$this->set('autoid', $result->autoid+1)->where($where)->update();
				return $result->autoid;	
			}else{
				return False;
			}	
		} else {
			return False;
		}	
	}	
	
	public function getFilter($gcode = false){		
		$gcode = strtoupper($gcode);
		if ($this->validation->check($gcode, 'required|max_length[2]')) {
			$db = db_connect();
			$result = $db->query("SELECT id,gname as name FROM obj_group WHERE masterid<>0 AND gcode= '$gcode' order by gname")->getResult();
			return $result;
		}else{
			return False;
		}
	}	
	public function getCRMFilter(){		
			$db = db_connect();
			$result = $db->query('SELECT id,gname as name FROM obj_group WHERE ogroup="CRM" order by gname')->getResult();
			return $result;
	}	

}