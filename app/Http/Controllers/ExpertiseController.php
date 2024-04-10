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
        $countries = UserAdditionalData::select('country')->distinct()->get();;

        return view('expertise.index', [
            'countries' => $countries
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
        $payload = [];

        foreach ($request->advisors as $advisor) {
            $payload[] = [
                'introducer_id' => Auth::id(),
                'advisor_id' => $advisor,
                'request_message' => $request->request_message
            ];
        }
    
        if (!empty($payload)) {
            $expertise_requests = Expertise::insert($payload);
    
            return response()->json([
                'success' => true,
                'message' => 'Expertise request has been sent successfuly!'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No data to insert',
            ], 400);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expertise $expertise)
    {
        //
    }
}
