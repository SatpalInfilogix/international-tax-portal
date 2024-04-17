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
            @include('one-to-one.create')

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
                                <th class="px-4 py-2 bg-gray-10 border">Status</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($oneToOneSents as $key => $oneToOneSent)
                            <tr>
                                <td class="px-4 py-2 border">{{ $oneToOneSent->userAdditionalAdvisorData->country }}</td>
                                <td class="px-4 py-2 border">{{ $oneToOneSent->advisor->name }}</td>
                                <td class="px-4 py-2 border">{{ Carbon\Carbon::parse($oneToOneSent->created_at)->format('Y-m-d') }}</td>
                                <td class="px-4 py-2 border">
                                    <select name="resolved" data-id="{{ $oneToOneSent->id }}" class= "border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-md shadow-sm py-1 mr-2">
                                        <option value="Open" @selected($oneToOneSent->status == 'Open')>Open</option>
                                        <option value="Closed" @selected($oneToOneSent->status == 'Closed')>Closed</option>
                                        <option value="Cancelled" @selected($oneToOneSent->status == 'Cancelled')>Cancelled</option>
                                    </select>
                                </td>
                                <td class="px-4 py-2 border">
                                    <button data-detail="{{ json_encode($oneToOneSent) }}" data-modal-trigger="view-one-to-one"  class="view-button rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">{{ __('View'
                                    ) }}</button>
                                    <button data-id="{{ $oneToOneSent->id }} " data-href="{{ route('news-and-events.destroy', $oneToOneSent->id) }}" class="rounded-full text-sm px-2 py-1 text-white bg-red-500 border-red-600 confirm-delete">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="one-to-one-all-container">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('1 - to - 1 Received') }}
                </h1>

                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <table class="data-table table-auto border-collapse w-full pt-4">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Country</th>
                                <th class="px-4 py-2 bg-gray-10 border">Advisor</th>
                                <th class="px-4 py-2 bg-gray-10 border">Date Submitted</th>
                                <th class="px-4 py-2 bg-gray-10 border">Status</th>
                                <th class="px-4 py-2 bg-gray-10 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($oneToOneReceiveds as $key => $oneToOneReceiveds)
                            <tr>
                                <td class="px-4 py-2 border">{{ $oneToOneReceiveds->userAdditionalIntroducerData->country }}</td>
                                <td class="px-4 py-2 border">{{ $oneToOneReceiveds->introducer->name }}</td>
                                <td class="px-4 py-2 border">{{ Carbon\Carbon::parse($oneToOneReceiveds->created_at)->format('Y-m-d'); }}</td>
                                <td class="px-4 py-2 border">
                                    <select name="resolved" data-id="{{ $oneToOneReceiveds->id }}" class= "border-gray-300 focus:border-gray-300 focus:ring-gray-300 rounded-md shadow-sm py-1 mr-2">
                                        <option value="Open" @selected($oneToOneReceiveds->status == 'Open')>Open</option>
                                        <option value="Closed" @selected($oneToOneReceiveds->status == 'Closed')>Closed</option>
                                        <option value="Cancelled" @selected($oneToOneReceiveds->status == 'Cancelled')>Cancelled</option>
                                    </select>
                                </td>
                                <td class="px-4 py-2 border">
                                    <button data-modal-trigger="view-one-to-one" data-detail="{{ json_encode($oneToOneReceiveds) }}" class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">{{ __('View') }}</button>
                                    <button data-id="{{ $oneToOneReceiveds->id }} " data-href="{{ route('one-to-one.destroy', $oneToOneReceiveds->id) }}" class="rounded-full text-sm px-2 py-1 text-white bg-red-500 border-red-600 confirm-delete">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('one-to-one.view')

    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();
        });

        $('[name="resolved"]').change(function() {
            var status = $(this).val();
            var id = $(this).data('id');

            $.ajax({
                type: "post",
                dataType: "json",
                url: "{{ route('one-to-one-status') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    'status': status,
                    'id': id
                },
                success: function(result){
                    if(result.success == true){
                        swal({
                            title: "Success!",
                            text: `One to one status ${status} successfully!`,
                            icon: "success",
                            buttons: false,
                            timer: 2000
                        });
                    }
                }
            });
        });

        $('.confirm-delete').on('click', function() {
            var id = $(this).data('id');
            var href = "{{ route('one-to-one.index') }}";
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('one-to-one.destroy', '') }}/" + id,
                        type:'DELETE',
                        datatype:'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        }, success:function(data)
                        {
                            if(data.success == true){
                                window.location.href = href;
                            }
                        }
                    })
                }
            });
        });
    </script>

</x-app-layout>
