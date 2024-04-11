<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\User;
use App\Models\UserAdditionalData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::with('userAdditionlData')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', [
            'countries' => Country::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(''),
        ]);

        $userAdditionalData = UserAdditionalData::create([
            'user_id' => $user->id,
            'country' => $request->country,
            'company_size' => $request->company_size,
            'company_name' => $request->company_name
        ]);

        event(new Registered($user));

        return Redirect::route('users.index')->with('success-message', 'User has been added successfully!');
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
        return view('users.edit', [
            'user' => User::find($id),
            'countries' => Country::get(),
            'userAdditionalData' => UserAdditionalData::where('user_id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
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

        $oldLogo = NULL;
        $oldHeadshotFile = NULL;
        $userAdditionalData = UserAdditionalData::where('user_id', $id)->first();
        if($userAdditionalData != '') {
            $oldLogo = $userAdditionalData->company_logo;
            $oldHeadshotFile = $userAdditionalData->headshot_path;
        }
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
                'user_id'                  => $id,
            ],[
                'country'                  => $request->country,
                'company_size'             => $request->company_size,
                'company_name'             => $request->company_name,
                'company_address'          => $request->company_address,
                'company_phone_number'     => $request->company_phone_number,
                'company_description'      => $request->company_description,
                'company_year_established' => $request->company_year_established,
                'company_website'          => $request->company_website,
                'company_logo'             => isset($filename) ? 'uploads/company-logo/'. $filename : $oldLogo,
                'headshot_path'            => isset($headshotFilename) ? 'uploads/headshots/'. $headshotFilename : $oldHeadshotFile,
                'bio'                      => $request->company_bio,
            ]);

        return Redirect::route('users.index')->with('success-message', 'Profile has been succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->delete();
        $userAdditionalData = UserAdditionalData::where('user_id', $id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Profile has been successfully deleted.'
        ]);
    }
}
