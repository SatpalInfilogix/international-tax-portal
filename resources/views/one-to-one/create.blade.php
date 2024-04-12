<div data-modal="create-new-one-to-one"
    class="hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">
                    Create new 1 - to - 1
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none close-modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <form action="{{ route('one-to-one.store') }}" name="create-onetoone-request" method="POST">
                @csrf
                <div class="p-4 overflow-y-auto">
                    <div class="mb-2">
                        <x-input-label for="country" :value="__('Country')" />
                        <select id="country" name="country"
                            class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country }}">{{ $country->country }}</option>
                            @endforeach
                            {{-- <option value="US">United States</option> --}}
                        </select>
                    </div>

                    <div class="mb-2 advisors-list-container hidden">
                        <x-input-label :value="__('Select Users')" />
                        <div class="grid grid-cols-2 gap-4 advisors-list"></div>
                    </div>

                    <div class="mb-2">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="country" :value="__('Meeting Date:')" />

                                <div class="relative max-w-sm">
                                    <div
                                        class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" name="date" id="date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>

                            </div>
                            <div>
                                <x-input-label for="time" :value="__('Meeting Time:')" />
                                <div class="relative">
                                    <div
                                        class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                        <i class="ri-time-fill" class="w-4 h-4 text-gray-500 dark:text-gray-400"></i>
                                    </div>
                                    <input type="time" id="time" name="time"
                                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       value="00:00" required />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div>
                        <x-input-label for="personal_notes" :value="__('Personal Notes')" />
                        <x-text-area id="personal_notes" name="personal_notes" class="mt-1 block w-full" />
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <x-primary-button>
                        Submit Note
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('[name="country"]').change(function() {
            if (!$(this).val()) {
                $('.advisors-list-container').addClass('hidden');
            } else {
                $.ajax({
                    url: `{{ url('get-members-by-country') }}/${ $(this).val() }`,
                    method: 'GET',
                    success: function(response) {
                        if (response.length > 0) {
                            $('.advisors-list-container').removeClass('hidden');
                            $('.advisors-list').html(``);
                            for (let i = 0; i < response.length; i++) {
                                let companyNameHtml = ``;
                                if (response[i].user_additionl_data && response[i]
                                    .user_additionl_data.company_name) {
                                    companyNameHtml =
                                        `(${response[i].user_additionl_data.company_name})`;
                                }
                                $('.advisors-list').append(`<div class="mt-1">
                                <label for="advisor-${i + 1}" class="inline-flex items-center">
                                    <input id="advisor-${i + 1}" name="advisors[]" value="${response[i].id}" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm" />
                                    <span class="ms-2 text-sm text-gray-600">${response[i].name} ${companyNameHtml}</span>
                                </label>
                            </div>`);
                            }
                        } else {
                            $('.advisors-list-container').addClass('hidden');
                        }
                    }
                })
            }
        })

        $("form[name='create-onetoone-request']").validate({
            rules: {
                country: "required",
                "advisors[]": "required",
                date: "required",
                time: "required"
                // personal_notes: "required",
            },
            messages: {
                country: "Please select a country",
                date: "Please select a date",
                time: "Please select a time",
                // personal_notes: "Please enter write your request message",
                "advisors[]": ""
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
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if(response.success){
                            $(`#overlay`).addClass('hidden');
                            $('[data-modal="create-onetoone-request"]').addClass('hidden');
                                
                            swal({
                                title: "Success!",
                                text: "One to one request sent successfully!",
                                icon: "success",
                                buttons: false,
                                timer: 2000
                            });
                            
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }
                    }
                });
            }
        });
    });
    </script>
