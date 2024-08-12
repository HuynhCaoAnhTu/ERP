<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ErpuserModel extends Model {
    
	protected $table = 'erp_auth';
	protected $primaryKey = 'id_auth';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['uuid_auth', 'name', 'email', 'tel', 'password', 'id_link', 'creat_at', 'updated_at', 'uactive'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}