<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NamHocController extends Controller
{
    public function index(Type $var = null)
    {
        return view('nam-hoc.index');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|unique:nam_hoc|max:191',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
        ], [
            'required' => 'Hãy nhập',
            'name.unique' => ' đã có',
            'start_date.before' => 'nhap nho hon',
            'end_date.after' => 'nhap lon hon',
        ]);
    }
}
