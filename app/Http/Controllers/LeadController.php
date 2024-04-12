<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\LeadAdvisior;
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
        $sentLeads = Lead::where('introducer_id', Auth::id())
            ->latest()
            ->get();

        $receivedLeads = LeadAdvisior::where('advisor_id', Auth::id())
            ->with('advisor')
            ->latest()
            ->get();
        /* foreach($receivedLeads as $key => $receivedLead)
        {
            $receivedLeads[$key]['client_name'] = Lead::where('id', $receivedLead->lead_id)->pluck('client_name')->first();
        } */

        echo '<pre>';
        print_r($receivedLeads);
        die();

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
        $countries = UserAdditionalData::select('country')->distinct()->get();;

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
                foreach($members as $key => $value)
                {
                    LeadAdvisior::create([
                        'lead_id'       => $lead->id,
                        'advisor_id'   => $value
                    ]);
                }
            }
        }

        return Redirect::route("leads.index")->with('success-message','Leads Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
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
        //
    }
}
