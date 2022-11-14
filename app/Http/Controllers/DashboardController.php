<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Record;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "recordTotal" => Record::MyTotal(),
            "lastRecord" => Record::MyLastTransaction()->take(5)->get(),
            "weekChartData" => Record::WeekRecordTotal()

        ];

        return view("dashboard.index", $data);
    }

    public function history()
    {
        $data = [
            "title" => "History",
            "records" => Record::MyLastTransaction()->filter(request(["t"]))->latest()->paginate(10),
            "addition" => Record::HistoryAddition()
        ];

        return view("dashboard.history", $data);
    }

    public function insight()
    {
        $data = [
            "title" => "Insight",
            "recordTotal" => Record::MyTotal(),
            "categoryChartData" => Category::CategoryChart(),
            "recordTotal" => Record::MyTotal(),
            "weekChartData" => Record::WeekRecordTotal()
        ];

        return view("dashboard.insight", $data);
    }

    public function profile()
    {
        $data = [
            "title" => "User Profile"
        ];

        return view("dashboard.profile", $data);
    }
}
