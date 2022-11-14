<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Record;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

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
            "categoryChartData" => Category::CategoryChart()
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
