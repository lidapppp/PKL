<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SIK - Dashboard",
            'head' => "Welcome to Sistem Informasi Dinas Pertanian Lampung Utara"
        ];

        return view('admin/dashboard/index', $data);
    }
}
