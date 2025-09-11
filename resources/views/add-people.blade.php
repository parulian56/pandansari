<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Tambah Data Masyarakat</h3>

                    <form action="{{ route('masyarakat.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block font-medium">NIK</label>
                            <input type="text" name="nik" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block font-medium">KK</label>
                            <input type="text" name="kk" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block font-medium">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block font-medium">Tempat Tanggal Lahir</label>
                            <input type="text" name="tempat_tanggal_lahir" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block font-medium">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border rounded p-2" required>
                                <option value="">-- Pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium">Alamat</label>
                            <input type="text" name="alamat" class="w-full border rounded p-2" required>
                        </div>

                        <div>
                            <label class="block font-medium">RT</label>
                            <input type="text" name="rt" class="w-full border rounded p-2">
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                            Simpan Masyarakat
                        </button>
                    </form>
                </div>
            </div>
