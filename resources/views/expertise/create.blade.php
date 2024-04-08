
<div data-modal="create-new-expertise-request"
class="hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
<div class="sm:max-w-lg sm:w-full m-3 sm:mx-auto">
    <div
        class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
        <div class="flex justify-between items-center py-3 px-4 border-b">
            <h3 class="text-xl font-bold text-gray-800">
                Create new expertise request
            </h3>
            <button type="button"
                class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none close-modal">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <form action="">
            <div class="p-4 overflow-y-auto">
                <div class="mb-2">
                    <x-input-label for="country" :value="__('Country')" />
                    <select id="country"
                        class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                        <option value="">Select Country</option>
                        <option value="US">United States</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="request" :value="__('Request')" />
                    <x-text-area id="request" name="request" type="text" class="mt-1 block w-full" />
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
