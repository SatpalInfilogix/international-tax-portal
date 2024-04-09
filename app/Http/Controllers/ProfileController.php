<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Country;
use App\Models\UserAdditionalData;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'countries' => Country::get(),
            'userAdditionalData' => UserAdditionalData::where('user_id', $request->user()->id)->first()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {   
        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;

        if($request->new_password && $request->repeat_password && $request->new_password==$request->repeat_password){
            $user->password = Hash::make($request->new_password);
        }
        
        if(!empty($request->services)){
            $services = join(", ",$request->services);
        } else {
            $services = '';
        }

        $user->areas_of_expertise = $services;

        $user->facebook_link = $request->facebook_link;
        $user->linkedin_link = $request->linkedin_link;
        $user->twitter_link = $request->twitter_link;
        
        $user->user_type = $request->user_type;
        $user->user_status = $request->user_status;
        $user->save();

        $userAdditionalData = UserAdditionalData::where('user_id', Auth::id())->first();
        $oldLogo = $userAdditionalData->company_logo;
        $oldHeadshotFile = $userAdditionalData->headshot_path;
        if ($request->hasFile('logo_upload'))
        {
            $logoFile = $request->file('logo_upload');
            $filename = time().'.'.$logoFile->getClientOriginalExtension();
            $logoFile->move(public_path('uploads/company-logo/'), $filename);
        }

        if ($request->hasFile('headshot_upload'))
        {
           $headshotFile = $request->file('headshot_upload');
           $headshotFilename = time().'.'.$headshotFile->getClientOriginalExtension();
           $headshotFile->move(public_path('uploads/headshots/'), $headshotFilename);
        }

        UserAdditionalData::updateOrCreate([
                'user_id'                  => Auth::id(),
            ],[
                'country'                  => $request->country,
                'company_size'             => $request->company_size,
                'company_name'             => $request->company_name,
                'company_address'          => $request->company_address,
                'company_phone_number'     => $request->company_phone_number,
                'company_description'      => $request->company_description,
                'company_year_established' => $request->company_year_established,
                'company_website'          => $request->company_website,
                'company_logo'             => isset($fileName) ? 'images/company_logo/'. $filename : $oldLogo,
                'headshot_path'            => isset($headshotFilename) ? 'images/headshot_upload/'. $headshotFilename : $oldHeadshotFile,
                'bio'                      => $request->company_bio,
            ]);

        return Redirect::route('profile.edit')->with('success-message', 'Profile has been succesfully updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
