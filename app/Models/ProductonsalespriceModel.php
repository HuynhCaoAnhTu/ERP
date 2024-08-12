<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ProductonsalespriceModel extends Model {
    
	protected $table = 'erp_product_onsales_price';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_onsales','uuid_group', 'price_group', 'price_group_name', 'SKU', 'price_for', 'price_unit', 'price_currency', 'price_b2c', 'price_b2b', 'price_vat', 'price_valied_from', 'price_valied_to', 'price_seat', 'select_min', 'select_max', 'price_type', 'price_notes', 'id_pax2', 'id_pax34', 'id_pax56', 'id_pax78', 'id_pax910', 'id_pax1114','active', 'created_by', 'update_on'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}