<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota - Tani Merdeka</title>

    <!-- fonts, tailwind and sweet alert -->
     <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200..800&display=swap" rel="stylesheet">
     <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>     

     <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-tani {background-color: #2d4a22; }
        .text-tani {color:#2d4a22; }
        .border-tani {border-color: #2d4a22;}
        .form-input:focus{
            outline:none;
            border-color: #2d4a22;
            box-shadow: 0 0 0 2px rgba(45, 74, 34, 0.2);
        }
     </style>
</head>

<body class="bg-white min-h-screen relative">
    <!-- session success add new kelompok tani & sweet alert-->
     @if(session('sukses_tambah_kelompok'))
        <script>
            document.addEventListener('DOMContentLoaded',function(){
                Swal.fire({
                    icon:'info',
                    title: 'Pendaftaran Kelompok Tani Anda Diproses',
                    text: 'Kelompok tani adna dalam proses verifikasi oleh admin, silahkan tunggu maksimal 2 x 24 jam.',
                    confirmButtonColor:'#2d4a22'
                });
            });
        </script>
     @endif

    <div class="absolute top-6 left-6 z-20">
        <img src="{{ asset('assets/images/tanimerdeka-logo.png') }}" class="h-12 md:h-16 w-auto" alt="Logo">
    </div>

    <!-- id for step form daftar -->
    <div id="step-1" class="min-h-screen flex flex-col justify-center items-center px-4 transition-all duration-500">
 
        <div class="text-center">
            <h1 class="text-2xl md:text-4xl font-bold text-black mb-3 leading-tight px-2">
                Daftar menjadi anggota tani merdeka
            </h1>
            <p class="text-sm md:text-base text-gray-600 px-4">
                Silahkan pilih jalur pendaftaran
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-8 mb-8">

            <!-- button belum punya kelompok -->
            <div onclick="pilihJalur('belum')" id="card-belum" class="cursor-pointer flex flex-col items-center group">
                <div class="h-48 w-48 rounded-xl flex items-center justify-center mb-4 transition-all p-4">
                    <img src="{{ asset('assets/images/farmer.png') }}" alt="" class="max-h-full">
                </div>

                <div id="btn-belum" class="px-6 py-2 rounded-full border-2 border-gray-300 text-gray-500 font-semibold transition-all">
                    Belum memiliki kelompok tani
                </div>
            </div>

            <!-- button sudh punya kelompok -->
            <div onclick="pilihJalur('sudah')" id="card-sudah" class="cursor-pointer flex flex-col items-center group">
                <div class="h-48 w-48 rounded-xl flex items-center justify-center mb-4 transition-all p-4">
                    <img src="{{ asset('assets/images/farmer_group.png') }}" alt="" class="max-h-full">
                </div>

                <div id="btn-sudah" class="px-6 py-2 rounded-full border-2 border-gray-300 text-gray-500 font-semibold transition-all">
                    Sudah memiliki kelompok tani
                </div>
            </div>
        </div>

        <p id="teks-pilihan" class="h-6 text-gray-700 font-medium mb-6 opacity-0 transition-opacity">
            
        </p>

        <button onclick="lanjutKeStep2()" id="btn-lanjut-step1" class="bg-gray-300 text-gray-500 px-10 py-3 rounded-full font-bold cursor-not-allowed transition-all" disable>
            Lanjutkan pendaftaran
        </button>

        <p class="mt-6 text-sm text-gray-500">
            Apakah anda pengguna non-anggota Tani Merdeka? 
            <a href="/login" class="text-blue-500 hover:underline">Login pengguna</a> 
        </p>
    </div>



    <!-- step 2 -->
    <div id="step-2" class="min-h-screen flex flex-col items-center pt-28 pb-10 px-4 hidden transition-all duration-500">

        <div class="w-full max-w-4xl flex justify-start mb-4">
            <a class="flex items-center gap-2 text-gray-500 hover:text-gray-800 font-medium" href="{{route ('daftar.anggota.process')}}" role="button">← Kembali</a>
        </div>

        <div class="text-center max-w-2xl mb-8 md:mb-10">
            <h1 class="text-2xl md:text-4xl font-bold text-black mb-3 leading-tight px-2">
                Untuk mendaftar sebagai anggota tani merdeka
            </h1>

            <p class="text-sm md:text-base text-gray-600 px-4">
                silahkan isi data-data dibawah ini
            </p>
        </div>

        <form action="{{route ('daftar.anggota.process')}}" method="POST" class="w-full max-w-4xl bgt-white p-2">
            @csrf

            <input type="hidden" name="status_kelompok" id="input_status_kelompok" value="">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" placeholder="Masukkan nomor nama lengkap anda" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3" required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Nomor Induk Kependudukan</label>
                        <input type="number" name="nik" placeholder="Masukkan nomor induk kependudukan anda" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3" required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3 text-gray-500 bg-white" required>
                            <option value="">Masukkan jenis kelamin anda</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Email (Opsional)</label>
                        <input type="email" name="email" placeholder="Masukkan email anda" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3">
                    </div>
                </div>

                <!-- laravolt -->
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Nomor handphone</label>
                        <input type="number" name="no_hp" placeholder="Masukkan nomor handphone anda" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3" required>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Alamat Tinggal</label>
                        <div class="grid grid-cols-2 gap-2">
                            <select id="provinsi" name="provinsi_id" class="w-full form-input border border-gray-200 rounded-xl px-3 py-3 text-sm bg-white" required>
                                <option value="">Provinsi</option>
                                @foreach($provinsi as $prov)
                                    <option value="{{ $prov->code }}">{{ $prov->name }}</option>
                                @endforeach
                            </select>
                            
                            <select id="kota" name="kota_id" class="w-full form-input border border-gray-200 rounded-xl px-3 py-3 text-sm bg-gray-50 text-gray-400" disabled required>
                                <option value="">Kota / Kab</option>
                            </select>
                            
                            <select id="kecamatan" name="kecamatan_id" class="w-full form-input border border-gray-200 rounded-xl px-3 py-3 text-sm bg-gray-50 text-gray-400" disabled required>
                                <option value="">Kecamatan</option>
                            </select>
                            
                            <select id="desa" name="indonesia_village_id" class="w-full form-input border border-gray-200 rounded-xl px-3 py-3 text-sm bg-gray-50 text-gray-400" disabled required>
                                <option value="">Desa</option>
                            </select>
                        </div>
                    </div>

                    <div id="wrap-jabatan">
                        <label class="block text-sm text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" id="input-jabatan" placeholder="Masukkan jabatan anda dalam kelompok tani" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-700 mb-1">Kata sandi</label>
                        <input type="password" name="password" placeholder="Masukkan kata sandi anda" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3" required>
                    </div>
                </div>
            </div>

            <div id="wrap-kelompok-tani" class="mt-6 w-full hidden">
                <label class="block text-sm text-gray-700 mb-1">Kelompok Tani Merdeka</label>
                <div class="flex gap-2">
                    <input type="text" id="input-cari-kelompok" placeholder="Silahkan cari kelompok tani anda" class="w-full form-input border border-gray-200 rounded-xl px-5 py-3">
                    <button type="button" onclick="cariKelompok()" class="bg-tani text-white px-8 rounded-xl font-semibold hover:bg-green-800 transition-all">Cari</button>
                </div>
                
                <div id="hasil-kelompok" class="mt-3 p-4 bg-green-50 border border-green-200 rounded-xl hidden flex justify-between items-center">
                    <div>
                        <p class="font-bold text-tani" id="res-nama-kelompok"></p>
                        <p class="text-sm text-gray-600" id="res-alamat-kelompok"></p>
                    </div>
                    <input type="hidden" name="id_kelompok_tani" id="id_kelompok_terpilih" value="">
                    <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded">Terpilih</span>
                </div>
            </div>

            <div class="mt-12 flex flex-col items-center">
                <button type="submit" class="w-full md:w-1/3 bg-tani text-white font-bold py-3.5 rounded-xl shadow-lg hover:bg-green-800 transition-all">
                    Lanjutkan Pendaftaran
                </button>
                <p class="mt-4 text-sm text-gray-500">
                    Apakah Anda pengguna non-anggota Tani Merdeka? <a href="/login" class="text-blue-500 hover:underline">Login pengguna</a>
                </p>
            </div>

        </form>
    </div>

    <!-- sript js -->
    <script>
        // var untuk menyimpan pilihan jalur user
        let jalurDipilih = '';

        // pemilihan jalur
        function pilihJalur(jalur){
            jalurDipilih = jalur;
            document.getElementById('input_status_kelompok').value=jalur;

            // take button id frm above
            const btnBelum = document.getElementById('btn-belum');
            const btnSudah = document.getElementById('btn-sudah');
            const teksPilihan = document.getElementById('teks-pilihan');
            const btnLanjut = document.getElementById('btn-lanjut-step1');

            // reset styling
            btnBelum.className = btnSudah.className = "px-6 py-2 rounded-full border-2 border-gray-300 text-gray-500 font-semibold transition-all";

            //biar muncul di tampilan registernya.
            if (jalur === 'belum'){
                btnBelum.className = "px-6 py-2 rounded-full border-2 border-tani bg-tani text-white font-semibold transition-all";
                teksPilihan.innerHTML = 'Anda memilih jalur "Belum memiliki kelompok tani"';
            }else{
                btnSudah.className = "px-6 py-2 rounded-full border-2 border-tani bg-tani text-white font-semibold transition-all";
                teksPilihan.innerHTML = 'Anda memilih jalur "Sudah memiliki kelompok tani"';
            }

            teksPilihan.classList.remove('opacity-0');
            btnLanjut.disabled = false;
            btnLanjut.className = "bg-tani text-white px-10 py-3 rounded-2xl font-bold cursor-pointer transition-all hover:shadow-lg";
        }

        // form
        function lanjutKeStep2(){
            document.getElementById('step-1').classList.add('hidden');
            document.getElementById('step-2').classList.remove('hidden');

            //form yang di hidden kl pilih jalur "belum memiliki kelompok"
            const wrapJabatan = document.getElementById('wrap-jabatan');
            const wrapKelompok = document.getElementById('wrap-kelompok-tani');
            const inputJabatan = document.getElementById('input-jabatan');
        
            if(jalurDipilih == 'belum'){
                wrapJabatan.classList.add('hidden');
                wrapKelompok.classList.add('hidden');
                inputJabatan.removeAttribute('required');
            }else{
                wrapJabatan.classList.remove('hidden');
                wrapKelompok.classList.remove('hidden');
                inputJabatan.setAttribute('required','true');
            }
        }

        //laravolt - reset dropdown alamat
        function resetDropdown(element, defaultText){
            element.innerHTML = `<option value="">${defaultText}</option>`;
            element.disabled = true;
            element.classList.add('bg-gray-50', 'text-gray-400');
            element.classList.remove('bg-white','text-black');
        }

        //event kl provinsi dipilih sma user
        document.getElementById('provinsi').addEventListener('change', function(){
            let id = this.value; //id provinsi
            // menampilkan kota berdasarkan povinsi yang dipilih
            let kota = document.getElementById('kota');

            //reset dropdown kecamatan dst, biar disesuain sma provinsi yg dipilih
            resetDropdown(document.getElementById('kecamatan'),'Kecamatan');
            resetDropdown(document.getElementById('desa'),'Desa');

            if(id){
                kota.innerHTML = '<option value="">Memuat...</option>';
                //get kota berdasarkan provinsi
                fetch(`/api/wilayah/kota/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        kota.innerHTML = `<option value="">Kota/Kab </option>`;
                        // loop json buat optionnya
                        data.forEach(item => {
                            kota.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                        });

                        //enable dropdown kota
                        kota.disabled = false;
                        kota.classList.remove('bg-gray-50','text-gray-400');
                        kota.classList.add('bg-white','text-black');
                    });
            }else{
                resetDropdown(kota, 'Kota/Kab');
            }

        });

        //event kl kota dipilih user, jdi ini bertahap gitu. 
        // provinsi -> kota -> kecamatan -> desa
        document.getElementById('kota').addEventListener('change', function(){
            let id = this.value; //id kota
            // menampilkan kecamatan berdasarkan kota yg dipilih
            let kecamatan = document.getElementById('kecamatan');
            resetDropdown(document.getElementById('desa'),'Desa');

            if(id){
                kecamatan.innerHTML = '<option value="">Memuat...</option>';
                //get kecamatan berdasarkan kecamatan
                fetch(`/api/wilayah/kecamatan/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        kecamatan.innerHTML = `<option value="">Kecamatan</option>`;
                        // loop json buat optionnya
                        data.forEach(item => {
                            kecamatan.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                        });

                        //enable dropdown kota
                        kecamatan.disabled = false;
                        kecamatan.classList.remove('bg-gray-50','text-gray-400');
                        kecamatan.classList.add('bg-white','text-black');
                    });
            }else{
                resetDropdown(kecamatan, 'Kecamatan');
            }

        });

        // event saat kecamatan dipilih
        document.getElementById('kecamatan').addEventListener('change', function() {
            let id = this.value;
            let desa = document.getElementById('desa');

            if(id) {
                //menampilkan desa berdasarkan kecamatan yg dipilih
                desa.innerHTML = '<option value="">Memuat...</option>';
                fetch(`/api/wilayah/desa/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        desa.innerHTML = '<option value="">Desa</option>';
                        data.forEach(item => {
                            desa.innerHTML += `<option value="${item.code}">${item.name}</option>`;
                        });
                        desa.disabled = false;
                        desa.classList.remove('bg-gray-50', 'text-gray-400');
                        desa.classList.add('bg-white', 'text-black');
                    });
            } else {
                resetDropdown(desa, 'Desa');
            }
        });

        // function search kelompok tani
        function cariKelompok(){
            //keyword dari user
            const keyword = document.getElementById('input-cari-kelompok').value.trim();

            //alert untuk menampilkan hasil kelompok yang dicari
            const hasilBox = document.getElementById('hasil-kelompok');
            const idTerpilih = document.getElementById('id_kelompok_terpilih');

            if(keyword == ''){
                Swal.fire('Perhatian','Ketik nama kelompok tani terlebih dahulu!','warning');
                return;
            }

            //alert loading
            Swal.fire({
                title:'Mencari Kelompok...',
                allowOutsideClick: false,
                didOpen: () => {Swal.showLoading()}
            });

            fetch(`/api/cari-kelompok?q=${encodeURIComponent(keyword)}`)
                .then(response => response.json())
                .then(result => {

                    if(result.status === 'success'){
                        //kelompok terdaftar
                        document.getElementById('res-nama-kelompok').innerText = result.data.nama;
                        document.getElementById('res-alamat-kelompok').innerText = result.data.alamat;
                        idTerpilih.value = result.data.id; //save id kelompok tani

                        Swal.close();
                        hasilBox.classList.remove('hidden');

                        Swal.fire({
                            icon: 'success',
                            title:'Kelompok Tani Ditemukan!',
                            text:`Kelompok Tani "${result.data.nama}" sudah terdaftar.`,
                            confirmButtonColor:'#2d4a22'
                        });
                    }else{
                        //kelompok tani belum terdaftar
                        hasilBox.classList.add('hidden');
                        idTerpilih.value = '';

                        Swal.fire({
                            icon:'error',
                            title:'Kelompok Tidak Ditemukan, Silahkan Daftarkan Kelompok Tani Anda',
                            html:`Kelompok <b>"${keyword}"</b> tidak terdaftar di sistem.`,
                            showCancelButton: true,
                            confirmButtonText: 'Tambahkan Kelompok Baru',
                            cancelButtonText: 'Batal',
                            confirmButtonColor: '#2d4a22'
                        }).then((res) => {
                            if(res.isConfirmed){
                                //user menambahkan kelompok baru, redirect ke route tambah kelompok
                                window.location.href = "{{route('daftar.anggota.tambah-kelompok') }}";
                            }
                        });
                    }
                })
                .catch(error => {
                    //alert error server
                    Swal.fire('Error', 'Terjadi kesalahan sistem saat mencari data.','error');
                    console.error('API Error:',error);
                });
        }   
    </script>
</body>
</html>