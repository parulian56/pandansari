<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Halaman Coblos
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($calon as $c)
                <div class="bg-white shadow rounded-lg p-5 text-center">
                    <h3 class="text-lg font-bold mb-2">{{ $c->nama }}</h3>
                    <p class="mb-4">Visi: {{ $c->visi }}</p>
                    <p class="mb-4">Misi: {{ $c->misi }}</p>
                    <form action="{{ route('coblos.vote', $c->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                            Coblos
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
