<?php

namespace App\Http\Controllers;

use App\Models\LeadAdvisor;
use App\Models\User;
use App\Models\Expertise;
use App\Models\UserAdditionalData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        } elseif ($type == 'received-table' || $type == 'received-download-csv'){
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
        } elseif ($type == 'won-table' || $type == 'won-download-csv'){
            if(Auth::user()->role == 'admin') {
                $leadsId = LeadAdvisor::where('status', 'Client Won')->distinct()->pluck('introducer_id');
                $sentReceivedBusinessReports = User::with('userAdditionalData')->whereIn('id', $leadsId)->latest()->get();
            } else {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())->get();
            }
            foreach($sentReceivedBusinessReports as $key => $businessReport) {
                $leads = LeadAdvisor::where('introducer_id', $businessReport->id)->where('status', 'Client Won');
                $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
                $sentReceivedBusinessReports[$key]['last1YearAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last1YearDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last6MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last6MonthDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last3MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last3MonthDate)->sum('amount_quoted');
            }
        }  elseif ($type == 'lost-table' || $type == 'lost-download-csv'){
            if (Auth::user()->role == 'admin') {
                $leadsId = LeadAdvisor::where('status', 'Client Lost')->distinct()->pluck('introducer_id');
                $sentReceivedBusinessReports = User::with('userAdditionalData')->whereIn('id', $leadsId)->latest()->get();
            } else {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())->get();
            }
            foreach ($sentReceivedBusinessReports as $key => $businessReport) {
                $leads = LeadAdvisor::where('introducer_id', $businessReport->id)->where('status', 'Client Lost');
                $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
                $sentReceivedBusinessReports[$key]['last1YearAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last1YearDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last6MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last6MonthDate)->sum('amount_quoted');
                $sentReceivedBusinessReports[$key]['last3MonthAmount'] = $leads->where('created_at', '<=', $todayDate)->where('created_at', '>=', $last3MonthDate)->sum('amount_quoted');
            }
        }  elseif ($type == 'experties-table' || $type == 'experties-download-csv'){
            if(Auth::user()->role == 'admin') {
                $leadsId = Expertise::pluck('introducer_id');
                $sentReceivedBusinessReports = User::with('userAdditionalData')->whereIn('id',$leadsId)->latest()->get();
            } else {
                $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())->get();
            }
            foreach($sentReceivedBusinessReports as $key => $businessReport) {
                $experties = Expertise::where('introducer_id', $businessReport->id);
                $sentReceivedBusinessReports[$key]['leadCount'] = optional($experties)->count();
                $sentReceivedBusinessReports[$key]['leadAmounts'] = optional($experties)->count();

            }
        }

        if($type == 'sent-download-csv' || $type == 'received-download-csv' ||  $type == 'won-download-csv' || $type == 'lost-download-csv' || $type == 'experties-download-csv'){
            $filename = 'download-reports.csv';
            $fp=fopen($filename, "w+");
            if($type == 'experties-download-csv') {
                fputcsv($fp, array('Member', 'Country','Amount', 'Total Experties'));
            } else {
                fputcsv($fp, array('Member', 'Country','Amount', 'Total Lead', 'Last 3 Month', 'Last 6 Month', 'Last 1 Year'));
            }

            foreach($sentReceivedBusinessReports as $row) {
                if($type == 'experties-download-csv') {
                    fputcsv($fp, array($row->name, $row->userAdditionalData->country, $row->leadCount));
                } else {
                    fputcsv($fp, array($row->name, $row->userAdditionalData->country, $row->leadAmounts, $row->leadCount, $row->last3MonthAmount, $row->last6MonthAmount, $row->last1YearAmount));
                }
            }

            fclose($fp);
            $headers = array('Content-Type' => 'text\csv');

            return response()->download($filename, 'download-reports.csv', $headers); 
        } elseif ($type == 'sent-graph' || $type == 'received-graph' || $type == 'won-graph' ||  $type == 'lost-graph' || $type == 'experties-graph') {
            $data =  json_encode($sentReceivedBusinessReports);
            return view('reports.reports-graph', compact('data'));
        } else {
            return view('reports.report-table', [
                'sentReceivedBusinessReports' => $sentReceivedBusinessReports,
            ]);
        }
    }

    public function reportsGraph()
    {
        if(Auth::user()->role == 'admin') {
            $countries = UserAdditionalData::select('country')->distinct()->get();
        } else {
            $countries = UserAdditionalData::where('user_id', Auth::id())->select('country')->distinct()->get();
        }

        return view('reports.report-graphs', compact('countries'));
    }

    public function memberData($country)
    {
        $todayDate = Carbon::now();
        $sentReceivedBusinessReports =[];
       
        if(Auth::user()->role == 'admin') {
            $sentReceivedBusinessReports = User::with('userAdditionalData')
                ->whereHas('userAdditionalData', function ($query) use ($country) {
                    $query->where('country', $country);
                })
                ->latest()->get();
        } else {
            $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())
            ->whereHas('userAdditionalData', function ($query) use ($country) {
                $query->where('country', $country);
            })
            ->latest()->get();
        } 
        foreach ($sentReceivedBusinessReports as $key => $businessReport) {
            $leads = LeadAdvisor::where('introducer_id', $businessReport->id);
            $sentReceivedBusinessReports[$key]['country'] = $country;
            $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
            $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
        }

        return $sentReceivedBusinessReports;
    }

    public function receivedGraphData($country)
    {
        $todayDate = Carbon::now();
        $sentReceivedBusinessReports =[];
       
        if(Auth::user()->role == 'admin') {
            $sentReceivedBusinessReports = User::with('userAdditionalData')
                ->whereHas('userAdditionalData', function ($query) use ($country) {
                    $query->where('country', $country);
                })
                ->latest()->get();
        } else {
            $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())
            ->whereHas('userAdditionalData', function ($query) use ($country) {
                $query->where('country', $country);
            })
            ->latest()->get();
        }

        foreach($sentReceivedBusinessReports as $key => $businessReport) {
            $leads = LeadAdvisor::where('advisor_id', $businessReport->id);
            $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
            $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
        }

        return $sentReceivedBusinessReports;
    }

    public function lostGraphData($country)
    {
        if (Auth::user()->role == 'admin') {
            $leadsId = LeadAdvisor::where('status', 'Client Lost')->distinct()->pluck('introducer_id');
            $sentReceivedBusinessReports = User::with('userAdditionalData')->whereIn('id', $leadsId)
                        ->whereHas('userAdditionalData', function ($query) use ($country) {
                            $query->where('country', $country);
                        })
                        ->latest()->get();
        } else {
            $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())
                        ->whereHas('userAdditionalData', function ($query) use ($country) {
                            $query->where('country', $country);
                        })
                        ->latest()->get();
        }
        foreach ($sentReceivedBusinessReports as $key => $businessReport) {
            $leads = LeadAdvisor::where('introducer_id', $businessReport->id)->where('status', 'Client Lost');
            $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
            $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
        }

        return $sentReceivedBusinessReports;
    }

    public function wonGraphData($country)
    {
        if(Auth::user()->role == 'admin') {
            $leadsId = LeadAdvisor::where('status', 'Client Won')->distinct()->pluck('introducer_id');
            $sentReceivedBusinessReports = User::with('userAdditionalData')->whereIn('id', $leadsId)
                ->whereHas('userAdditionalData', function ($query) use ($country) {
                    $query->where('country', $country);
                })
                ->latest()->get();
        } else {
            $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())
                        ->whereHas('userAdditionalData', function ($query) use ($country) {
                            $query->where('country', $country);
                        })
                        ->latest()->get();
        }
        foreach($sentReceivedBusinessReports as $key => $businessReport) {
            $leads = LeadAdvisor::where('introducer_id', $businessReport->id)->where('status', 'Client Won');
            $sentReceivedBusinessReports[$key]['leadAmounts'] = $leads->sum('amount_quoted');
            $sentReceivedBusinessReports[$key]['leadCount'] = optional($leads)->count();
        }

        return $sentReceivedBusinessReports;
    }

    public function expertiesGraph($country)
    {
        if(Auth::user()->role == 'admin') {
            $leadsId = Expertise::pluck('introducer_id');
            $sentReceivedBusinessReports = User::with('userAdditionalData')->whereIn('id', $leadsId)
                            ->whereHas('userAdditionalData', function ($query) use ($country) {
                                $query->where('country', $country);
                            })
                            ->latest()->get();
        } else {
            $sentReceivedBusinessReports = User::with('userAdditionalData')->where('id', Auth::id())
                            ->whereHas('userAdditionalData', function ($query) use ($country) {
                                $query->where('country', $country);
                            })
                            ->latest()->get();
        }
        foreach($sentReceivedBusinessReports as $key => $businessReport) {
            $experties = Expertise::where('introducer_id', $businessReport->id);
            $sentReceivedBusinessReports[$key]['leadCount'] = optional($experties)->count();
            $sentReceivedBusinessReports[$key]['leadAmounts'] = optional($experties)->count();

        }

        return $sentReceivedBusinessReports;
    }
}
