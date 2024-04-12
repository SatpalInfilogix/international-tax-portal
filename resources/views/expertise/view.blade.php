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

            <form action="{{ route('expertise.index') }}" name="view-expertise-request" method="POST">
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
                        <x-text-input id="advisor_name" name="advisor_name" type="text"
                            class="mt-1 block w-full" disabled />
                    </div>

                    <div>
                        <x-input-label for="request_message" :value="__('Request')" />
                        <x-text-area id="request_message" name="request_message" type="text"
                            class="mt-1 block w-full" disabled />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(function() {
        $('[data-modal-trigger]').click(function() {
            let expertise_detail = $(this).data('detail');

            $('[name="view-expertise-request"] [name="country"]').val(expertise_detail.advisor.country);
            $('[name="view-expertise-request"] [name="advisor_name"]').val(expertise_detail.advisor.name);
            $('[name="view-expertise-request"] [name="request_message"]').val(expertise_detail.request_message);
        })
    })
</script>
