<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model {
    
	protected $table = 'erp_categories';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['categories_group', 'id_master', 'categories_name', 'catelories_slug', 'categories_icon', 'categories_intro', 'lang', 'active'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
	
	public function getCategories($cgroup, $lang){	
		
			$db = db_connect();
			//$result = $db->query("SELECT id, categories_name as name FROM erp_categories WHERE active='1' AND categories_group='$cgroup' AND lang='$lang' order by categories_name")->getResult();
			$result = $db->query("SELECT parent.categories_name as master, child.categories_name as name, child.id FROM erp_categories AS parent LEFT JOIN erp_categories AS child ON child.id_master = parent.id WHERE child.id_master > 99 AND child.categories_group ='".$cgroup."' AND child.lang ='".$lang."' ORDER BY parent.id, child.id")->getResult();
			if ($result) {
				return $result;	
			}else{
				return False;
			}	
	}	
	
}