<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reports.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function downloadCsv()
    {
        $users = User::latest()->get();
        $filename = 'download-reports.csv';
        $fp=fopen($filename, "w+");
        fputcsv($fp, array('Name', 'Email','Address'));

        foreach($users as $row) {
            fputcsv($fp, array($row->name, $row->email, $row->address));
        }

        fclose($fp);
        $headers = array('Content-Type' => 'text\csv');

        return response()->download($filename, 'download-reports.csv', $headers);
    }
}
