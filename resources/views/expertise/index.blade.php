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
                                <th class="px-4 py-2 border">Country</th>
                                <th class="px-4 py-2 bg-gray-10 border">Advisor</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Submitted</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                                <th class="px-4 py-2 bg-gray-10 border">Resolved</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sent_requests as $sent_request)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $sent_request->advisor->country }}</td>
                                    <td class="px-4 py-2 border">{{ $sent_request->advisor->name }}</td>
                                    <td class="px-4 py-2 border">{{  Carbon\Carbon::parse($sent_request->created_at)->format('Y-m-d'); }}</td>
                                    <td class="px-4 py-2 border">
                                        <button data-modal-trigger="view-expertise-request" data-detail="{{ json_encode($sent_request) }}"
                                            class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">View</button>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <input type="checkbox" name="is_resolved" value="{{ $sent_request->id }}" @checked($sent_request->is_resolved==1)
                                            class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                                    </td>
                                </tr>
                            @endforeach
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

    @include('expertise.view')

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();

            $('[name="is_resolved"]').change(function(){
                $.ajax({
                    url: `{{ url("expertise") }}/update-rquest-status/${$(this).val()}`,
                    method: 'PUT',
                    data: {
                        is_resolved: $(this).is(':checked') ? 1 : 0,
                        _token: "{{  csrf_token() }}"
                    },
                    success:function(response){
                        if(response.success){
                            let request_status = $(this).is(':checked') ? 'resolved': 'unresolved';

                            swal({
                                title: "Success!",
                                text: `Expertise request ${request_status} successfully!`,
                                icon: "success",
                                buttons: false,
                                timer: 2000
                            }); 
                        } else{
                            swal({
                                title: "Oops!",
                                text: `Something went wrong!`,
                                icon: "error",
                                buttons: false,
                                timer: 2000
                            }); 
                        }
                    }
                })
            })
        });
    </script>
</x-app-layout>
