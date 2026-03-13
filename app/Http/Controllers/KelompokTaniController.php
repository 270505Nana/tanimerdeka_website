<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;
use App\Models\Kelompok_tani;

class KelompokTaniController extends Controller
{
    public function AddKelompok(){

        // data provinsi diambil namanya trus ascending. bawaan dri laravoltna lngsung
        $provinsi = Province::orderBy('name','asc') -> get();
        return view ('anggota.pages.add_kelompok',compact ('provinsi'));
    }

    public function AddKelompokProcess(Request $request){

        // validasi input user
        $request -> validate([
            'nama_kelompok' => 'required|string|max:50',
            'nomor_sk' => 'required|numeric',
            'indonesia_village_id' => 'required',
            'alamat_detail' => 'nullable|string|max:250',
            'sk' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5000'
        ]);

        //processing upload dokumen sk. file path : storage/app/public/sk
        $pathFileSK = $request->file('sk')->store('sk','public');
        $desa = Village::where('code', $request->indonesia_village_id)->first();

        // send to db
        Kelompok_tani::create([
            'nama_kelompok' => $request->nama_kelompok,
            'nomor_sk' => $request->nomor_sk,
            'indonesia_village_id' => $request->indonesia_village_id,
            'alamat_detail' => $request->alamat_detail,
            'sk' => $pathFileSK,
        ]);

        //return URL
        return redirect('/')->with('status_menunggu','Anda sedang menunggu konfirmasi oleh admin, silahkan tunggu 2x24 jam kemudian daftar kembali dengan kelompok tani anda');
    }
}
