<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Calon
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">

                @if($calon->foto)
                    <img src="{{ asset('storage/'.$calon->foto) }}" 
                         alt="Foto Calon" class="w-48 h-48 object-cover mb-4 rounded">
                @endif

                <h3 class="text-2xl font-bold mb-2">{{ $calon->nama_lengkap }}</h3>
                <p><strong>NIK:</strong> {{ $calon->nik }}</p>
                <p><strong>Visi:</strong> {{ $calon->visi }}</p>
                <p><strong>Misi:</strong> {{ $calon->misi }}</p>

                <form action="{{ route('vote.store', $calon->id) }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" 
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        ✅ Coblos
                    </button>
                </form>

                <a href="{{ route('calon.index') }}" 
                   class="mt-4 inline-block text-gray-600 hover:underline">⬅ Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
