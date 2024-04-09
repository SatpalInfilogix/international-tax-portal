<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('My Profile') }}
                </h1>

                <a href="{{ route('users.index') }}"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white h-full px-4 py-2 rounded-md">
                    {{ __('Back') }}
                </a>
            </div>

            <x-success-message :message="session('success-message')" />

            <div class="grid grid-cols-2">
                <form name="create-user" action="{{ route('users.store') }}" method="POST" class="bg-white shadow">
                    @csrf
                    <div class="p-4 pb-0 sm:p-8 sm:pb-0">
                        <div class="mb-2">
                            <x-input-label for="user_type" :value="__('User Type')" />
                            <select id="user_type" name="user_type" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                                <option value="Fusion" @selected(old('user_type')=='Fusion')>Fusion User</option>
                                <option value="Member" @selected(old('user_type')=='Member')>Member User</option>
                            </select>
                        </div>

                        
                        <div class="mb-2">
                            <x-input-label for="name" :value="__('Full Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" />
                        </div>

                        <div class="mb-2">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <div class="mb-2">
                            <x-input-label for="country" :value="__('Country')" />
                            <select id="country" name="country" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                                <option value="" disabled  @selected(!old('country'))>Select Country</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->name }}" @selected(old('country')==$country->name)>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-2">
                            <x-input-label for="company_size" :value="__('Size')" />
                            <select id="company_size" name="company_size" class= "border-gray-300 focus:border-green-500 focus:ring-green-500 mt-1 rounded-md shadow-sm w-full">
                                <option value="Small" @selected(old('company_size')=='Small')>Small</option>
                                <option value="Medium" @selected(old('company_size')=='Medium')>Medium</option>
                                <option value="Large" @selected(old('company_size')=='Large')>Large</option>
                            </select>
                        </div>

                        <div class="mb-2">
                            <x-input-label for="company_name" :value="__('Company')" />
                            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old('company_name')" />
                        </div>


                        <div class="flex items-center gap-4 py-4 ">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <x-secondary-button>{{ __('Reset') }}</x-secondary-button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $("form[name='create-user']").validate({
                rules: {
                    user_type: "required",
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    country: "required",
                    company_size: "required",
                    company_name: "required"
                },
                messages: {
                    user_type: "Please enter user name",
                    name: "Please enter user name",
                    email: {
                        required: "Please enter an email address",
                        email: "Please enter valid email address"
                    },
                    country: "Please select country",
                    company_size: "Please select company size",
                    company_name: "Please enter company name",
                },
                highlight: function(element) {
                    $(element).removeClass('border-gray-300 focus:border-green-500 focus:ring-green-500')
                    $(element).addClass('border-red-600 focus:border-red-500 focus:ring-red-500')
                },
                unhighlight: function(element) {
                    $(element).removeClass('border-gray-300 border-red-600 focus:border-red-500 focus:ring-red-500')
                    $(element).addClass('border-green-600 focus:border-green-500 focus:ring-green-500')
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>
