<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('My Profile') }}
                </h1>

                <a href="{{ route('dashboard') }}"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white h-full px-4 py-2 rounded-md">
                    {{ __('Back') }}
                </a>
            </div>

            <x-success-message :message="session('success-message')" />

            <form name="update-profile" action="{{ route('profile.update') }}" method="POST" class="bg-white shadow" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="grid grid-cols-2">
                    <div class="p-4 pb-0 sm:p-8 sm:pb-0">
                        @include('profile.individual-form')
                    </div>
                    <div class="p-4 pb-0 sm:p-8 sm:pb-0">
                        @include('profile.company-form')
                    </div>
                </div>

                <div class="flex items-center gap-4 p-4 sm:p-8">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <x-secondary-button>{{ __('Reset') }}</x-secondary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function() {
            $("form[name='update-profile']").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    phone_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    }
                },
                messages: {
                    name: "Please enter your name",
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter valid email address"
                    },
                    phone_number: {
                        required: "Please enter a phone number",
                        minlength: "Please enter valid phone number",
                        maxlength: "Please enter valid phone number"
                    },
                },
                highlight: function(element) {
                    $(element).removeClass('focus:border-green-500 focus:ring-green-500')
                    $(element).addClass('focus:border-red-500 focus:ring-red-500')
                },
                unhighlight: function(element) {
                    $(element).removeClass('focus:border-red-500 focus:ring-red-500')
                    $(element).addClass('focus:border-green-500 focus:ring-green-500')
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>
