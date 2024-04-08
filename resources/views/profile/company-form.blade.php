<h2 class="text-2xl font-extrabold mb-2">Company</h2>

<div class="mb-2">
    <x-input-label for="country" :value="__('Country')" />
    <select id="country" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="">Select Country</option>
        <option value="US">United States</option>
    </select>
</div>

<div class="mb-2">
    <x-input-label for="company_size" :value="__('Size')" />
    <select id="company_size" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="">Select Size</option>
        <option value="small">Small</option>
        <option value="medium">Medium</option>
        <option value="large">Large</option>
    </select>
</div>

<div class="mb-2">
    <x-input-label for="company_name" :value="__('Company')" />
    <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mb-2">
    <x-input-label for="company_address" :value="__('Address')" />
    <x-text-input id="company_address" name="phone_number" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mb-2">
    <x-input-label for="company_phone_number" :value="__('Telephone')" />
    <x-text-input id="company_phone_number" name="company_phone_number" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mb-2">
    <x-input-label for="company_description" :value="__('Description')" />
    <x-text-input id="company_description" name="company_description" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mb-2">
    <x-input-label for="company_year_established" :value="__('Year Established')" />
    <x-text-input id="company_year_established" name="company_year_established" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mb-2">
    <x-input-label for="company_website" :value="__('Website')" />
    <x-text-input id="company_website" name="company_website" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>

<div class="mb-2">
    <x-input-label for="logo_upload" :value="__('Logo upload')" />
    <x-file-input name="logo_upload" id="logo_upload"></x-file-input>
</div>

<div class="mb-2">
    <x-input-label for="headshot_upload" :value="__('Headshot upload')" />
    <x-file-input name="headshot_upload" id="logo_upload"></x-file-input>
</div>

<div class="mb-2">
    <x-input-label for="company_status" :value="__('Status')" />
    <select id="company_status" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="Active">Active</option>
        <option value="Deactive">Deactive</option>
    </select>
</div>

<div class="mb-2">
    <x-input-label for="user_type" :value="__('User Type')" />
    <select id="user_type" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
        <option value="Fusion">Fusion</option>
        <option value="Member">Member</option>
    </select>
</div>

<div>
    <x-input-label for="company_bio" :value="__('Bio')" />
    <x-text-area id="company_bio" name="company_bio" type="text" class="mt-1 block w-full"
        :value="old('phone_number', $user->phone_number)" />
    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
</div>