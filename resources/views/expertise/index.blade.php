<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('Expertise Request') }}
                </h1>
                <a href="{{ route('dashboard') }}"
                    class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>

            <div class="flex justify-end">
                <button data-modal-trigger="create-new-expertise-request"
                    class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    <i class="ri-add-fill"></i>
                    Create new expertise request
                </button>
            </div>

            @include('expertise.create')

            <div class="all-leads-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Expertise Request Sent') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4  mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Client Name</th>
                                <th class="px-4 py-2 bg-gray-10 border">Advisor</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Submitted</th>
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
                                    <button
                                        class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">View</button>
                                </td>
                                <td class="px-4 py-2 border">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:green-green-500">
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border">Test</td>
                                <td class="px-4 py-2 border">Admin</td>
                                <td class="px-4 py-2 border">2021-05-14</td>
                                <td class="px-4 py-2 border">
                                    <button
                                        class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">View</button>
                                </td>
                                <td class="px-4 py-2 border">
                                    <input type="checkbox"
                                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="received-leads-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Expertise Request Received') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Client Name</th>
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
