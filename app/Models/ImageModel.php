<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{

    protected $table = 'images';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id_location', 'image_name', 'keyword', 'created_at'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;

    public function count_images()
    {
        // Truy vấn để đếm tổng số hình ảnh
        return $this->db->table('images')->countAllResults();
    }

    public function getAllImage()
    {
        $db = db_connect();
        $result = $db->query("SELECT * FROM `images` ORDER BY id DESC")->getResult();
        
        return $result;
    }

    public function get_images($limit, $offset)
    {
        // Truy vấn để lấy hình ảnh với phân trang
        return $this->db->table('images')
            ->limit($limit, $offset)
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();
    }
}
