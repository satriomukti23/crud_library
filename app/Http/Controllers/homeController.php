<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function dashboard()
    {
        return view ('page.index');
    }

    public function home(Request $request)
    {
       $namaDepan = $request->input('fname');
       $namaBelakang = $request->input('lname');

      return view('page.home', ['namaDepan' => $namaDepan, 'namaBelakang' => $namaBelakang]);
    }

    public function index(){
        return view('page.index');
    }
}
