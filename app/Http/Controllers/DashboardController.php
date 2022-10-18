<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function history(){
        $data = [
            "title" => "History",       
        ];

        return view("dashboard.history", $data);
    }

    public function newRecord(){
        $data = [
            "title" => "Add Record",
            "categories" => Category::all()        
        ];

        return view("dashboard.newRecord", $data);
    }
}
