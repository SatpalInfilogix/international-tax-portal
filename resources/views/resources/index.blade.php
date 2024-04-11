<x-app-layout>
    <div class="sm:px-6 lg:px-8 max-w-7xl mx-auto py-12">

        <div class="flex justify-between">
            <h1 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Resources') }}
            </h1>

            <a href="{{ route('resources.create') }}"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                <i class="ri-add-fill"></i>
            </a>
        </div>

        <x-success-message :message="session('success-message')" />

        <div class="flex justify-end mt-4">
            <a href="{{ route('dashboard') }}"
                class="bg-green-500 border-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                {{ __('Back') }}
            </a>
        </div>
        @if ($resources->count() > 0)
        <div class="py-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($resources as $key => $resource)
            <div class="col-span-1 lg:col-span-1 bg-white shadow-md">
                <div class="relative">
                    <img class="w-full" src="{{URL::asset($resource->image)}}"alt="Sunset in the mountains">
                    <div class="absolute top-2 right-2">
                        <a href="{{ route('resources.edit', $resource->id)}}" class="bg-green-500 text-white hover:bg-green-600 py-1 px-2 rounded-full mr-1 text-md">
                            <i class="ri-pencil-line"></i>
                        </a>

                        <button  data-id="{{$resource->id}}" class="bg-green-500 text-white hover:bg-green-600 py-1 px-2 rounded-full text-md confirm-delete">
                            <i class="ri-close-fill"></i>
                        </button>
                    </div>
                </div>
                <div class="px-4 py-4">
                    <div class="font-bold text-md mb-2">{{ $resource->title }}</div>
                    <p class="text-gray-700 text-sm">{{ $resource->rich_text}}</p>
                    <p class="text-sm text-right text-gray-500 italic">{{ $resource->date}}</p>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <div class="font-bold text-center mt-5 text-red-500">{{__('Records Not Found')}}</div>
        @endif
    </div>
    <script>
        $('.confirm-delete').on('click', function() {
            var id = $(this).data('id');
            var href = "{{ route('resources.index') }}";
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
                        url: "{{ route('resources.destroy', '') }}/" + id,
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
