<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('Reporting
                                                            ') }}
                </h1>
                <a href="{{ route('dashboard') }}"
                    class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>


            <div>
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                <table class="min-w-full bg-white divide-y divide-gray-200">
                                
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                Amount of business sent per country/member	    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Graph View
                                                </a>
                                                <button data-href="{{ route('reports.report-table')}}" data-name="sent-table" class="report-table h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Table View
                                                </button>
                                                <button data-href="{{ route('reports.report-table')}}" data-name="sent-download-csv" class="report-table h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                                                    Download CSV
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                Amount of business received in total, per member and country	    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Graph View
                                                </a>
                                                <button data-href="{{ route('reports.report-table')}}" data-name="received-table" class="report-table h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Table View
                                                </button>
                                                <button data-href="{{ route('reports.report-table')}}" data-name="received-download-csv" class="report-table h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                                                    Download CSV
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                Amount of business lost in total, per member and country	    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Graph View
                                                </a>
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Table View
                                                </a>
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                                                    Download CSV
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                Amount of business won in total,per member and country	
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Graph View
                                                </a>
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Table View
                                                </a>
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                                                    Download CSV
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                Amount of Expertise Requests sent per member/country/total    
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Graph View
                                                </a>
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800 mr-2">
                                                    Table View
                                                </a>
                                                <a href="#" class="h-full text-white px-4 py-2 rounded-full bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                                                    Download CSV
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();
        });

        $('.report-table').click(function() {
            var type = $(this).data('name');
            var href = $(this).data('href');
            window.location.href = `${href}?type=${type}`;
        });
    </script>

</x-app-layout>
