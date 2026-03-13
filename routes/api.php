<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Models\KelompokTani;
use App\Models\Kelompok_tani;
// Import model bawaan Laravolt
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\Cache;
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// (case punya kelompok & cari kelompok) API pencarian kelompok tani
Route::get('/cari-kelompok', function (Request $request){
    // query sorting yg ada di url user
    $keyword = $request -> query('q');

    // mencari nama kelompok sesuai dengan huruf pertama dari var keyword. ILIKE ngga liat capitalnya
    $kelompok = Kelompok_tani::where('nama_kelompok','ILIKE',"%{$keyword}%") -> first();

    if($kelompok){
        return response() -> json([
            'status' => 'success',
            'data' => [
                'id' => $kelompok -> id_kelompok_tani,
                'nama' => $kelompok -> nama_kelompok,
                'alamat' => $kelompok->alamat_detail ?? 'Alamat tersedia'
            ]
        ]);
    }

    return response()->json(['status' => 'not_found'], 404);
});

// API LARAVOLTNYA
Route::get('/wilayah/kota/{provinsi_id}', function ($provinsi_id) {
    // Simpan di Cache selama 30 hari (ingatan sementara)
    $kota = Cache::remember('kota_dari_prov_' . $provinsi_id, now()->addDays(30), function () use ($provinsi_id) {
        return City::where('province_code', $provinsi_id)->get();
    });
    return response()->json($kota);
});

Route::get('/wilayah/kecamatan/{kota_id}', function ($kota_id) {
    $kecamatan = Cache::remember('kec_dari_kota_' . $kota_id, now()->addDays(30), function () use ($kota_id) {
        return District::where('city_code', $kota_id)->get();
    });
    return response()->json($kecamatan);
});

Route::get('/wilayah/desa/{kecamatan_id}', function ($kecamatan_id) {
    $desa = Cache::remember('desa_dari_kec_' . $kecamatan_id, now()->addDays(30), function () use ($kecamatan_id) {
        return Village::where('district_code', $kecamatan_id)->get();
    });
    return response()->json($desa);
});

