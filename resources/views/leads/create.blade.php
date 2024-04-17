<x-app-layout>
    <div class="py-12">

        <h1 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Register New Lead') }}
        </h1>
        @php
            $selectedMembers = '';
            $selectedCountry = '';
            if(!empty($_GET['country'])){
                $selectedCountry = $_GET['country'];
            }
            if(!empty($_GET['members'])){
                $selectedMembers = $_GET['members'];
            }
        @endphp

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <form action="{{ route('leads.store') }}" name="create-lead" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Client Information') }}</h2>
                            <input type="hidden" name="membersIds[]" id ="membersIds" value="{{ $selectedMembers }}" > 
                            <div class="pb-3">
                                <x-input-label for="country" :value="__('Country')" />
                                <select name="country" id="country"
                                    class= "mt-1 border-gray-300 focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm w-full">
                                    <option value="" selected disabled>Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->country }}" @selected($country->country==$selectedCountry)>{{ $country->country }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pb-3">
                                <x-input-label for="introducer" :value="__('Introducer')" />
                                <x-text-input id="introducer" name="introducer" type="text"
                                    class="mt-1 block w-full" value="{{ Auth::user()->name }}" readonly />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="client_name" :value="__('Client Name')" />
                                <x-text-input id="client_name" name="client_name" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="client_email" :value="__('Client Email')" />
                                <x-text-input id="client_email" name="client_email" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="phone_number" :value="__('Phone number')" />
                                <x-text-input id="phone_number" name="phone_number" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="when_to_connect" :value="__('When to contact')" />
                                <x-text-input id="when_to_connect" name="when_to_connect" type="text"
                                    class="mt-1 block w-full" />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="background" :value="__('Background')" />
                                <x-text-area id="background" name="background" class="mt-1 block w-full" />
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


                            <div class="buttons-container mt-4">
                                <x-primary-button>
                                    {{ __('Create Lead') }}
                                </x-primary-button>

                                <x-secondary-button class="ms-4">
                                    {{ __('Reset') }}
                                    </x-primary-button>
                            </div>
                        </div>

                        <div
                            class="p-4 sm:p-8 bg-white shadow sm:rounded-lg height-max-content hidden available-members">
                            <h2 class="text-lg font-medium text-gray-900 mb-4">{{ __('Members Available') }}</h2>

                            <div class="flex">
                                <div class="w-full">
                                    <p>Country Members</p>
                                </div>
                                <div class="w-20">
                                    <p class="select-all cursor-default">Select all</p>
                                </div>
                            </div>

                            <div class="members-list">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.select-all').click(function(){
                if ($('[name="member[]"]:checked').length > 0) {
                    $('[name="member[]"]').prop('checked',false);
                } else {
                    $('[name="member[]"]').prop('checked', true);
                }       
            })

            $('[name="country"]').change(function() {
                $.ajax({
                    url: `{{ url('get-members-by-country') }}/${ $(this).val() }`,
                    method: 'GET',
                    success: function(response) {
                        let html = ``;

                        for(let i=0; i<response.length; i++){
                            console.log(response[i].id);

                            html += ` <div class="flex items-center mt-2">
                                <div class="w-full bg-white">
                                    <div class="max-w-sm rounded overflow-hidden shadow-lg px-4 py-2">
                                        <div class=" flex">
                                            <div class="flex w-full">
                                                <img src="{{ asset('assets/icons/user-circle.jpg') }}" class="w-20 h-20" alt="User Image">
                                                <div class="px-6 py-4">
                                                    <div class="font-bold text-xl mb-2">${response[i].name}</div>`;
                                                    if(response[i].user_additionl_data && response[i].user_additionl_data.company_name){
                                                        html += `<div class="font-bold text-md mb-2">${response[i].user_additionl_data.company_name}</div>`;
                                                    }
                                                html += `</div>
                                            </div>
                                            <div>
                                                <img src="{{ asset('assets/icons/users-group.png') }}" alt="" class="w-20">
                                            </div>
                                        </div>`;

                                        if(response[i].areas_of_expertise){
                                            let expertises = response[i].areas_of_expertise.split(', ');
                                            // console.log('..', expertises)
                                            let expertisesHtml = ``;

                                            for(let j = 0; j < expertises.length; j++){
                                                expertisesHtml += `<div class="font-bold text-sm mr-2 flex items-center">
                                                    <span class="size-1.5 inline-block rounded-full bg-green-800 mr-1"></span>
                                                    ${expertises[j]}
                                                </div>`;
                                            }

                                            html += `<div class="flex flex-wrap my-2">${expertisesHtml}</div>`;
                                        }

                                    html += `</div> 
                                </div>
                                <div class="w-20 text-center">
                                    <input type="checkbox" name="member[]" value=${response[i].id} class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                                </div>
                            </div>`;
                        }

                        $('.members-list').html(html);

                        if (response.length > 0) {
                            $('.available-members').removeClass('hidden');
                        } else {
                            $('.available-members').addClass('hidden');
                        }
                    }
                })
            })

            $("form[name='create-lead']").validate({
                rules: {
                    country: {
                        required: true
                    },
                    introducer: {
                        required: true
                    },
                    client_name: {
                        required: true
                    },
                    client_email: {
                        required: true,
                        email: true
                    },
                    phone_number: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    when_to_connect: {
                        required: true
                    },
                    background: {
                        required: true
                    },
                    "member[]": "required",

                },
                messages: {
                    country: {
                        required: "Please select a country"
                    },
                    introducer: {
                        required: "Please enter an introducer"
                    },
                    client_name: {
                        required: "Please enter client name"
                    },
                    client_email: {
                        required: "Please enter an email address"
                    },
                    phone_number: {
                        required: "Please enter a phone number",
                        minlength: "Please enter valid phone number",
                        maxlength: "Please enter valid phone number"
                    },
                    when_to_connect: {
                        required: "Please enter when to connect"
                    },
                    background: {
                        required: "Please enter background"
                    },
                    "member[]": ""

                },
                highlight: function(element) {
                    $(element).removeClass(
                        'border-gray-300 focus:border-green-500 focus:ring-green-500')
                    $(element).addClass('border-red-600 focus:border-red-500 focus:ring-red-500')
                },
                unhighlight: function(element) {
                    $(element).removeClass(
                        'border-gray-300 border-red-600 focus:border-red-500 focus:ring-red-500')
                    $(element).addClass('border-green-600 focus:border-green-500 focus:ring-green-500')
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });

            function isInArray(value, array) {
                return array.indexOf(value) !== -1;
            }

            $( document ).ready(function() {
                var country = $('#country').val();
                var ids = $('#membersIds').val();
                $.ajax({
                    url: `{{ url('get-members-by-country') }}/${country}`,
                    method: 'GET',
                    success: function(response) {
                        let html = ``;

                        for(let i=0; i<response.length; i++){
                            console.log(response[i].id);

                            html += ` <div class="flex items-center mt-2">
                                <div class="w-full bg-white">
                                    <div class="max-w-sm rounded overflow-hidden shadow-lg px-4 py-2">
                                        <div class=" flex">
                                            <div class="flex w-full">
                                                <img src="http://127.0.0.1:8000/assets/icons/user-circle.jpg" class="w-20 h-20" alt="User Image">
                                                <div class="px-6 py-4">
                                                    <div class="font-bold text-xl mb-2">${response[i].name}</div>`;
                                                    if(response[i].user_additionl_data && response[i].user_additionl_data.company_name){
                                                        html += `<div class="font-bold text-md mb-2">${response[i].user_additionl_data.company_name}</div>`;
                                                    }
                                                html += `</div>
                                            </div>
                                            <div>
                                                <img src="http://127.0.0.1:8000/assets/icons/users-group.png" alt="" class="w-20">
                                            </div>
                                        </div>`;

                                        if(response[i].areas_of_expertise){
                                            let expertises = response[i].areas_of_expertise.split(', ');
                                            // console.log('..', expertises)
                                            let expertisesHtml = ``;

                                            for(let j = 0; j < expertises.length; j++){
                                                expertisesHtml += `<div class="font-bold text-sm mr-2 flex items-center">
                                                    <span class="size-1.5 inline-block rounded-full bg-green-800 mr-1"></span>
                                                    ${expertises[j]}
                                                </div>`;
                                            }

                                            html += `<div class="flex flex-wrap my-2">${expertisesHtml}</div>`;
                                        }

                                    var isChecked = isInArray(response[i].id, ids);
                                    html += `</div> 
                                </div>
                                    <div class="w-20 text-center">
                                        <input type="checkbox" name="member[]" value="${response[i].id}"  ${isChecked ? 'checked' : ''} class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                                    </div>
                            </div>`;
                        }

                        $('.members-list').html(html);

                        if (response.length > 0) {
                            $('.available-members').removeClass('hidden');
                        } else {
                            $('.available-members').addClass('hidden');
                        }
                    }
                })
            });
        })
    </script>
</x-app-layout>
