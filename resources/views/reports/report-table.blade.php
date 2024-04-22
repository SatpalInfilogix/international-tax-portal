<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @php
            $type = '';
            if(!empty($_GET['type'])){
                $type = $_GET['type'];
            }
            @endphp
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    @if($type == 'received-table')
                    {{ __('Reports of business Received') }}
                    @elseif($type == 'sent-table')
                    {{ __('Reports of business Sent') }}
                    @elseif($type == 'lost-table')
                    {{ __('Reports of business lost') }}
                    @elseif($type == 'won-table')
                    {{ __('Reports of business won') }}
                    @else
                    {{ __('Reports of expertise requests') }}
                    @endif
                </h1>
                <a href="{{ route('reports.index') }}" class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>

            <div class="reports-container">
                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Member</th>
                                <th class="px-4 py-2 border">Country</th>
                                <th class="px-4 py-2 bg-gray-10 border">
                                    @if($type == 'received-table')
                                        Total Sent Lead
                                    @elseif($type == 'sent-table')
                                        Total Received Lead
                                    @elseif($type == 'lost-table')
                                        Total Lost Lead
                                    @elseif($type == 'won-table')
                                        Total Won Lead
                                    @else
                                        Total Expertise
                                    @endif
                                </th>
                                @if(in_array($type, ['sent-table', 'received-table', 'lost-table', 'won-table']))
                                    <th class="px-4 py-2 bg-gray-10 border">Amount</th>
                                    <th class="px-4 py-2 bg-gray-10 border">Last 3 Month</th>
                                    <th class="px-4 py-2 bg-gray-10 border">Last 6 Month</th>
                                    <th class="px-4 py-2 bg-gray-10 border">Last 1 Year</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sentReceivedBusinessReports as $key => $businessReport)
                            <tr>
                                <td class="px-4 py-2 border">{{ $businessReport->name}}</td>
                                <td class="px-4 py-2 border">{{ $businessReport->userAdditionalData->country }}</td>
                                <td class="px-4 py-2 border">{{ $businessReport->leadCount }}</td>
                                @if(in_array($type, ['sent-table', 'received-table', 'lost-table', 'won-table']))
                                    <td class="px-4 py-2 border">{{ $businessReport->leadAmounts }}</td>
                                    <td class="px-4 py-2 border">{{ $businessReport->last3MonthAmount}}</td>
                                    <td class="px-4 py-2 border">{{ $businessReport->last6MonthAmount}}</td>
                                    <td class="px-4 py-2 border">{{ $businessReport->last1YearAmount}}</td>
                                @endif
                            </tr>
                            @endforeach
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
