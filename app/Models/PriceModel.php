<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class PriceModel extends Model
{

	protected $table = 'erp_product_onsales_price';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['id_onsales', 'price_group', 'price_group_name', 'SKU', 'price_for', 'price_unit', 'price_currency', 'price_b2c', 'price_b2b', 'price_vat', 'price_valied_from', 'price_valied_to', 'price_seat', 'price_type', 'price_notes', 'active', 'created_by', 'update_on'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;

	// public function getOnSalesPrice($id_onsales){		
	// 		$db = db_connect();	
	// 		$result = $db->query("SELECT * FROM `erp_product_onsales_price` as p WHERE p.id_onsales = '".$id_onsales."'" )->getResult();
	// //		$result= $resultsql->getResultArray(); // do query
	// 	return $result;
	// }


	public function getOnSalesPrice($id_onsales)
	{
		$db = db_connect();
		$result = $db->query("
		SELECT
			price_group,
			DATE_FORMAT(price_valied_from, '%d-%b-%y') AS 'price_valied_from',
			DATE_FORMAT(price_valied_to, '%d-%b-%y') AS 'price_valied_to',
			MAX(CASE WHEN price_for = '2 pax' THEN price_b2b END) AS 'price_2_pax',
			MAX(CASE WHEN price_for = '3-4 pax' THEN price_b2b END) AS 'price_3_4_pax',
			MAX(CASE WHEN price_for = '5-6 pax' THEN price_b2b END) AS 'price_5_6_pax',
			MAX(CASE WHEN price_for = '7-8 pax' THEN price_b2b END) AS 'price_7_8_pax',
			MAX(CASE WHEN price_for = '9-10 pax' THEN price_b2b END) AS 'price_9_10_pax',
			MAX(CASE WHEN price_for = '11-14 pax' THEN price_b2b END) AS 'price_11_14_pax',
			MAX(CASE WHEN price_for = 'Single Supp ADD' THEN price_b2b END) AS 'price_supp_add',
			MAX(price_vat) AS 'price_vat',
            MAX(price_seat) AS 'price_seat',
			MAX(price_unit) AS 'price_unit',
			MAX(price_notes) AS 'price_notes'
		FROM
			erp_product_onsales_price 
		WHERE
			id_onsales = '" . $id_onsales . "'
		GROUP BY
			 price_group, DATE_FORMAT(price_valied_from, '%d%m%y'), DATE_FORMAT(price_valied_to, '%d%m%y')
		ORDER BY
			price_group;
	")->getResult();

		// Return the result
		return $result;
	}
	public function getOnSalesPrice_PriceGroup($id_onsales)
	{
		$db = db_connect();
		$result = $db->query("
SELECT
    id_onsales,
    price_for,
	DATE_FORMAT(price_valied_from, '%Y-%m-%d') AS 'price_valied_from',
	DATE_FORMAT(price_valied_to, '%Y-%m-%d') AS 'price_valied_to',
    MAX(CASE WHEN price_group = '3*' THEN price_b2b END) AS 'price_3',
    MAX(CASE WHEN price_group = '4*' THEN price_b2b END) AS 'price_4',
    MAX(CASE WHEN price_group = '5*' THEN price_b2b END) AS 'price_5',
    MAX(CASE WHEN price_group = '3*' THEN id END) AS 'id_price_3',
    MAX(CASE WHEN price_group = '4*' THEN id END) AS 'id_price_4',
    MAX(CASE WHEN price_group = '5*' THEN id END) AS 'id_price_5',
    MAX(price_vat) AS 'price_vat',
    MAX(price_seat) AS 'price_seat',
    MAX(select_min) AS 'select_min',
    MAX(select_max) AS 'select_max',
    MAX(price_notes) AS 'price_notes',
    MAX(price_unit) AS 'price_unit'
FROM
    erp_product_onsales_price 
WHERE
    id_onsales = '" . $id_onsales . "'
GROUP BY
    price_for,  DATE_FORMAT(price_valied_from, '%d%m%y'), DATE_FORMAT(price_valied_to, '%d%m%y')
ORDER BY
    CASE
        WHEN price_for = '2 pax' THEN 1
        WHEN price_for = '3-4 pax' THEN 2
        WHEN price_for = '5-6 pax' THEN 3
        WHEN price_for = '7-8 pax' THEN 4
        WHEN price_for = '9-10 pax' THEN 5
        WHEN price_for = '11-14 pax' THEN 6
        WHEN price_for = 'Single Supp ADD' THEN 7
    END,DATE_FORMAT(price_valied_from, '%d%m%y'), DATE_FORMAT(price_valied_to, '%d%m%y');
	
	")->getResult();

		// Return the result
		return $result;
	}
}
