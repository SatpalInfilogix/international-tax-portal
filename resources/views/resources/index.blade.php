<x-app-layout>
    <div class="sm:px-6 lg:px-8 max-w-7xl mx-auto py-12">

        <div class="flex justify-between">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Resources') }}
            </h1>

            <a href="{{ route('resources.create') }}"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                <i class="ri-add-fill"></i>
            </a>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('dashboard') }}"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                {{ __('Back') }}
            </a>
        </div>

        <div class="py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md">
                <img class="w-full"
                    src="https://infilogix.com/portal/uploads/news_events/dance9836341_09f1b11e-811f-11e8-bd7f-aad8d1b78451.jpg"
                    alt="Sunset in the mountains">
                <div class="px-4 py-4">
                    <div class="font-bold text-md mb-2">Lorem Ipsum</div>
                    <p class="text-gray-700 text-sm">In publishing and graphic design, Lorem ipsum is a placeholder text
                        commonly used to demonstrate the visual form of a document or a typeface without relying on
                        meaningful content.
                    </p>
                    <p class="text-sm text-right text-gray-500 italic">02 Apr, 2024</p>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md">
                <img class="w-full"
                    src="https://infilogix.com/portal/uploads/news_events/dance9836341_09f1b11e-811f-11e8-bd7f-aad8d1b78451.jpg"
                    alt="Sunset in the mountains">
                <div class="px-4 py-4">
                    <div class="font-bold text-md mb-2">Lorem Ipsum</div>
                    <p class="text-gray-700 text-sm">In publishing and graphic design, Lorem ipsum is a placeholder text
                        commonly used to demonstrate the visual form of a document or a typeface without relying on
                        meaningful content.
                    </p>
                    <p class="text-sm text-right text-gray-500 italic">02 Apr, 2024</p>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md">
                <img class="w-full"
                    src="https://infilogix.com/portal/uploads/news_events/dance9836341_09f1b11e-811f-11e8-bd7f-aad8d1b78451.jpg"
                    alt="Sunset in the mountains">
                <div class="px-4 py-4">
                    <div class="font-bold text-md mb-2">Lorem Ipsum</div>
                    <p class="text-gray-700 text-sm">In publishing and graphic design, Lorem ipsum is a placeholder text
                        commonly used to demonstrate the visual form of a document or a typeface without relying on
                        meaningful content.
                    </p>
                    <p class="text-sm text-right text-gray-500 italic">02 Apr, 2024</p>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
