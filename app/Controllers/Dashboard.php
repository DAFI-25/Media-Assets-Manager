<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\CategoryModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Cek login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }


        $assetModel = new AssetModel();
        $categoryModel = new CategoryModel();
        $userModel = new UserModel();


        // ==========================
        // TOTAL DATA
        // ==========================

        $totalAssets = $assetModel->countAll();

        $totalCategories = $categoryModel->countAll();

        $totalUsers = $userModel->countAll();



        // ==========================
        // STORAGE
        // ==========================

        $storageBytes = $assetModel->getTotalStorage();


        // Convert Bytes ke MB / GB
        if ($storageBytes >= 1073741824) {

            $storageUsed = round(
                $storageBytes / 1073741824,
                2
            ) . ' GB';

        } else {

            $storageUsed = round(
                $storageBytes / 1048576,
                2
            ) . ' MB';

        }



        // Kapasitas default S3/local storage
        $storageLimitBytes = 10 * 1024 * 1024 * 1024; // 10GB


        $storagePercentage = round(
            ($storageBytes / $storageLimitBytes) * 100,
            2
        );


        if ($storagePercentage > 100) {
            $storagePercentage = 100;
        }



        // ==========================
        // RECENT ASSETS
        // ==========================

       $recentAssets = $assetModel->getRecentAssets(5);



        // ==========================
        // DATA VIEW
        // ==========================

        return view('dashboard/index', [

            'title' => 'Dashboard',


            // Statistik
            'totalAssets' => $totalAssets,

            'totalCategories' => $totalCategories,

            'totalUsers' => $totalUsers,


            // Storage
            'storageUsed' => $storageUsed,

            'storagePercentage' => $storagePercentage,

            'storageLimit' => '10 GB',


            // Table
            'recentAssets' => $recentAssets

        ]);
    }
}