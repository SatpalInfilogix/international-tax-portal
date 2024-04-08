<x-app-layout>
    <div class="py-12">

        <h1 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Register New Lead') }}
        </h1>


        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Client Information') }}</h2>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Country')" />
                            <select
                                class= "border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full">
                                <option value="">Select Country</option>
                                <option value="US">United States</option>
                            </select>
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Introducer')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="name" />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Client Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="name" />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Client Email')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="name" />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Phone number')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="name" />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('When to contact')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="name" />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Background')" />
                            <x-text-area id="name" name="name" type="text" class="mt-1 block w-full" required
                                autofocus autocomplete="name" />
                        </div>

                        <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Service requirements') }}</h2>
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label for="income_tax" class="inline-flex items-center">
                                    <input id="income_tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Income Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="company_tax" class="inline-flex items-center">
                                    <input id="company_tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Company Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="indirect_tax" class="inline-flex items-center">
                                    <input id="indirect_tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Indirect Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="private_client" class="inline-flex items-center">
                                    <input id="private_client" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Private Client') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="estate_tax" class="inline-flex items-center">
                                    <input id="estate_tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Estate Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="bespoke_advice" class="inline-flex items-center">
                                    <input id="bespoke_advice" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                        name="remember">
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Bespoke Advice') }}</span>
                                </label>
                            </div>

                        </div>


                        <div class="buttons-container mt-4">
                            <x-primary-button>
                                {{ __('Create Lead') }}
                            </x-primary-button>

                            <x-secondary-button class="ms-4">
                                {{ __('Reset') }}
                                </x-primary-button>

                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg height-max-content">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Members Available') }}</h2>

                        <div class="flex">
                            <div class="w-full">
                                <p>Country Members</p>
                            </div>
                            <div class="w-20">
                                <p>Select all</p>
                            </div>
                        </div>

                        <div class="flex items-center mt-2">
                            <div class="w-full bg-white shadow-xl">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg flex p-2">
                                    <div class="flex w-full">
                                        <img src="{{ asset('assets/icons/user-circle.jpg') }}" class="w-20"
                                            alt="User Image">
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">Admin</div>
                                            <div class="font-bold text-md mb-2">Ftest</div>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ asset('assets/icons/users-group.png') }}" alt="" class="w-20">
                                    </div>
                                </div>
                            </div>
                            <div class="w-20 text-center">
                                <input id="member-1" type="checkbox"
                                    class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500"
                                    name="member[]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
