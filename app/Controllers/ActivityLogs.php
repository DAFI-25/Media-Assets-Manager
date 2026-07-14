<?php

namespace App\Controllers;

use App\Models\ActivityLogModel;


class ActivityLogs extends BaseController
{

    protected $activityModel;


    public function __construct()
    {

        $this->activityModel = new ActivityLogModel();

    }



    public function index()
    {

        if (!session()->get('logged_in')) {

            return redirect()->to('/login');

        }



        $data = [

            'title' => 'Activity Log',

            'logs' => $this->activityModel
                ->orderBy('created_at','DESC')
                ->findAll()

        ];



        return view(
            'activity_logs/index',
            $data
        );

    }


}