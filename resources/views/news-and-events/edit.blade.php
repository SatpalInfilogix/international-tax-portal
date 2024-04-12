<x-app-layout>
    <div class="py-12">

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex justify-between">
                    <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('Update News/Event') }}
                    </h1>

                    <a href="{{ route('news-and-events.index') }}"
                        class="bg-green-500 border-green-600 hover:bg-green-700 text-white h-full px-4 py-2 rounded-md">
                        {{ __('Back') }}
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <form action="{{ route('news-and-events.update', $newsAndEvent->id) }}" method="post" name="NewsAndEvents"
                        class="bg-white shadow" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="pb-3">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $newsAndEvent->title)"
                                    autofocus />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="image" :value="__('Image')" />
                                <x-file-input name="image" id="image"></x-file-input>
                                <img id="imagePreview" src="{{URL::asset($newsAndEvent->image)}}" accept="image/*" width="50" hight="50">
                            </div>

                            <div class="pb-3">
                                <x-input-label for="name" :value="__('Url')" />
                                <x-text-input id="name" name="url" type="text" class="mt-1 block w-full" :value="old('url', $newsAndEvent->url)" />
                            </div>

                            <div class="pb-3">
                                <x-input-label for="name" :value="__('Text')" />
                                <x-text-area id="name" name="text" class="mt-1 block w-full" :value="old('text', $newsAndEvent->text)" />
                            </div>

                            <div class="buttons-container mt-4">
                                <x-primary-button>
                                    {{ __('Update News/Event') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("form[name='NewsAndEvents']").validate({
                rules: {
                    title: "required",
                },
                messages: {
                    title: "Title field is required.",
                },
                highlight: function(element) {
                    $(element).removeClass('border-gray-300 focus:border-green-500 focus:ring-green-500')
                    $(element).addClass('border-red-600 focus:border-red-500 focus:ring-red-500')
                },
                unhighlight: function(element) {
                    $(element).removeClass(
                        'border-gray-300 border-red-600 focus:border-red-500 focus:ring-red-500')
                    $(element).addClass('border-green-600 focus:border-green-500 focus:ring-green-500')
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });

        document.getElementById('image').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').setAttribute('src', '');
            }
        });
    </script>
</x-app-layout>
