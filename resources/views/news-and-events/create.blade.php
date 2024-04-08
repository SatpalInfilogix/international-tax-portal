<x-app-layout>
    <div class="py-12">

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex justify-between">
                    <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('Add News/Event') }}
                    </h1>    
        
                    <a href="{{ route('news-and-events.index') }}"
                        class="bg-green-500 border-green-600 hover:bg-green-700 text-white h-full px-4 py-2 rounded-md">
                        {{ __('Back') }}
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="pb-3">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required
                                autofocus />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="image" :value="__('Image')" />
                            <x-file-input name="image" id="image"></x-file-input>
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Url')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
                        </div>

                        <div class="pb-3">
                            <x-input-label for="name" :value="__('Text')" />
                            <x-text-area id="name" name="name" type="text" class="mt-1 block w-full" required
                                autofocus />
                        </div>

                        <div class="buttons-container mt-4">
                            <x-primary-button>
                                {{ __('Add News/Event') }}
                            </x-primary-button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
