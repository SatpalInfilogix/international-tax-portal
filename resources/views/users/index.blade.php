<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('Manage Users') }}
                </h1>
                <a href="{{ route('users.create') }}"
                    class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Add new') }}
                </a>
            </div>

            <div class="overflow-x-auto bg-white p-4 mt-2">
                <table class="data-table table-auto border-collapse w-full pt-4">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 bg-gray-10 border">Company</th>
                            <th class="px-4 py-2 bg-gray-10 border">Country</th>
                            <th class="px-4 py-2 bg-gray-10 border">User Type</th>
                            <th class="px-4 py-2 bg-gray-10 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border">Sachin</td>
                            <td class="px-4 py-2 border">Test company</td>
                            <td class="px-4 py-2 border">India</td>
                            <td class="px-4 py-2 border">Fusion User</td>
                            <td class="px-4 py-2 border">
                                <button
                                    class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">Open</button>
                                <button
                                    class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Delete</button>
                                <button
                                    class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Active</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 border">Test</td>
                            <td class="px-4 py-2 border">Test company</td>
                            <td class="px-4 py-2 border">US</td>
                            <td class="px-4 py-2 border">Member User</td>
                            <td class="px-4 py-2 border">
                                <button
                                    class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Open</button>
                                <button
                                    class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Delete</button>
                                <button
                                    class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Active</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();
        });
    </script>

</x-app-layout>
