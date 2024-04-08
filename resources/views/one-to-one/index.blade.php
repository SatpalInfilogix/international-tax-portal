<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('1 - to - 1') }}
                </h1>
                <a href="{{ route('dashboard') }}" class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>

            <div class="flex justify-end mt-4">
                <button data-modal-trigger="create-new-one-to-one"
                    class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                    <i class="ri-add-fill"></i>
                    {{ __('Create new 1 - to - 1') }}
                </button>
            </div>
            @include('one-to-one.create');

            <div class="one-to-one-sent-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('1 - to - 1 Sent') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Country</th>
                                <th class="px-4 py-2 bg-gray-10 border">Advisor</th>
                                <th class="px-4 py-2 bg-gray-10 border">Data Submitted</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                                <th class="px-4 py-2 bg-gray-10 border">Resolved</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border">Sachin</td>
                                <td class="px-4 py-2 border">Admin</td>
                                <td class="px-4 py-2 border">2021-05-14</td>
                                <td class="px-4 py-2 border">
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">{{ __('View'
                                    ) }}</button>
                                </td>
                                <td class="px-4 py-2 border">
                                    <select name="resolved" class= "border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-md shadow-sm py-1 mr-2">
                                        <option value="Open">Open</option>
                                        <option value="Closed">Closed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-red-500 border-red-600">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border">Test</td>
                                <td class="px-4 py-2 border">Admin</td>
                                <td class="px-4 py-2 border">2021-05-14</td>
                                <td class="px-4 py-2 border">
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">{{ __('View') }}</button>
                                </td>
                                <td class="px-4 py-2 border">
                                    <select name="resolved" class= "border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-md shadow-sm py-1 mr-2">
                                        <option value="Open">Open</option>
                                        <option value="Closed">Closed</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-red-500 border-red-600">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="one-to-one-all-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('1 - to - 1 All') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Country</th>
                                <th class="px-4 py-2 bg-gray-10 border">Advisor</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Submitted</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                                <th class="px-4 py-2 bg-gray-10 border">Resolved</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();
        });
    </script>

</x-app-layout>
