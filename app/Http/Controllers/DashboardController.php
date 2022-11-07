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
            "recordTotal" => Record::MyTotal(),
            "categoryChartData" => Category::CategoryChart()
        ];

        // dump(Record::where("user_id", auth()->user()->id)
        //     ->whereHas("category", function ($q) {
        //         $q->where("id", 3)->whereHas("type", function ($q) {
        //             $q->where("name", "EXPENSE");
        //         });
        //     })->get()->toArray());

        DB::enableQueryLog();
        Category::with("record")->whereHas("record", function ($q) {
            $q->where("user_id", 1);
        })->get();

        dd(DB::getQueryLog());

        // dd();

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
