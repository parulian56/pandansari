<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('Hasil Voting') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tabel Hasil -->
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Rekapitulasi Suara</h3>
                <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">No</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Nama Kandidat</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Jumlah Suara</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $index => $row)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $index+1 }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $row->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $row->total_votes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Chart Hasil -->
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Visualisasi Grafik</h3>
                <canvas id="resultChart" class="w-full h-64"></canvas>
            </div>

        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('resultChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($results->pluck('name')),
                datasets: [{
                    label: 'Jumlah Suara',
                    data: @json($results->pluck('total_votes')),
                    backgroundColor: [
                        '#f87171', '#60a5fa', '#34d399', '#fbbf24', '#a78bfa'
                    ],
                    borderRadius: 8,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>
</x-app-layout>
