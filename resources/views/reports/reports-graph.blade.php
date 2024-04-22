<x-app-layout>
    <style>
        #canvas {
            height: 380px !important;
            width: 1000px !important;
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between">
                <h1 class="font-semibold text-4xl text-gray-800 leading-tight">
                    {{ __('Reports of business Sent') }}
                </h1>
                <a href="{{ route('reports.index') }}"
                    class="h-full text-white px-4 py-2 rounded-md bg-green-500 border-green-600 hover:bg-green-700 hover:border-green-800">
                    {{ __('Back') }}
                </a>
            </div>

            <div class="reports-container">
                <div class="overflow-x-auto bg-white p-4 mt-2">
                    <div id="chart-container">
                        <canvas id="canvas" height="280" width="692"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var userData = <?php echo $data; ?>;
            var name = [];
            var leadAmounts = [];

            for (var i in userData) {
                name.push(userData[i].name);
                leadAmounts.push(userData[i].leadAmounts);
            }
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: name,
                    datasets: [{
                        backgroundColor: '#7cb5ec',
                        borderColor: '#7cb5ec',
                        label: '',
                        data: leadAmounts,
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
        });
    </script>
</x-app-layout>
