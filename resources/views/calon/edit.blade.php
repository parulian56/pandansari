<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Calon
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <form action="{{ route('calon.update', $calon->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block">NIK</label>
                <input type="text" name="nik" class="w-full border rounded p-2" value="{{ $calon->nik }}" required>
            </div>

            <div>
                <label class="block">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="w-full border rounded p-2" value="{{ $calon->nama_lengkap }}" required>
            </div>

            <div>
                <label class="block">Visi</label>
                <textarea name="visi" class="w-full border rounded p-2" required>{{ $calon->visi }}</textarea>
            </div>

            <div>
                <label class="block">Misi</label>
                <textarea name="misi" class="w-full border rounded p-2" required>{{ $calon->misi }}</textarea>
            </div>

            <div>
                <label class="block">Foto</label>
                <input type="file" name="foto" class="w-full border rounded p-2">
                @if($calon->foto)
                    <img src="{{ asset('storage/'.$calon->foto) }}" class="w-32 mt-2">
                @endif
            </div>

            <div>
                <label class="block">Tahun Pencalonan</label>
                <input type="text" name="tahun_pencalonan" value="{{ $calon->tahun_pencalonan }}" class="w-full border rounded p-2">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
