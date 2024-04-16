<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadAdvisor;
use Illuminate\Http\Request;
use App\Models\UserAdditionalData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sentLeads = Lead::where('introducer_id', Auth::id())->latest()->get();

        $receivedLeads = LeadAdvisor::where('advisor_id', Auth::id())
            ->with('lead', 'advisor', 'introducer')
            ->latest()
            ->get();

        $sendLeadsArray = json_decode(json_encode($sentLeads));
        $receivedLeadsArray = json_decode(json_encode($receivedLeads));

        $allLeads = array_merge($sendLeadsArray,  $receivedLeadsArray);

        return view('leads.index', compact('sentLeads', 'receivedLeads', 'allLeads'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $countries = UserAdditionalData::select('country')
            ->orderBy('country', 'ASC')
            ->distinct()
            ->get();

        return view('leads.create', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lead = Lead::create([
            'introducer_id'     => Auth::id(),
            'client_name'       => $request->client_name,
            'client_email'      => $request->client_email,
            'client_phoneno'    => $request->phone_number,
            'when_to_contact'   => $request->when_to_connect,
            'background'        => $request->background,
            'services'          => $request->services ? implode(',',$request->services) : '',
            'country'           => $request->country
        ]);

        if($lead) {
            $members = $request->member;
            if ($members && count($members) > 0) {

                foreach($members as $advisor_id) {
                    LeadAdvisor::create([
                        'lead_id'       => $lead->id,
                        'introducer_id' => Auth::id(),
                        'advisor_id'    => $advisor_id
                    ]);
                }
            }
        }

        return Redirect::route("leads.index")->with('success-message','Leads Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lead = Lead::where('id', $id)->first();
        $leadAdvisor = LeadAdvisor::where('lead_id', $id)
            ->with('lead', 'advisor', 'introducer')
            ->latest()
            ->get();

        return view('leads.show', [
            'lead' => $lead,
            'leadAdvisor' => $leadAdvisor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        $leadAdvisor = LeadAdvisor::where('lead_id', $lead->id)->delete();

        $sentLeads = Lead::where('id', $lead->id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Lead has been successfully deleted.'
        ]);
    }

    public function advisorDetails(Request $request){
        foreach($request->advisor_id as $key => $leadAdvisor)
        {
            $lead = LeadAdvisor::where('id', $leadAdvisor)->update([
                'amount_quoted' => $request->amount_quoted[$key],
                'notes'         => $request->notes[$key],
                'status'        => $request->status[$key]
            ]);
        }

        return Redirect::route("leads.index");
    }
}
