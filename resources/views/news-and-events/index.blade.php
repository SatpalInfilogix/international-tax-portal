<x-app-layout>
    <div class="sm:px-6 lg:px-8 max-w-7xl mx-auto py-12">

        <div class="flex justify-between">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('News & Events') }}
            </h1>

            <a href="{{ route('news-and-events.create') }}"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                <i class="ri-add-fill"></i>
            </a>
        </div>

        <x-success-message :message="session('success-message')" />

        <div class="flex justify-end mt-4">
            <a href="https://us02web.zoom.us/j/82104922098?pwd=UitWeWhHSER1dTZhRVZ3ejZRZ1dyQT09#success" target="_blank"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md mr-4">
                {{ __('Go to breakout room') }}
            </a>
            <a href="{{ route('dashboard') }}"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                {{ __('Back') }}
            </a>
        </div>

        @if ($newsAndEvents->count() > 0)
        <div class="py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($newsAndEvents as $key => $newsAndEvent)
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md">
                <div class="relative">
                <img class="w-full"
                    src="{{URL::asset($newsAndEvent->image)}}"
                    alt="{{ ucwords($newsAndEvent->title) }}">

                    <div class="absolute top-2 right-2">
                        <a href="{{ route('news-and-events.edit', $newsAndEvent->id) }}" class="bg-green-500 text-white hover:bg-green-600 py-1 px-2 rounded-full mr-1 text-md">
                            <i class="ri-pencil-line"></i>
                        </a>
                        <button class="bg-green-500 text-white hover:bg-green-600 py-1 px-2 rounded-full text-md">
                            <i class="ri-close-fill"></i>
                        </button>
                    </div>
                </div>
                
                <div class="px-4 py-4">
                    <div class="font-bold text-md mb-2">{{ ucwords($newsAndEvent->title) }}</div>
                    <p class="text-gray-700 text-sm">{{ Str::limit($newsAndEvent->text, 100) }}</p>
                    <p class="text-sm text-right text-gray-500 italic">{{ $newsAndEvent->date }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="font-bold text-center mt-5 text-red-500">{{__('Records Not Found')}}</div>
        @endif
    </div>
</x-app-layout>
