<x-app-layout>
    <div class="py-12">

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="flex justify-between">
                    <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                        {{ __('Email all members') }}
                    </h1>    
        
                    <a href="{{ route('members.index') }}"
                        class="bg-green-500 border-green-600 hover:bg-green-700 text-white h-full px-4 py-2 rounded-md">
                        {{ __('Back') }}
                    </a>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <form action="{{ route('members.email') }}" method="post" name="email"
                            class="bg-white shadow" enctype="multipart/form-data">
                        @csrf
                    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="mb-3">
                            <x-input-label for="to" :value="__('To')" />
                            <x-text-input id="to" name="to" type="text" class="mt-1 block w-full" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="bcc" :value="__('Bcc')" />
                            <x-text-area id="bcc" name="bcc" type="text" class="mt-1 block w-full" value="{{$userEmail}}"/>
                        </div>

                        <div class="mb-3">
                            <x-input-label for="subject" :value="__('Subject')" />
                            <x-text-input id="subject" name="subject" type="text" class="mt-1 block w-full" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="message" :value="__('Message')" />
                            <x-text-area id="message" name="message" class="mt-1 block w-full" />
                        </div>

                        <div class="buttons-container mt-4">
                            <x-primary-button>
                                {{ __('Send Email') }}
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
            $("form[name='resource']").validate({
                rules: {
                    title: "required",
                    image: "required",
                },
                messages: {
                    title: "Title field is required.",
                    image: "Image field is required"
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
    </script>
</x-app-layout>
