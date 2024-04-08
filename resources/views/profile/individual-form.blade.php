<h2 class="text-2xl font-extrabold mb-2">Individual</h2>

<div class="mb-2">
    <x-input-label for="name" :value="__('Name')" />
    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" />
</div>

<div class="mb-2">
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" />
</div>

<div class="mb-2">
    <x-input-label for="phone_number" :value="__('Telephone')" />
    <x-text-input id="phone_number" name="phone_number" type="number" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)" />
</div>

<div class="mb-2">
    <x-input-label for="new_password" :value="__('New Password')" />
    <x-text-input id="new_password" name="new_password" type="password" class="mt-1 block w-full" />
</div>

<div class="mb-9">
    <x-input-label for="repeat_password" :value="__('Repeat Password')" />
    <x-text-input id="repeat_password" name="repeat_password" type="password" class="mt-1 block w-full" />
</div>

<h2 class="text-lg font-medium text-gray-900 mb-4">
    {{ __('Areas of Expertise') }}
</h2>

@php
    $services = explode(", ", $user->areas_of_expertise);
@endphp

<div class="grid grid-cols-3 gap-2 mb-9">
    <div>
        <label for="income_tax" class="inline-flex items-center">
            <input id="income_tax" type="checkbox" name="services[]" value="Income Tax"
                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                @checked(in_array("Income Tax", $services))>
            <span class="ms-2 text-sm text-gray-600">{{ __('Income Tax') }}</span>
        </label>
    </div>

    <div>
        <label for="ct" class="inline-flex items-center">
            <input id="ct" type="checkbox" name="services[]" value="CT"
                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                @checked(in_array("CT", $services))>
            <span class="ms-2 text-sm text-gray-600">{{ __('CT') }}</span>
        </label>
    </div>

    <div>
        <label for="indirect_tax" class="inline-flex items-center">
            <input id="indirect_tax" type="checkbox" name="services[]" value="Indirect Tax"
                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                @checked(in_array("Indirect Tax", $services))>
            <span class="ms-2 text-sm text-gray-600">{{ __('Indirect Tax') }}</span>
        </label>
    </div>

    <div>
        <label for="private_client" class="inline-flex items-center">
            <input id="private_client" type="checkbox" name="services[]" value="Private Client"
                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                @checked(in_array("Private Client", $services))>
            <span class="ms-2 text-sm text-gray-600">{{ __('Private Client') }}</span>
        </label>
    </div>

    <div>
        <label for="estate_tax" class="inline-flex items-center">
            <input id="estate_tax" type="checkbox" name="services[]" value="Estate Tax"
                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                @checked(in_array("Estate Tax", $services))>
            <span class="ms-2 text-sm text-gray-600">{{ __('Estate Tax') }}</span>
        </label>
    </div>

    <div>
        <label for="bespoke_advice" class="inline-flex items-center">
            <input id="bespoke_advice" type="checkbox" name="services[]" value="Bespoke Advice"
                class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                @checked(in_array("Bespoke Advice", $services))>
            <span class="ms-2 text-sm text-gray-600">{{ __('Bespoke Advice') }}</span>
        </label>
    </div>

</div>


<h2 class="text-lg font-medium text-gray-900 mb-4">
    {{ __('Social Icons Link') }}
</h2>

<div class="mb-2">
    <x-input-label for="linkedin_link" :value="__('LinkedIn')" />
    <x-text-input id="linkedin_link" name="linkedin_link" type="text" class="mt-1 block w-full" :value="old('linkedin_link', $user->linkedin_link)" />
</div>

<div class="mb-2">
    <x-input-label for="facebook_link" :value="__('Facebook')" />
    <x-text-input id="facebook_link" name="facebook_link" type="text" class="mt-1 block w-full" :value="old('facebook_link', $user->facebook_link)" />
</div>

<div>
    <x-input-label for="twitter_link" :value="__('Twitter')" />
    <x-text-input id="twitter_link" name="twitter_link" type="text" class="mt-1 block w-full" :value="old('twitter_link', $user->twitter_link)" />
</div>
