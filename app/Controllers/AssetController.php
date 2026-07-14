<?php

namespace App\Controllers;

use App\Models\AssetModel;

class AssetController extends BaseController
{
   public function index()
{
    $assetModel = new \App\Models\AssetModel();
    $categoryModel = new \App\Models\CategoryModel();

    $data['assets'] = $assetModel
        ->select('assets.*, categories.name AS category_name')
        ->join('categories', 'categories.id = assets.category_id', 'left')
        ->findAll();

    $data['categories'] = $categoryModel->findAll();

    return view('assets/index', $data);
}

    public function upload()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'title' => 'required',
            'category_id' => 'required',
            'file' => [
                'label' => 'File',
                'rules' => 'uploaded[file]|max_size[file,10240]'
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()
                ->withInput()
                ->with('error', $validation->listErrors());
        }

        $file = $this->request->getFile('file');

        if (!$file->isValid()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'File tidak valid.');
        }

        // Pastikan folder upload ada
        $uploadPath = ROOTPATH . 'public/uploads/assets';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $newName = $file->getRandomName();

        $file->move($uploadPath, $newName);

        $assetModel = new AssetModel();

        $assetModel->save([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category_id' => $this->request->getPost('category_id'),
            'file_name'   => $newName,
            'file_path'   => 'uploads/assets/' . $newName,
            'file_type'   => $file->getClientMimeType(),
            'file_size'   => $file->getSize(),
            'uploaded_by' => session()->get('user_id') ?? 1
        ]);

        return redirect()->to('/media-assets')
            ->with('success', 'Asset berhasil diupload.');
    }

    public function download($id)
{
    $assetModel = new AssetModel();

    $asset = $assetModel->find($id);

    if (!$asset) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $filePath = FCPATH . $asset['file_path'];

    if (!file_exists($filePath)) {
        return redirect()->back()
            ->with('error', 'File tidak ditemukan.');
    }

    return $this->response->download(
        $filePath,
        null
    );
}
public function view($id)
{
    $assetModel = new AssetModel();

    $asset = $assetModel->find($id);

    if (!$asset) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    return view('assets/view', [
        'asset' => $asset
    ]);
}
public function delete($id)
{
    $assetModel = new AssetModel();

    $asset = $assetModel->find($id);

    if (!$asset) {
        return redirect()->to('/media-assets')
            ->with('error', 'Asset tidak ditemukan.');
    }

    // Hapus file fisik
    $filePath = FCPATH . $asset['file_path'];

    if (file_exists($filePath)) {
        unlink($filePath);
    }

    // Hapus data database
    $assetModel->delete($id);

    return redirect()->to('/media-assets')
        ->with('success', 'Asset berhasil dihapus.');
}
public function edit($id)
{
    $assetModel = new AssetModel();
    $categoryModel = new \App\Models\CategoryModel();

    $asset = $assetModel->find($id);

    if (!$asset) {
        return redirect()->to('/media-assets')
            ->with('error', 'Asset tidak ditemukan.');
    }

    return view('assets/edit', [
        'asset' => $asset,
        'categories' => $categoryModel->findAll()
    ]);
}
public function update($id)
{
    $assetModel = new AssetModel();

    $asset = $assetModel->find($id);

    if (!$asset) {
        return redirect()->to('/media-assets')
            ->with('error', 'Asset tidak ditemukan.');
    }

    $data = [
        'title'       => $this->request->getPost('title'),
        'description' => $this->request->getPost('description'),
        'category_id' => $this->request->getPost('category_id'),
    ];

    $file = $this->request->getFile('file');

    if ($file && $file->isValid() && !$file->hasMoved()) {

        $oldFile = FCPATH . $asset['file_path'];

        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        $newName = $file->getRandomName();

        $file->move(
            FCPATH . 'uploads/assets',
            $newName
        );

        $data['file_name'] = $newName;
        $data['file_path'] = 'uploads/assets/' . $newName;
        $data['file_type'] = $file->getClientMimeType();
        $data['file_size'] = $file->getSize();
    }

    $assetModel->update($id, $data);

    return redirect()->to('/media-assets')
        ->with('success', 'Asset berhasil diperbarui.');
}
}