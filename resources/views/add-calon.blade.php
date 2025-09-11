            {{-- ====== FORM CALON ====== --}}
<div class="bg-white overflow-hiddden shadow-sm sm:rounded-lg">
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
