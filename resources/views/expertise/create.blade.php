<div data-modal="create-new-expertise-request"
    class="hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">
                    Create new expertise request
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none close-modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <form action="{{ route('expertise.store') }}" name="create-expertise-request" method="POST">
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
                        </select>
                    </div>

                    <div class="mb-2 advisors-list-container hidden">
                        <x-input-label :value="__('Select Users')" />
                        <div class="grid grid-cols-2 gap-4 advisors-list"></div>
                    </div>

                    <div>
                        <x-input-label for="request_message" :value="__('Request')" />
                        <x-text-area id="request_message" name="request_message" class="mt-1 block w-full" />
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <x-primary-button>
                        Submit Request
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


        $("form[name='create-expertise-request']").validate({
            rules: {
                country: "required",
                request_message: "required",
                "advisors[]": "required"
            },
            messages: {
                country: "Please select a country",
                request_message: "Please enter write your message",
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
                            $('[data-modal="create-new-expertise-request"]').addClass('hidden');
                                
                            swal({
                                title: "Success!",
                                text: "Expertise request sent successfully!",
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
    })
</script>
