<?php

namespace App\Controllers;


class Settings extends BaseController
{


    public function index()
    {

        if (!session()->get('logged_in')) {

            return redirect()->to('/login');

        }


        $data = [

            'title' => 'Settings',

            'app_name' => 'Media Asset Manager',

            'version' => '1.0.0',

            'developer' => 'Dafi Umar Faruq'

        ];


        return view(
            'settings/index',
            $data
        );

    }


}