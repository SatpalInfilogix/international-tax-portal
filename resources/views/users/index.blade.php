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
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-4 py-2 border">{{ $user->name }}</td>
                                <td class="px-4 py-2 border">{{ optional($user->userAdditionlData)->company_name ?? 'N/A'}}</td>
                                <td class="px-4 py-2 border">{{ optional($user->userAdditionlData)->country ?? 'N/A'}}</td>
                                <td class="px-4 py-2 border">{{ $user->user_type }} User</td>
                                <td class="px-4 py-2 border">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">Edit</a>
                                    <button data-id="{{ $user->id }}"
                                        class="rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 confirm-delete">Delete</button>
                                    <button data-id="{{ $user->id }}" data-status="{{ $user->user_status == 'Deactive'  ? 'Active' : 'Deactive'}}" class="{{ $user->user_status == 'Active' ? 'bg-green-500' : 'bg-red-500' }} rounded-full text-sm px-2 py-1 text-white bg-green-500 border-green-600 toggle-class">{{ $user->user_status == 'Active' ? 'Active' : 'Deactive' }}</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.data-table').DataTable();
        });

        $('.confirm-delete').on('click', function() {
            var id = $(this).data('id');
            var href = "{{ route('users.index') }}";
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
                        url: "{{ route('users.destroy', '') }}/" + id,
                        type:'DELETE',
                        datatype:'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                        }, success:function(data)
                        {
                            if(data.success == true){
                                window.location.reload();
                            }
                        }
                    })
                }
            });
        });

        $(function() {
            $('.toggle-class').on('click',function() {
                var id = $(this).data('id');
                var status = $(this).data('status');
                swal({
                    title: "Are you sure?",
                    text: `You want to ${status == 'Deactive' ? 'active' : 'deactive'} this user!`,
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: "post",
                            dataType: "json",
                            url: "{{ route('user-status') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                'status': status,
                                'id': id
                            },
                            success: function(result){
                                if(result.success == true){
                                    window.location.reload();
                                }
                            }
                        });
                    }
                })
            });
        })

    </script>

</x-app-layout>
