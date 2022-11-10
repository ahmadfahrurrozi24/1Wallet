<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Http\Requests\StoreRecordRequest;
use App\Models\Record;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecordRequest $request)
    {
        $data = $request->all();
        $data["amount"] = Helper::storeNumberFormat($data["amount"]);
        $data["amount"] = Helper::newRecordCategoryCheck($data["category_id"], $data["amount"]);
        $data["user_id"] = auth()->user()->id;
        $data["date"] ?? $data["date"] = now();

        unset($data["_token"]);

        Record::create($data);
        User::ReBalance();

        return redirect()->to("/dashboard")->with("message", "New record succesfully created");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        $data = [
            "title" => "Edit Record",
            "types" => Type::with(["category"])->get(),
            "record" => $record
        ];

        return view("dashboard.editRecord", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRecordRequest $request, Record $record)
    {
        dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}
