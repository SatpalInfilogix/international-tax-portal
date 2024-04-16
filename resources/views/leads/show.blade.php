<x-app-layout>
    <div class="py-12">

        <h1 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Lead Information') }}
        </h1>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Client Information') }}</h2>
                        <div class="pb-3">
                            <x-input-label for="country" :value="__('Country')" />
                            <select name="country" id="country"
                                class= "mt-1 border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full"
                                readonly>
                                <option value="{{ $lead->country }}">{{ $lead->country }}</option>
                            </select>
                        </div>

                        <div class="pb-3">
                            <x-input-label for="introducer" :value="__('Introducer')" />
                            <x-text-input id="introducer" name="introducer" type="text" class="mt-1 block w-full"
                                value="{{ Auth::user()->name }}" readonly />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="client_name" :value="__('Client Name')" />
                            <x-text-input id="client_name" name="client_name" type="text"
                                value="{{ $lead->client_name }}" class="mt-1 block w-full" readonly />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="client_email" :value="__('Client Email')" />
                            <x-text-input id="client_email" name="client_email" type="text"
                                value="{{ $lead->client_email }}" class="mt-1 block w-full" readonly />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="phone_number" :value="__('Phone number')" />
                            <x-text-input id="phone_number" name="phone_number" type="text"
                                value="{{ $lead->client_phoneno }}" class="mt-1 block w-full" readonly />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="when_to_connect" :value="__('When to contact')" />
                            <x-text-input id="when_to_connect" name="when_to_connect" type="text"
                                value="{{ $lead->when_to_contact }}" class="mt-1 block w-full" readonly />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="background" :value="__('Background')" />
                            <x-text-area id="background" name="background" class="mt-1 block w-full"
                                value="{{ $lead->background }}" readonly />
                        </div>

                        <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Service requirements') }}</h2>
                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label for="income_tax" class="inline-flex items-center">
                                    <input id="income_tax" name="services[]" value="Income Tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Income Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="company_tax" class="inline-flex items-center">
                                    <input id="company_tax" name="services[]" value="Company Tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Company Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="indirect_tax" class="inline-flex items-center">
                                    <input id="indirect_tax"name="services[]" value="Indirect Tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Indirect Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="private_client" class="inline-flex items-center">
                                    <input id="private_client" name="services[]" value="Private Client" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Private Client') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="estate_tax" class="inline-flex items-center">
                                    <input id="estate_tax" name="services[]" value="Estate Tax" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Estate Tax') }}</span>
                                </label>
                            </div>

                            <div>
                                <label for="bespoke_advice" class="inline-flex items-center">
                                    <input id="bespoke_advice" name="services[]" value="Bespoke Advice" type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" />
                                    <span class="ms-2 text-sm text-gray-600">{{ __('Bespoke Advice') }}</span>
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg height-max-content available-members">
                        <h2 class="text-2xl font-extrabold text-gray-900 mb-4">{{ __('Members Available') }}</h2>
                        <div class="flex">
                            <div class="w-full">
                                <p>Country Members</p>
                            </div>
                        </div>

                        <form action="{{ route('leads.advisor-details') }}" name="create-lead" method="post">
                            @csrf
                            <div class="members-list">
                                <div class="flex items-center mt-2">
                                    <div class="w-full bg-white">
                                        @foreach ($leadAdvisor as $advisor)
                                            <div class="rounded overflow-hidden border shadow-lg px-4 py-2">
                                                <x-text-input name="advisor_id[]" type="hidden"
                                                    value="{{ $advisor->id ?? '' }}" />

                                                <div class="flex items-center mb-2">
                                                    <img src="{{ asset('assets/icons/user-circle.jpg') }}"
                                                        class="w-10 h-10 mr-2" alt="User Image">
                                                    <p class="font-bold text-lg">{{ $advisor->advisor->name }}</p>
                                                </div>
                                                <div class="pb-3">
                                                    <x-input-label for="amount_quoted" :value="__('Amount Quoted')" />
                                                    <x-text-input id="amount_quoted" name="amount_quoted[]"
                                                        type="text" class="mt-1 block w-full"
                                                        value="{{ $advisor->amount_quoted ?? '' }}" />
                                                </div>
                                                <div class="pb-3">
                                                    <x-input-label for="Notes" :value="__('Notes')" />
                                                    <x-text-area id="notes" name="notes[]" type="text"
                                                        class="mt-1 block w-full"
                                                        value="{{ $advisor->notes ?? '' }}" />
                                                </div>
                                                <div class="pb-3">
                                                    <x-input-label for="status" :value="__('Status')" />
                                                    <select id="status" name="status[]"
                                                        class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                                                        <option value="New" @selected($advisor->status == 'New')>New
                                                        </option>
                                                        <option value="Engaged" @selected($advisor->status == 'Engaged')>Engaged
                                                        </option>
                                                        <option value="Quotation sent" @selected($advisor->status == 'Quotation sent')>
                                                            Quotation sent</option>
                                                        <option value="Client Won" @selected($advisor->status == 'Client Won')>Client
                                                            Won</option>
                                                        <option value="Client Lost" @selected($advisor->status == 'Client Lost')>Client
                                                            Lost</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="buttons-container mt-4">
                                <x-primary-button>
                                    {{ __('Save Lead') }}
                                </x-primary-button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.select-all').click(function() {
                if ($('[name="member[]"]:checked').length > 0) {
                    $('[name="member[]"]').prop('checked', false);
                } else {
                    $('[name="member[]"]').prop('checked', true);
                }
            })
        })
    </script>
</x-app-layout>
