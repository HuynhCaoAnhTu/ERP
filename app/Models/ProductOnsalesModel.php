<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class ProductonsalesModel extends Model
{

	protected $table = 'erp_product_onsales';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_product', 'uuid_group', 'onsales_code', 'onsales_name', 'onsales_info', 'onsales_style', 'date_from', 'date_ends', 'time_cutoff', 'onsales_slot', 'onsales_over', 'file_b2b', 'file_b2c', 'pick_up', 'drop_off', 'id_sale', 'id_op', 'onsales_status', 'created_by', 'created_on', 'update_on', 'deleted', 'deleted_by', 'deleted_on'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;


	public function getOnSales($id_product)
	{
		$db = db_connect();
		$result = $db->query("SELECT o.id, o.onsales_code, o.onsales_name, o.onsales_info, o.onsales_style, o.date_from, o.date_ends, o.time_cutoff, o.onsales_slot, o.onsales_over, o.file_b2b, o.file_b2b,o.pick_up, o.drop_off, o.id_sale, o.id_op, o.onsales_status, o.created_by, o.update_on FROM erp_product_onsales as o WHERE o.id_product = '" . $id_product . "' AND o.deleted = false ORDER BY 
    o.id DESC;")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}


	public function getOnSalesInfor($id_onsales)
	{
		$db = db_connect();
		$result = $db->query("SELECT 
    osp.*,
    p2.price AS price_pax2,
    p34.price AS price_pax34,
    p56.price AS price_pax56,
    p78.price AS price_pax78,
    p910.price AS price_pax910,
    p1114.price AS price_pax1114
FROM 
    erp_product_onsales_price AS osp
JOIN 
    pax2 AS p2 ON osp.id_pax2 = p2.id
JOIN 
    pax34 AS p34 ON osp.id_pax34 = p34.id
JOIN 
    pax56 AS p56 ON osp.id_pax56 = p56.id
JOIN 
    pax78 AS p78 ON osp.id_pax78 = p78.id
JOIN 
    pax910 AS p910 ON osp.id_pax910 = p910.id
JOIN 
    pax1114 AS p1114 ON osp.id_pax1114 = p1114.id
WHERE 
    osp.id_onsales  = '" . $id_onsales . "';")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
}
