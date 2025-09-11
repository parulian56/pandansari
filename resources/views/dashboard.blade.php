<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Operator') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif



            {{-- ====== FORM CALON ====== --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Tambah Data Calon</h3>

                    <form action="{{ route('calon.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="text" name="nik" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="visi" class="form-label">Visi</label>
        <textarea name="visi" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="misi" class="form-label">Misi</label>
        <textarea name="misi" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="mb-3">
        <label for="tahun_pencalonan" class="form-label">Tahun Pencalonan</label>
        <input type="text" name="tahun_pencalonan" class="form-control" value="2025" required>
    </div>

    <!-- ✅ Tombol Simpan -->
    <button type="submit" class="btn btn-primary">Simpan Calon</button>
</form>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
