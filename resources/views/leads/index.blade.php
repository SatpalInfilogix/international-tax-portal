<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('My Leads') }}
                </h1>
                <a href="{{ route('dashboard') }}" class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>

            <div class="all-leads-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('All Leads') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Client Name</th>
                                <th class="px-4 py-2 bg-gray-10 border">Introducer</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Created</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allLeads as $key => $lead)
                            <tr>
                                <td class="px-4 py-2 border">{{ $lead->client_name }}</td>
                                <td class="px-4 py-2 border">{{ Auth::user()->name }}</td>
                                <td class="px-4 py-2 border">{{  Carbon\Carbon::parse($lead->created_at)->format('d M, Y') }}</td>
                                <td class="px-4 py-2 border">
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">Open</button>
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="received-leads-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Received') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Client Name</th>
                                <th class="px-4 py-2 bg-gray-10 border">Introducer</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Created</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receivedLeads as $key => $lead)
                            <tr>
                                <td class="px-4 py-2 border">{{ $lead->client_name }}</td>
                                <td class="px-4 py-2 border">{{ Auth::user()->name }}</td>
                                <td class="px-4 py-2 border">{{ ($lead->created_at)->format('d M,Y')}}</td>
                                <td class="px-4 py-2 border">
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Open</button>
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="sent-leads-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Sent') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Client Name</th>
                                <th class="px-4 py-2 bg-gray-10 border">Introducer</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Created</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sentLeads as $key => $lead)
                            <tr>
                                <td class="px-4 py-2 border">{{ $lead->client_name }}</td>
                                <td class="px-4 py-2 border">{{ Auth::user()->name }}</td>
                                <td class="px-4 py-2 border">{{ ($lead->created_at)->format('d M,Y')}}</td>
                                <td class="px-4 py-2 border">
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Open</button>
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td class="px-4 py-2 border">Test</td>
                                <td class="px-4 py-2 border">Admin</td>
                                <td class="px-4 py-2 border">2021-05-14</td>
                                <td class="px-4 py-2 border">
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Open</button>
                                    <button class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600">Delete</button>
                                </td>
                            </tr> --}}
                        </tbody>
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
