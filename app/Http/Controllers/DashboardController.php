<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "recordTotal" => Record::MyTotal(),
            "lastRecord" => Record::MyLastTransaction()->take(5)->get()
        ];

        return view("dashboard.index", $data);
    }
}
