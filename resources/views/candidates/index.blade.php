<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kandidat') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Notifikasi sukses --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-end mb-4">
                <a href="{{ route('candidate.create') }}" 
                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    + Tambah Kandidat
                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                @if($candidates->count())
                    <table class="min-w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2 text-left">ID</th>
                                <th class="border px-4 py-2 text-left">Nama</th>
                                <th class="border px-4 py-2 text-left">Foto</th>
                                <th class="border px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidates as $candidate)
                                <tr>
                                    <td class="border px-4 py-2">{{ $candidate->id }}</td>
                                    <td class="border px-4 py-2">{{ $candidate->name }}</td>
                                    <td class="border px-4 py-2">
                                        @if($candidate->image)
                                            <img src="{{ asset('storage/' . $candidate->image) }}" 
                                                 alt="{{ $candidate->name }}" 
                                                 class="w-16 h-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-500">Tidak ada foto</span>
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <a href="{{ route('candidate.edit', $candidate->id) }}" 
                                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                            Edit
                                        </a>

                                        <form action="{{ route('candidate.destroy', $candidate->id) }}" 
                                              method="POST" class="inline-block"
                                              onsubmit="return confirm('Yakin hapus kandidat ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-500">Belum ada kandidat.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
