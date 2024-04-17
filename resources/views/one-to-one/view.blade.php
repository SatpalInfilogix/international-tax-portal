<div data-modal="view-one-to-one"
    class="hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">
                    View new 1 - to - 1
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none close-modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <form action="{{ route('one-to-one.index') }}" name="update-oneToOne" method="POST">
                @csrf
                @method('patch')

                <input type="hidden" name="oneToOne_id">

                <div class="p-4 overflow-y-auto">
                    <div class="mb-2">
                        <x-input-label for="country" :value="__('Country')" />
                        <select id="country" name="country" disabled
                            class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->country }}">{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <x-input-label for="advisor_name" :value="__('Memeber')" />
                        <x-text-input id="advisor_name" name="advisor_name" type="text" class="mt-1 block w-full"
                            disabled />
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
                                    <input type="date" name="date" id="date" value=""
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

                    <div class="mb-2 personal-notes-container">
                        <x-input-label for="personal_notes" :value="__('Personal Notes')" />
                        <x-text-area id="personal_notes" name="personal_notes" class="mt-1 block w-full" />
                   
                    </div>

                    <div class="reply-message-container hidden">
                        <div>
                            <x-input-label for="reply_message" :value="__('Reply')" />
                            <x-text-area id="reply_message" name="reply_message" class="mt-1 block w-full" />
                        </div>
                    </div>
                    <div class="flex items-center py-3">
                        <x-primary-button>
                            Update
                        </x-primary-button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    $(function() {
        $('[data-modal-trigger="view-one-to-one"]').click(function() {
            let oneToOne_detail = $(this).data('detail');
            $('[name="reply_message"]').parent().find('.error').remove();
            $('[name="reply_message"]').removeClass('border-red-600 border-green-600 focus:border-red-500 focus:ring-red-500')
            $('[name="reply_message"]').addClass('border-gray-300 focus:border-green-500 focus:ring-green-500');

            let country = ``;
            let advisor_name = ``;
            let date = ``;
            let time = ``;
            if (oneToOne_detail.advisor) {
                country = oneToOne_detail.user_additional_advisor_data.country;
                advisor_name = oneToOne_detail.advisor.name;
                date = oneToOne_detail.date;
                time = oneToOne_detail.time;

                // if(oneToOne_detail.reply_message){
                //     $('.reply-message-container').removeClass('hidden');
                    
                // } else{
                    $('.reply-message-container').addClass('hidden');
                // }
                $('.personal-notes-container').removeClass('hidden');
            } else {
                country = oneToOne_detail.user_additional_introducer_data.country;
                advisor_name = oneToOne_detail.introducer.name;
                date = oneToOne_detail.date;
                time = oneToOne_detail.time;

                $('.reply-message-container').removeClass('hidden');
                $('.personal-notes-container').addClass('hidden');

            }

            // if(oneToOne_detail.reply_message){
            //     // $('[name="update-oneToOne"] [type="submit"]').addClass('hidden');
            //     $('[name="update-oneToOne"] [name="reply_message"]').attr('disabled', 'disabled');
            // } else{
            //     // $('[name="update-oneToOne"] [type="submit"]').removeClass('hidden');
            //     $('[name="update-oneToOne"] [name="reply_message"]').removeAttr('disabled');
            // }

            let request_message = oneToOne_detail.request_message;

            $('[name="update-oneToOne"] [name="oneToOne_id"]').val(oneToOne_detail.id);
            $('[name="update-oneToOne"] [name="country"]').val(country);
            $('[name="update-oneToOne"] [name="advisor_name"]').val(advisor_name);
            $('[name="update-oneToOne"] [name="date"]').val(date);
            $('[name="update-oneToOne"] [name="time"]').val(time);
            $('[name="update-oneToOne"] [name="personal_notes"]').val(oneToOne_detail.request_message);
            $('[name="update-oneToOne"] [name="reply_message"]').val(oneToOne_detail.reply_message);
        })

        $('[name="update-oneToOne"]').validate({
            rules: {
                reply_message: "required",
            },
            messages: {
                reply_message: "Please enter reply",
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
                    url: `{{ url('one-to-one') }}/${$('[name="oneToOne_id"]').val()}`,
                    type: form.method,
                    data: $(form).serialize(),
                    success: function(response) {
                        if(response.success){
                            $(`#overlay`).addClass('hidden');
                            $('[data-modal="create-new-expertise-request"]').addClass('hidden');
                                
                            swal({
                                title: "Success!",
                                text: "One To One request sent successfully!",
                                icon: "success",
                                buttons: false,
                                timer: 2000
                            });
                            
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                        }
                    }
                })
            }
        })

    })
</script>
