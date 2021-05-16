<?php

namespace App\Controllers;

class Ahome extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "SIK - Home",
            'head' => "Home"
        ];

        return view('admin/home/index', $data);
    }
}
