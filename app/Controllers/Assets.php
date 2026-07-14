<?php

namespace App\Controllers;

class Assets extends BaseController
{
    public function index()
    {
        return view('assets/index');
    }
}