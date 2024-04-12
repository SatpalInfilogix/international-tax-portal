<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use App\Models\UserAdditionalData;
use Illuminate\Support\Facades\Auth;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = UserAdditionalData::select('country')
            ->orderBy('country', 'ASC')
            ->distinct()
            ->get();
            
        $sent_requests = Expertise::where('introducer_id', Auth::id())
            ->with('advisor')
            ->get();

        $received_requests = Expertise::where('advisor_id', Auth::id())
            ->with('introducer')
            ->get();

        return view('expertise.index', [
            'countries' => $countries,
            'sent_requests' => $sent_requests,
            'received_requests' => $received_requests
        ]);
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
        foreach ($request->advisors as $advisor) {
            Expertise::create([
                'introducer_id' => Auth::id(),
                'advisor_id' => $advisor,
                'request_message' => $request->request_message
            ]);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Expertise request has been sent successfuly!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expertise $expertise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expertise $expertise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expertise $expertise)
    {
        Expertise::where('id', $request->expertise_id)
            ->update([
                'reply_message' => $request->reply_message
            ]); 

        return response()->json([
            'success' => true,
            'message' => 'Reply sent successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expertise $expertise)
    {
        //
    }

    /**
     * Update the is_resolved status for the expertise
     */
    public function update_request_status(Request $request, $expertise_id){
        Expertise::where('id', $expertise_id)
            ->update([
                'is_resolved' => $request->is_resolved
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Expertise request resolved status has been updated successfuly!'
        ]);
    }
}
