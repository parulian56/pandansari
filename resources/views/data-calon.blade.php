<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Calon
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto">
        <a href="{{ route('calon.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Calon</a>

        <table class="table-auto w-full mt-4 border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Foto</th>
                    <th class="px-4 py-2 border">Nama</th>
                    <th class="px-4 py-2 border">Visi</th>
                    <th class="px-4 py-2 border">Misi</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($calons as $calon)
                    <tr>
                        <td class="px-4 py-2 border text-center">
                            @if($calon->foto)
                                <img src="{{ asset('storage/'.$calon->foto) }}" class="h-16 mx-auto rounded">
                            @else
                                <span class="text-gray-500">Tidak ada</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 border">{{ $calon->nama_lengkap }}</td>
                        <td class="px-4 py-2 border">{{ $calon->visi }}</td>
                        <td class="px-4 py-2 border">{{ $calon->misi }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('calon.edit', $calon->id) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('calon.destroy', $calon->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
