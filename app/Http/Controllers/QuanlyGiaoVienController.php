<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanlyGiaoVienController extends Controller
{
    public function index()
    {
        return view('quan-ly-giao-vien.index');
    }
}
