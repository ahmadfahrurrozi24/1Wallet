<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Record;
use App\Models\Type;

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
        $records = Record::MyLastTransaction()->latest()->filter(request(["t"]))->paginate(10);

        $data = [
            "title" => "History",
            "records" => $records,
            "recordsByDate" => collect($records->items())->groupBy("date"),
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
