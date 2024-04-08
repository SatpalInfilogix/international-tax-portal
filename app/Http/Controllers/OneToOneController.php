<?php

namespace App\Http\Controllers;

use App\Models\OneToOne;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('one-to-one.index');
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
