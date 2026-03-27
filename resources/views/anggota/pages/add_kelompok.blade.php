<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelompok Tani - Tani Merdeka</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .bg-tani { background-color: #2F5233; }
        .text-tani { color: #2F5233; }
        .form-input:focus { outline: none; border-color: #2F5233; box-shadow: 0 0 0 2px rgba(47,82,51,0.2); }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col items-center pt-10 pb-10 px-4">

    <!-- logo -->   
    <div class="absolute top-6 left-6 z-20">
        <img src="{{ asset('assets/images/tanimerdeka-logo.png') }}" class="h-12 md:h-16 w-auto" alt="Logo">
    </div>


    <div class="w-full max-w-2xl bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
        <h1 class="text-2xl font-bold mb-2 text-center text-gray-800">Daftarkan Kelompok Tani Baru</h1>
        <p class="text-gray-500 mb-8 text-center text-sm">Silahkan lengkapi data kelompok tani di bawah ini. Data akan diverifikasi admin maksimal 2x24 jam.</p>

        <form action="{{ route('daftar.anggota.tambah-kelompok.process') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl text-sm">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Nama Kelompok Tani</label>
                <input type="text" name="nama_kelompok" placeholder="Contoh: Suka Maju Bersama" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Nomor SK</label>
                <input type="number" name="nomor_sk" placeholder="Masukkan nomor SK Kelompok Tani" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3" required>
            </div>

            <div class="bg-gray-50 p-5 rounded-xl border border-gray-200">
                <label class="block text-sm font-medium text-gray-700 mb-3 ml-1">Alamat Kelompok Tani (Pilih Berurutan)</label>
                <div class="grid grid-cols-2 gap-3 mb-3">
                    <select id="provinsi" name="provinsi_id" class="w-full form-input border border-gray-300 rounded-xl px-4 py-3 text-sm bg-white" required>
                        <option value="">1. Pilih Provinsi</option>
                        @foreach($provinsi as $prov)
                            <option value="{{ $prov->code }}">{{ $prov->name }}</option>
                        @endforeach
                    </select>
                    <select id="kota" name="kota_id" class="w-full form-input border border-gray-300 rounded-xl px-4 py-3 text-sm bg-gray-100 text-gray-400" disabled required>
                        <option value="">2. Pilih Kota/Kab</option>
                    </select>
                    <select id="kecamatan" name="kecamatan_id" class="w-full form-input border border-gray-300 rounded-xl px-4 py-3 text-sm bg-gray-100 text-gray-400" disabled required>
                        <option value="">3. Pilih Kecamatan</option>
                    </select>
                    <select id="desa" name="indonesia_village_id" class="w-full form-input border border-gray-300 rounded-xl px-4 py-3 text-sm bg-gray-100 text-gray-400" disabled required>
                        <option value="">4. Pilih Desa</option>
                    </select>
                </div>
                
                <div>
                    <input type="text" name="alamat_detail" placeholder="Detail Alamat (Contoh: Jl. Merdeka No. 1, RT 01/RW 02)" class="w-full form-input border border-gray-300 rounded-xl px-4 py-3 text-sm bg-white">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 ml-1">Upload Dokumen SK (PDF / Image)</label>
                <input type="file" name="sk" accept=".pdf, .jpg, .jpeg, .png" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3 bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                <p class="text-xs text-gray-500 mt-1 ml-1">Maksimal ukuran file 2MB.</p>
            </div>

            <div class="pt-6">
                <button type="submit" class="w-full bg-tani text-white font-bold py-3.5 rounded-xl shadow-lg hover:bg-green-800 transition-all">
                    Kirim Pengajuan
                </button>
                <div class="text-center mt-4">
                    <a href="{{ route('daftar.anggota') }}" class="text-sm text-gray-500 hover:underline">Kembali ke pendaftaran anggota</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function resetDropdown(element, defaultText) {
            element.innerHTML = `<option value="">${defaultText}</option>`;
            element.disabled = true;
            element.classList.add('bg-gray-100', 'text-gray-400');
            element.classList.remove('bg-white', 'text-black');
        }

        document.getElementById('provinsi').addEventListener('change', function() {
            let id = this.value;
            let kota = document.getElementById('kota');
            resetDropdown(document.getElementById('kecamatan'), '3. Pilih Kecamatan');
            resetDropdown(document.getElementById('desa'), '4. Pilih Desa');

            if(id) {
                kota.innerHTML = '<option value="">Memuat...</option>';
                fetch(`/api/wilayah/kota/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        kota.innerHTML = '<option value="">2. Pilih Kota/Kab</option>';
                        data.forEach(item => { kota.innerHTML += `<option value="${item.code}">${item.name}</option>`; });
                        kota.disabled = false;
                        kota.classList.remove('bg-gray-100', 'text-gray-400');
                        kota.classList.add('bg-white', 'text-black');
                    });
            } else { resetDropdown(kota, '2. Pilih Kota/Kab'); }
        });

        document.getElementById('kota').addEventListener('change', function() {
            let id = this.value;
            let kecamatan = document.getElementById('kecamatan');
            resetDropdown(document.getElementById('desa'), '4. Pilih Desa');

            if(id) {
                kecamatan.innerHTML = '<option value="">Memuat...</option>';
                fetch(`/api/wilayah/kecamatan/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatan.innerHTML = '<option value="">3. Pilih Kecamatan</option>';
                        data.forEach(item => { kecamatan.innerHTML += `<option value="${item.code}">${item.name}</option>`; });
                        kecamatan.disabled = false;
                        kecamatan.classList.remove('bg-gray-100', 'text-gray-400');
                        kecamatan.classList.add('bg-white', 'text-black');
                    });
            } else { resetDropdown(kecamatan, '3. Pilih Kecamatan'); }
        });

        document.getElementById('kecamatan').addEventListener('change', function() {
            let id = this.value;
            let desa = document.getElementById('desa');

            if(id) {
                desa.innerHTML = '<option value="">Memuat...</option>';
                fetch(`/api/wilayah/desa/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        desa.innerHTML = '<option value="">4. Pilih Desa</option>';
                        data.forEach(item => { desa.innerHTML += `<option value="${item.code}">${item.name}</option>`; });
                        desa.disabled = false;
                        desa.classList.remove('bg-gray-100', 'text-gray-400');
                        desa.classList.add('bg-white', 'text-black');
                    });
            } else { resetDropdown(desa, '4. Pilih Desa'); }
        });
    </script>
</body>
</html>