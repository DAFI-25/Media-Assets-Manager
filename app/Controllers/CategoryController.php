<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Categories',
            'categories' => $this->category->findAll()
        ];

        return view('categories/index', $data);
    }

    public function create()
    {
        $this->category->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/categories')
                         ->with('success','Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $this->category->update($id,[
            'name'=>$this->request->getPost('name'),
            'description'=>$this->request->getPost('description')
        ]);

        return redirect()->to('/categories')
                         ->with('success','Kategori berhasil diupdate');
    }

    public function delete($id)
    {
        $this->category->delete($id);

        return redirect()->to('/categories')
                         ->with('success','Kategori berhasil dihapus');
    }
}