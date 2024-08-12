<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ObjModel extends Model {
    
	protected $table = 'obj_db';
	protected $primaryKey = 'obj_id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['ogroup', 'ostyle', 'ocode', 'oname', 'location_id', 'contact', 'tel', 'email', 'bday', 'company', 'tax', 'addr', 'accno', 'bank', 'swift', 'level', 'chanel', 'ofilter', 'notes', 'id_creat', 'id_update', 'created_at', 'updated_at', 'oactive'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
	
}