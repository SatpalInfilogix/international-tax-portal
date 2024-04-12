<?php

namespace App\Http\Controllers;

use App\Models\OneToOne;
use Illuminate\Http\Request;
use App\Models\UserAdditionalData;
use Illuminate\Support\Facades\Auth;

class OneToOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = UserAdditionalData::select('country')->distinct()->get();

        return view('one-to-one.index', [
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
        foreach ($request->advisors as $advisor) {
            OneToOne::create([
                'introducer_id' => Auth::id(),
                'advisor_id' => $advisor,
                'date'       => $request->date,
                'time'       => $request->time,
                'request_message' => $request->personal_notes
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'One to one request has been sent successfuly!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(OneToOne $oneToOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OneToOne $oneToOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OneToOne $oneToOne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OneToOne $oneToOne)
    {
        //
    }
}
