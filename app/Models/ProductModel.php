<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{

	protected $table = 'erp_product';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['product_code', 'product_name', 'product_categories', 'product_duration', 'product_travel_from', 'product_location', 'product_style', 'product_time', 'product_intro', 'product_desc', 'product_rules', 'product_images', 'product_lang', 'id_master', 'product_guide_lang', 'product_filter', 'product_priority', 'product_slugs', 'product_keywords', 'product_seo', 'product_status', 'update_on', 'created_by'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_on';
	protected $updatedField  = 'updated_on';
	protected $deletedField  = 'deleted_on';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;

	public function getAll()
	{
		$db = db_connect();
		$result = $db->query("SELECT p.id, p.product_code, p.product_name, t.value_en as product_duration, c.categories_name, (SELECT `location`.`location` FROM `location` WHERE `location`.`id_location` = p.product_travel_from LIMIT 1) as travel_from, (SELECT group_concat(`location`.`location` separator ', ') FROM `location` WHERE FIND_IN_SET(`location`.`id_location`, p.product_location)) as travel_to, p.product_lang, p.product_status, u.email as owner, p.update_on FROM `erp_product` p LEFT JOIN `erp_categories` c ON p.product_categories = c.id LEFT JOIN `erp_product_duration` t ON p.product_duration = t.id LEFT JOIN `erp_auth` u ON p.created_by = u.id_auth WHERE 1")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
	public function getProductCode($id)
	{
		$db = db_connect();
		$result = $db->query("SELECT `product_code` FROM `erp_product` WHERE `id`= '" . $id . "';")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
	public function getDuration($id)
	{
		$db = db_connect();
		$result = $db->query("SELECT `value_vi` FROM `erp_product_duration` WHERE `id`= '" . $id . "';")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}

	public function getCategory_Name($id)
	{
		$db = db_connect();
		$result = $db->query("SELECT `categories_name` FROM `erp_categories` WHERE `id`= '" . $id . "';")->getResult();
		//		$result= $resultsql->getResultArray(); // do query
		return $result;
	}
}
