<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
        ];

        dd(Record::MyTotal()->get());

        return view("dashboard.index", $data);
    }
}
