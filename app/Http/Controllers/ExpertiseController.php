<?php

namespace App\Http\Controllers;

use App\Models\Expertise;
use Illuminate\Http\Request;
use App\Models\UserAdditionalData;

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
        print_r($request->all());
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
