<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Struktur_organisasi;

class StrukturOrganisasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:50',
            'jabatan' => 'required|string|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        try {
            $data = new Struktur_organisasi();
            $data->nama_lengkap = $request->nama_lengkap;
            $data->jabatan = $request->jabatan;

            if ($request->hasFile('image')) {
                $destinationPath = public_path('images/struktur-organisasi');

                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0777, true);
                }

                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $filename);

                $data->image = $filename;
            }

            $data->save();

            return redirect()->back()->with('success', 'Struktur Organisasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan Struktur Organisasi!');
        }
    }
}
