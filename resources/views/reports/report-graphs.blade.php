<x-app-layout>
    @php
        $type = '';
        if (!empty($_GET['type'])) {
            $type = $_GET['type'];
        }
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    @if($type == 'sent-graph')
                        {{ __('Reports of business Sent') }}
                    @elseif($type == 'received-graph')
                        {{ __('Reports of business Received') }}
                    @elseif($type == 'lost-graph')
                        {{ __('Reports of business Lost')}}
                    @elseif($type == 'won-graph')
                        {{ __('Reports of business Won')}}
                    @else
                        {{ __('Reports of Experties')}}
                    @endif
                </h1>
                <a href="{{ route('reports.index') }}"
                    class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>

            <div class="reports-container">
                <div class="overflow-x-auto bg-white p-4 mt-2">
                    @foreach ($countries as $key => $country)
                        <div id="chart-container">
                            <canvas id="canvas-{{ $key }}" class="canvas-height" style="width: 700px; height: 200px;"
                                data-country="{{ $country->country }}" hidden ></canvas><br>
                        </div>
                    @endforeach
                    <input type="hidden" name="type" id="type" value="{{ $type }}">

                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('canvas').each(function() {
                var type = $('#type').val();
                let country = $(this).data("country");
                let canvasId = $(this).attr("id");
                let href = '';
                if (type == 'sent-graph') {
                    href = `{{ url('graph-data') }}/${country}`
                } else if (type == 'received-graph') {
                    href = `{{ url('recevived-graph') }}/${country}`
                } else if (type == 'lost-graph') {
                    href = `{{ url('lost-graph') }}/${country}`
                } else if (type == 'won-graph') {
                    href = `{{ url('won-graph') }}/${country}`
                } else if (type == 'experties-graph') {
                    href = `{{ url('experties-graph') }}/${country}`
                }
                $.ajax({
                    url: href,
                    method: "GET",
                    success: function(response) {
                        console.log(response);
                        var names = [];
                        let leadCount = [];
                        let availableLeads = [];
                        $.each(response, function(index, array) {
                            names.push(array.name);
                            leadCount.push(array.leadCount);

                            if (array.leadCount > 0) {
                                availableLeads.push(array.leadCount);
                            }
                        });


                        if(availableLeads.length > 0) {
                            var ctx = document.getElementById(canvasId).getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: names,
                                    datasets: [{
                                        backgroundColor: '#7cb5ec',
                                        borderColor: '#7cb5ec',
                                        label: country,
                                        data: leadCount,
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
