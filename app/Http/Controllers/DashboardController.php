<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Type;

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

    public function history()
    {
        $data = [
            "title" => "History",
            "records" => Record::MyLastTransaction()->filter(request(["time"]))->latest()->paginate(10)
        ];

        return view("dashboard.history", $data);
    }

    public function newRecord()
    {
        $data = [
            "title" => "Add Record",
            "types" => Type::with(["category"])->get()
        ];

        return view("dashboard.newRecord", $data);
    }
    
    public function insight()
    {
        $data = [
            "title" => "Insight",
        ];
    
        return view("dashboard.insight", $data);
    }
}
