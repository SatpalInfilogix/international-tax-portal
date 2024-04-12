<h2 class="text-2xl font-extrabold mb-2">Company</h2>

<div class="mb-2">
    <x-input-label for="country" :value="__('Country')" />
    <select id="country" name="country" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="" disabled @selected($userAdditionalData && !$userAdditionalData->country)>Select Country</option>
        @foreach ($countries as $country)
        <option value="{{ $country->name }}" @selected($userAdditionalData && $userAdditionalData->country==$country->name)>{{ $country->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-2">
    <x-input-label for="company_size" :value="__('Size')" />
    <select id="company_size" name="company_size" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="Small" @selected($userAdditionalData && $userAdditionalData->company_size=='Small')>Small</option>
        <option value="Medium" @selected($userAdditionalData && $userAdditionalData->company_size=='Medium')>Medium</option>
        <option value="Large" @selected($userAdditionalData && $userAdditionalData->company_size=='Large')>Large</option>
    </select>
</div>

<div class="mb-2">
    <x-input-label for="company_name" :value="__('Company')" />
    <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full"
        :value="old('company_name', $userAdditionalData->company_name ?? '')" />
</div>

<div class="mb-2">
    <x-input-label for="company_address" :value="__('Address')" />
    <x-text-input id="company_address" name="company_address" type="text" class="mt-1 block w-full"
        :value="old('company_address', $userAdditionalData->company_address ?? '')" />
</div>

<div class="mb-2">
    <x-input-label for="company_phone_number" :value="__('Telephone')" />
    <x-text-input id="company_phone_number" name="company_phone_number" type="text" class="mt-1 block w-full"
        :value="old('company_phone_number', $userAdditionalData->company_phone_number ?? '')" />
</div>

<div class="mb-2">
    <x-input-label for="company_description" :value="__('Description')" />
    <x-text-input id="company_description" name="company_description" type="text" class="mt-1 block w-full"
        :value="old('company_description', $userAdditionalData->company_description ?? '')" />
</div>

<div class="mb-2">
    <x-input-label for="company_year_established" :value="__('Year Established')" />
    <x-text-input id="company_year_established" name="company_year_established" type="text" class="mt-1 block w-full"
        :value="old('company_year_established', $userAdditionalData->company_year_established ?? '')" />
</div>

<div class="mb-2">
    <x-input-label for="company_website" :value="__('Website')" />
    <x-text-input id="company_website" name="company_website" type="text" class="mt-1 block w-full"
        :value="old('company_website', $userAdditionalData->company_website ?? '')" />
</div>

<div class="mb-2">
    <x-input-label for="logo_upload" :value="__('Logo upload')" />
    <x-file-input name="logo_upload" id="logo_upload" accept="image/*" onchange="previewFile()"></x-file-input>
    <img src="{{ asset($userAdditionalData->company_logo) }}" @class(['hidden' => !$userAdditionalData->company_logo]) id="preview-logo" width="50" height="50">
</div>

<div class="mb-2">
    <x-input-label for="headshot_upload" :value="__('Headshot upload')" />
    <x-file-input name="headshot_upload" id="headshot_upload" onchange="previewPdf()"></x-file-input>
    <a href="{{ asset($userAdditionalData->headshot_path) }}" @class(['hidden' => !$userAdditionalData->headshot_path]) id="preview-headshot" target="_blank">Click here to</a>
</div>

<div class="mb-2">
    <x-input-label for="user_status" :value="__('Status')" />
    <select id="user_status" name="user_status" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="Active" @selected($user->user_status == 'Active')>Active</option>
        <option value="Deactive" @selected($user->user_status == 'Deactive')>Deactive</option>
    </select>
</div>

<div class="mb-2">
    <x-input-label for="user_type" :value="__('User Type')" />
    <select id="user_type" name="user_type" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="Fusion" @selected($user->user_type == 'Fusion')>Fusion</option>
        <option value="Member" @selected($user->user_type == 'Member')>Member</option>
    </select>
</div>

<div>
    <x-input-label for="company_bio" :value="__('Bio')" />
    <x-text-area id="company_bio" name="company_bio" class="mt-1 block w-full"
        :value="old('company_bio', $userAdditionalData->bio ?? '')" />
</div>