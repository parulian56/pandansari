<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Voting
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-6">
            @foreach($calons as $c)
                <div class="bg-white p-4 rounded shadow text-center">
                    @if($c->foto)
                        <img src="{{ asset('storage/'.$c->foto) }}" 
                             alt="Foto {{ $c->nama_lengkap }}" 
                             class="w-32 h-32 object-cover rounded-full mx-auto mb-3">
                    @endif

                    <h3 class="font-bold text-lg">{{ $c->nama_lengkap }}</h3>
                    <p class="text-gray-600">NIK: {{ $c->nik }}</p>

                    <form action="{{ route('voting.vote', $c->id) }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" 
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            ✅ Coblos
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
