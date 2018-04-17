<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Client::whereNull('phoneNumber')->get();
        return view('modules.index', compact('modules'));
    }
}
