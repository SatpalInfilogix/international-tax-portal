<div data-modal="view-expertise-request"
    class="hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 class="text-xl font-bold text-gray-800">
                    Expertise Request
                </h3>
                <button type="button"
                    class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none close-modal">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <form action="{{ route('expertise.index') }}" name="update-expertise-request" method="POST">
                @csrf
                @method('patch')

                <input type="hidden" name="expertise_id">

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
                        <x-input-label for="request_message" :value="__('Request')" />
                        <x-text-area id="request_message" name="request_message" class="mt-1 block w-full" disabled />
                    </div>

                    <div class="reply-message-container hidden">
                        <div>
                            <x-input-label for="reply_message" :value="__('Reply')" />
                            <x-text-area id="reply_message" name="reply_message" class="mt-1 block w-full" />
                        </div>
                        <div class="flex items-center py-3">
                            <x-primary-button>
                                Update
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('[data-modal-trigger="view-expertise-request"]').click(function() {
            let expertise_detail = $(this).data('detail');

            $('[name="reply_message"]').parent().find('.error').remove();
            $('[name="reply_message"]').removeClass('border-red-600 border-green-600 focus:border-red-500 focus:ring-red-500')
            $('[name="reply_message"]').addClass('border-gray-300 focus:border-green-500 focus:ring-green-500');

            let country = ``;
            let advisor_name = ``;
            if (expertise_detail.advisor) {
                country = expertise_detail.advisor.country;
                advisor_name = expertise_detail.advisor.name;

                if(expertise_detail.reply_message){
                    $('.reply-message-container').removeClass('hidden');
                    
                } else{
                    $('.reply-message-container').addClass('hidden');
                }
            } else {
                country = expertise_detail.introducer.country;
                advisor_name = expertise_detail.introducer.name;
                $('.reply-message-container').removeClass('hidden');
            }

            if(expertise_detail.reply_message){
                $('[name="update-expertise-request"] [type="submit"]').addClass('hidden');
                $('[name="update-expertise-request"] [name="reply_message"]').attr('disabled', 'disabled');
            } else{
                $('[name="update-expertise-request"] [type="submit"]').removeClass('hidden');
                $('[name="update-expertise-request"] [name="reply_message"]').removeAttr('disabled');
            }

            let request_message = expertise_detail.request_message;

            $('[name="update-expertise-request"] [name="expertise_id"]').val(expertise_detail.id);
            $('[name="update-expertise-request"] [name="country"]').val(country);
            $('[name="update-expertise-request"] [name="advisor_name"]').val(advisor_name);
            $('[name="update-expertise-request"] [name="request_message"]').val(expertise_detail.request_message);
            $('[name="update-expertise-request"] [name="reply_message"]').val(expertise_detail.reply_message);
        })

        $('[name="update-expertise-request"]').validate({
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
                    url: `{{ url('expertise') }}/${$('[name="expertise_id"]').val()}`,
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
                })
            }
        })
    })
</script>
