<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use App\Models\FilesModel;
 
class FilesController extends BaseController
{
 
    public function index()
    {
        $fileUploadModel = new FilesModel();
        return view('erp_files', ['fileUploads' => $fileUploadModel->orderBy('created_at', 'asc')->findAll()]);
    }
 
    public function multipleUpload() 
    {
        helper(['erp_helper']);
		$filesUploaded = 0;
 
        if($this->request->getFileMultiple('fileuploads'))
        {
            $files = $this->request->getFileMultiple('fileuploads');
 
            foreach ($files as $file) {
 
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH.'uploads', $newName);
                    $data = [
                        'filename' => $file->getClientName(),
                        'filepath' => 'uploads/' . $newName,
                        'type' => $file->getClientExtension(),
						'filecategory' => ''
                    ];
                    $fileUploadModel = new FileUploadModel();
                    $fileUploadModel->save($data);
                    $filesUploaded++;
                }
                 
            }
 
        }
 
        if($filesUploaded <= 0) {
            return redirect()->back()->with('error', 'Choose files to upload.');
        }
 
        return redirect()->back()->with('success', $filesUploaded . ' File/s uploaded successfully.');
 
    }
}
?>