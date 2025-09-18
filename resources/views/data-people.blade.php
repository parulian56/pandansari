<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Masyarakat
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto">
        <table class="table-auto w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">NIK</th>
                    <th class="px-4 py-2 border">KK</th>
                    <th class="px-4 py-2 border">Nama Lengkap</th>
                    <th class="px-4 py-2 border">Tempat/Tanggal Lahir</th>
                    <th class="px-4 py-2 border">Jenis Kelamin</th>
                    <th class="px-4 py-2 border">Alamat</th>
                    <th class="px-4 py-2 border">RT</th>
                </tr>
            </thead>
            <tbody>
                @foreach($masyarakats as $m)
                    <tr>
                        <td class="px-4 py-2 border">{{ $m->nik }}</td>
                        <td class="px-4 py-2 border">{{ $m->kk }}</td>
                        <td class="px-4 py-2 border">{{ $m->nama_lengkap }}</td>
                        <td class="px-4 py-2 border">{{ $m->tempat_tanggal_lahir }}</td>
                        <td class="px-4 py-2 border">{{ $m->jenis_kelamin }}</td>
                        <td class="px-4 py-2 border">{{ $m->alamat }}</td>
                        <td class="px-4 py-2 border">{{ $m->rt }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
