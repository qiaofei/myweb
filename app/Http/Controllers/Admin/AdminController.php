<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Model\CDKey;

class AdminController extends Controller
{
    public function index()
    {
        $row = 3;
        $car = CDKey::createKey($row);
        dd($car);
        return view('admin.console');
    }

}
