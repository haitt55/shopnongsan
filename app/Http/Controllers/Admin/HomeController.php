<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.home.dashboard');
    }

    public function dashboard()
    {
        return view('admin.home.dashboard');
    }
}
