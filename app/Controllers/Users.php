<?php

namespace App\Controllers;

use App\Models\UserModel;


class Users extends BaseController
{

    protected $userModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
    }



    public function index()
    {

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }


        $data = [

            'title' => 'User Management',

            'users' => $this->userModel->findAll()

        ];


        return view('users/index', $data);

    }



    public function create()
    {

        return view('users/create', [

            'title' => 'Tambah User'

        ]);

    }




    public function store()
    {


        $this->userModel->insert([

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),
            

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'role' => $this->request->getPost('role')

        ]);



        session()->setFlashdata(
            'success',
            'User berhasil ditambahkan'
        );


        return redirect()->to('/users');

    }




    public function edit($id)
    {


        $data = [

            'title' => 'Edit User',

            'user' => $this->userModel->find($id)

        ];


        return view('users/edit', $data);

    }





    public function update($id)
    {


        $data = [

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'role' => $this->request->getPost('role')

        ];



        if ($this->request->getPost('password')) {

            $data['password'] = password_hash(

                $this->request->getPost('password'),

                PASSWORD_DEFAULT

            );

        }



        $this->userModel->update($id, $data);



        session()->setFlashdata(
            'success',
            'User berhasil diperbarui'
        );


        return redirect()->to('/users');

    }





    public function delete($id)
    {


        $this->userModel->delete($id);


        session()->setFlashdata(
            'success',
            'User berhasil dihapus'
        );


        return redirect()->to('/users');

    }


}