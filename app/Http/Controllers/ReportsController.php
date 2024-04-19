<?php

namespace App\Http\Controllers;

use App\Models\LeadAdvisor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function report()
    {
        $type = '';
        if(!empty($_GET['type'])){
            $type = $_GET['type'];
        }

        $todayDate = Carbon::now();
        $last3MonthDate = Carbon::now()->subMonth(3);
        $last6MonthDate = Carbon::now()->subMonth(6);
        $last1YearDate = Carbon::now()->subYear(1);
        $sentReceivedBusinessReports = '';
        // $receivedBusinessReports = '';

        if($type == 'sent-table' || $type == 'sent-download-csv') {
            if(Auth::user()->role == 'admin') {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->latest()->get();
            } else {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())->get();
            }
            foreach($sentReceivedBusinessReports as $key => $businessReport) {
                $leads = LeadAdvisor::where('introducer_id', $businessReport->id);
                $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
                $sentReceivedBusinessReports[$key]['last1YearAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last1YearDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last6MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last6MonthDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last3MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last3MonthDate)->sum('amount_quoted');
            }
        } elseif($type == 'received-table' || $type == 'received-download-csv'){
            if(Auth::user()->role == 'admin') {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->latest()->get();
            } else {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())->get();
            }
            foreach($sentReceivedBusinessReports as $key => $businessReport) {
                $leads = LeadAdvisor::where('advisor_id', $businessReport->id);
                $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
                $sentReceivedBusinessReports[$key]['last1YearAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last1YearDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last6MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last6MonthDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last3MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last3MonthDate)->sum('amount_quoted');
            }
        }

        if($type == 'sent-download-csv' || $type == 'received-download-csv'){
            $filename = 'download-reports.csv';
            $fp=fopen($filename, "w+");
            fputcsv($fp, array('Member', 'Country','Amount', 'Total Sent Lead', 'Last 3 Month', 'Last 6 Month', 'Last 1 Year'));

            foreach($sentReceivedBusinessReports as $row) {
                fputcsv($fp, array($row->name, $row->userAdditionalData->country, $row->leadAmounts, $row->leadCount, $row->last3MonthAmount, $row->last6MonthAmount, $row->last1YearAmount));
            }

            fclose($fp);
            $headers = array('Content-Type' => 'text\csv');

            return response()->download($filename, 'download-reports.csv', $headers); 
        } else {
            return view('reports.report-table', [
                'sentReceivedBusinessReports' => $sentReceivedBusinessReports,
            ]);
        }
    }
}
