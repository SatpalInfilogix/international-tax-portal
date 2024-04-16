<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAdditionalData;
use App\Models\Country;
use App\Mail\MemberEmail;
use Illuminate\Support\Facades\Mail;

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

    public function autocomplete(Request $request)
    {
        $members = User::with('userAdditionalData')
                ->whereHas('userAdditionalData', function ($query) use ($request) {
                    $query->where('country', 'LIKE', '%'. $request->search. '%');
                })
                ->latest()->get();
        $data = '';
        if(count($members) > 0 ){
            $data .= '<ul class="list" style="display:block;position:relative;z-indez:1">';
            foreach ($members as $key=> $member){
                $data .= '<li class="list">'. $member->userAdditionalData->country .'</li>';
            }
            $data .= '</ul>';
        } else{
            $data .= '<li class="list"> No data found</li>';
        }

        return response()->json($data);
    }

    public function membersEmail()
    {
        $users = User::pluck('email')->toArray();
        $userEmail=implode(',',$users);

        return view('members.email', compact('userEmail'));
    }

    public function sendEmailEmail(Request $request)
    {
        $bcc = explode(',' ,$request->bcc);

        $mailData = [
            'subject'    => $request->subject,
            'message'    => $request->message,
        ];
        foreach ($bcc as $key => $values) {
            Mail::to($request->to)->bcc($request->bcc)->send(new MemberEmail($mailData));

        }

        return redirect(route('members.index'));
    }
}
