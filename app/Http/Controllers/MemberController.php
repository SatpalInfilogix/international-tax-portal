<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAdditionalData;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::with('userAdditionalData')->latest()->get();

        $countries = UserAdditionalData::select('country')
            ->with('countryDetail')
            ->orderBy('country', 'ASC')
            ->distinct()
            ->get();

        return view('members.index', [
            'members' => $members,
            'countries' => $countries
        ]);
    }

    /**
     * Display a listing of the resource by the country name.
     */
    public function get_by_country(Request $request, $country)
    {
        $members = User::with('userAdditionalData')
                    ->whereHas('userAdditionalData', function ($query) use ($country) {
                        $query->where('country', $country);
                    })
                    ->latest()->get();

        return $members;
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
