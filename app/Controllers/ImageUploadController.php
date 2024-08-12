<?php

namespace App\Controllers;

use App\Models\ImageModel;
use CodeIgniter\Controller;
use App\Models\Category\LocationModel;

class ImageUploadController extends Controller
{
    protected $locationModel;
    protected $imagesModel;
    protected $validation;

    public function __construct()
    {
        $this->imagesModel = new ImageModel();
        $this->locationModel = new LocationModel();
        $this->validation =  \Config\Services::validation();
    }
    public function index()
    {
        $data = [
            'sitetitle'    => 'ERP Travel',
            'pagetitle'    => 'ERP/Images',
            'pagetitle_mobile'    => 'Images',
            'controller'    => 'images',
            'title'             => 'Image'
        ];
        return view('upload_view', $data); // Tên view của bạn
    }

    // public function upload()
    // {
    //     $response = [];
    //     $data = [];

    //     // Lấy các tệp từ yêu cầu
    //     $files = $this->request->getFiles();

    //     // Lấy các vị trí và đảm bảo chúng là một mảng
    //     $locations = $this->request->getPost('locations');
    //     if (is_array($locations)) {
    //         $locationsString = implode(',', $locations); // Chuyển đổi mảng thành chuỗi
    //     } elseif (is_string($locations)) {
    //         $locationsString = $locations; // Nếu đã là chuỗi
    //     }

    //     // Kiểm tra nếu có tệp nào được gửi không
    //     if (isset($files['images']) && is_array($files['images'])) {
    //         $uploadedFiles = $files['images'];

    //         foreach ($uploadedFiles as $file) {
    //             if ($file->isValid() && !$file->hasMoved()) {
    //                 $imageName = $file->getRandomName(); // Tạo tên ngẫu nhiên cho tệp
    //                 $file->move(WRITEPATH . 'uploads', $imageName); // Di chuyển tệp đến thư mục uploads

    //                 $data = [
    //                     'id_location' => $locationsString, // Chuyển đổi mảng thành chuỗi
    //                     'image_name' => $imageName,
    //                     'created_at' => date('Y-m-d H:i:s')
    //                 ];

    //                 $this->imagesModel->insert($data);
    //             }
    //         }
    //     }

    //     $this->validation->setRules([
    //         'id_location' => ['label' => 'id_location', 'rules' => 'required|min_length[0]|max_length[11]'],
    //         'image_name' => ['label' => 'Image name', 'rules' => 'required|min_length[0]|max_length[255]'],
    //     ]);

    //     if ($this->validation->run($data) == FALSE) {
    //         $response['success'] = false;
    //         $response['messages'] = $this->validation->getErrors();
    //     } else {
    //         if ($this->imagesModel->insert($data)) {
    //             $response['success'] = true;
    //             $response['messages'] = lang("App.insert-success");
    //         } else {
    //             $response['success'] = false;
    //             $response['messages'] = lang("App.insert-error");
    //         }
    //     }

    //     return $this->response->setJSON($response);
    // }
    public function upload()
    {
        $response = array();
        $dataList = []; // Array to hold information for all files
        $files = $this->request->getFiles();
        $locations = $this->request->getPost('product_location');
        $keyword = $this->request->getPost('keyword');
        $location['product_location'] = json_encode($locations);
    
        // Check if any files were sent
        if (isset($files['images']) && is_array($files['images'])) {
            $uploadedFiles = $files['images'];
    
            foreach ($uploadedFiles as $file) {
                // Check if the file is valid and has not been moved
                if ($file->isValid() && !$file->hasMoved()) {
                    $fileName = $file->getName();
                    $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $imageName = $fileNameWithoutExtension . '_' . $keyword . '.' . $fileExtension;
                    // Move the file to the uploads directory
                    $file->move(FCPATH . 'uploads', $imageName);
    
                    // Add file info to the dataList array
                    $dataList[] = [
                        'id_location' => $location['product_location'],
                        'image_name' => $imageName,
                        'keyword' => $keyword,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                }
            }

            // Thêm tất cả các bản ghi vào cơ sở dữ liệu
            foreach ($dataList as $data) {
                $this->validation->setRules([
                    'id_location' => ['label' => 'id_location', 'rules' => 'required|min_length[0]|max_length[50]'],
                    'image_name' => ['label' => 'Image name', 'rules' => 'required|min_length[0]|max_length[255]'],
                    'keyword' => ['label' => 'keyword', 'rules' => 'min_length[0]|max_length[50]'],
                ]);

                if ($this->validation->run($data) == FALSE) {
                    $response['success'] = false;
                    $response['messages'] = $this->validation->getErrors(); // Hiển thị lỗi trong biểu mẫu
                    return $this->response->setJSON($response); // Trả về phản hồi với lỗi và dừng
                } else {
                    if (!$this->imagesModel->insert($data)) {
                        $response['success'] = false;
                        $response['messages'] = lang("App.insert-error");
                        return $this->response->setJSON($response); // Trả về phản hồi với lỗi và dừng
                    }
                }
            }

            // Nếu tất cả các bản ghi được chèn thành công
            $response['success'] = true;
            $response['messages'] = lang("App.insert-success");
        } else {
            $response['success'] = false;
            $response['messages'] = "No files were uploaded.";
        }

        return $this->response->setJSON($response);
    }


    public function getData()
    {
        $response = array();
        //Get location
        $data['location'] = $this->locationModel->getAllLocation(); //load from DB	
        return $this->response->setJSON($data);
    }

    public function getAll()
    {
        $response = $data['data'] = array();

        $result = $this->imagesModel->getAllImage();
        $data['location'] = $this->locationModel->getAllLocation(); //load from DB	
        $baseURL = base_url();
        foreach ($result as $key => $value) {
            $imgPath = $baseURL  . 'uploads/' . $value->image_name;
            $image = '<img src="' . $imgPath . '" alt="Description of image" width="200" height="200">';
            $ops = '<div class="btn-group">';
            $ops .= '<button type="button" class=" btn btn-sm dropdown-toggle btn-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
            $ops .= '<i class="fa-solid fa-pen-square"></i>  </button>';
            $ops .= '<div class="dropdown-menu">';
            $ops .= '<a class="dropdown-item text-info" onClick="save(' . $value->id . ')"><i class="fa-solid fa-pen-to-square"></i>   ' .  lang("App.edit")  . '</a>';
            $ops .= '<a class="dropdown-item text-orange" ><i class="fa-solid fa-copy"></i>   ' .  lang("App.copy")  . '</a>';
            $ops .= '<div class="dropdown-divider"></div>';
            $ops .= '<a class="dropdown-item text-danger" onClick="remove(' . $value->id . ')"><i class="fa-solid fa-trash"></i>   ' .  lang("App.delete")  . '</a>';
            $ops .= '</div></div>';
            $idsToConvertJson = $value->id_location;

            // Phân tích chuỗi JSON thành mảng
            $idsToConvert = json_decode($idsToConvertJson, true);

            // Tạo một mảng để tra cứu tên theo ID
            $idToNameMap = array_column($data['location'], 'name', 'id');

            // Chuyển đổi mảng ID thành tên
            $names = array_map(function ($id) use ($idToNameMap) {
                return $idToNameMap[$id];
            }, $idsToConvert);
            $data['data'][$key] = array(
                $value->id,
                $names,
                $image,

                $value->image_name,
                $value->keyword,
                $ops
            );
        }

        return $this->response->setJSON($data);
    }

    public function getOne()
    {
        $response = array();

        $id = $this->request->getPost('id');

        if ($this->validation->check($id, 'required|numeric')) {

            $data['image'] = $this->imagesModel->where('id', $id)->first();
            $this->locationModel = new LocationModel();
            $data['location'] = $this->locationModel->getAllLocation(); //load from DB

            return $this->response->setJSON($data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function add()
    {
        $response = array();
        $data = [];
        // Lấy các tệp từ yêu cầu
        $files = $this->request->getFiles();
        $location['product_location'] = json_encode($this->request->getPost('product_location'));
        // Kiểm tra nếu có tệp nào được gửi không
        if (isset($files['images']) && is_array($files['images'])) {
            $uploadedFiles = $files['images'];

            foreach ($uploadedFiles as $file) {
                // Kiểm tra nếu tệp hợp lệ và chưa được di chuyển
                if ($file->isValid() && !$file->hasMoved()) {
                    $imageName = $file->getRandomName(); // Tạo tên ngẫu nhiên cho tệp
                    $file->move(FCPATH  . 'uploads', $imageName); // Di chuyển tệp đến thư mục uploads

                    $data = [
                        'id_location' => $location['product_location'],
                        'image_name' => $imageName,
                        'created_at' => date('Y-m-d H:i:s')
                    ];
                }
            }
        }

        $this->validation->setRules([
            'id_location' => ['label' => 'id_location', 'rules' => 'required|min_length[0]|max_length[11]'],
            'image_name' => ['label' => 'Image name', 'rules' => 'required|min_length[0]|max_length[255]'],
            'keyword' => ['label' => 'keyword', 'rules' => 'min_length[0]|max_length[50]'],
        ]);

        if ($this->validation->run($data) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

        } else {

            if ($this->imagesModel->insert($data)) {

                $response['success'] = true;
                $response['messages'] = lang("App.insert-success");
            } else {

                $response['success'] = false;
                $response['messages'] = lang("App.insert-error");
            }
        }
        return $this->response->setJSON($data);
    }

    public function edit()
    {
       
        $fields['id'] = $this->request->getPost('id');
        $fields['id_location'] = json_encode($this->request->getPost('product_location'));
        $fields['keyword'] = $this->request->getPost('keyword');

        $this->validation->setRules([
            'id_location' => ['label' => 'id_location', 'rules' => 'required|min_length[0]|max_length[50]'],
            'keyword' => ['label' => 'keyword', 'rules' => 'min_length[0]|max_length[50]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

        } else {

            if ($this->imagesModel->update($fields['id'], $fields)) {

                $response['success'] = true;
                $response['messages'] = lang("App.update-success");
            } else {

                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
            }
        }

        return $this->response->setJSON($response);
    }

    public function remove()
    {
        $response = array();

        $id = $this->request->getPost('id');

        if (!$this->validation->check($id, 'required|numeric')) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        } else {

            if ($this->imagesModel->where('id', $id)->delete()) {

                $response['success'] = true;
                $response['messages'] = lang("App.delete-success");
            } else {

                $response['success'] = false;
                $response['messages'] = lang("App.delete-error");
            }
        }

        return $this->response->setJSON($response);
    }
}
