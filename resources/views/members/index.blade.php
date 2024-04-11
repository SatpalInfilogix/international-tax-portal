<x-app-layout>
    <div class="sm:px-6 lg:px-8 max-w-7xl mx-auto py-12">

        <div class="flex justify-between">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Members Directory') }}
            </h1>

            <div>
                <a href="#"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md mr-4">
                    {{ __('Email All members') }}
                </a>
                <a href="{{ route('dashboard') }}"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                    {{ __('Back') }}
                </a>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <div class="col-start-2 col-span-2">
                <div class="sm:flex rounded-lg shadow-sm">
                    <input type="text" placeholder="Search Country"
                        class="py-2 px-4 pe-11 block w-full border-gray-200 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-gray-300 focus:ring-gray-300 disabled:opacity-50 disabled:pointer-events-none">
                    <button
                        class="py-2 px-4 inline-flex items-center min-w-fit w-full border border-gray-200 bg-gray-50 text-gray-500 -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:w-auto sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md">
                        <i class="ri-search-line"></i>
                    </button>
                </div>
            </div>
        </div>

        <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed/v1/place?key=API_KEY
    &q=Space+Needle,Seattle+WA">
        </iframe>



        <div class="py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($members as $member)
                <div class="px-4 py-4 col-span-1 lg:col-span-1 bg-white shadow-md">
                    <div class="flex">
                        <h2 class="font-extrabold text-md mb-2 mr-1">{{ $member->name }}</h2>
                        @if ($member->userAdditionalData && $member->userAdditionalData->country)
                            <span class="text-green-400">
                                ({{ $member->userAdditionalData->country }})
                            </span>
                        @endif
                    </div>
                    @if ($member->userAdditionalData && $member->userAdditionalData->company_name)
                        <p class="text-gray-700 text-sm"> ({{ $member->userAdditionalData->company_name }})</p>
                    @endif
                </div>
            @endforeach
            <!-- <div class="px-4 py-4 col-span-1 lg:col-span-1 bg-white shadow-md">
                <div class="flex">
                    <h2 class="font-extrabold text-md mb-2 mr-1">Sandeep</h2>
                    <span class="text-green-400">(Georgia)</span>
                </div>
                <p class="text-gray-700 text-sm">(San infi)</p>
            </div>
            <div class="px-4 py-4 col-span-1 lg:col-span-1 bg-white shadow-md">
                <div class="flex">
                    <h2 class="font-extrabold text-md mb-2 mr-1">Sandeep</h2>
                    <span class="text-green-400">(Georgia)</span>
                </div>
                <p class="text-gray-700 text-sm">(San infi)</p>
            </div> -->
        </div>


    </div>
</x-app-layout>
