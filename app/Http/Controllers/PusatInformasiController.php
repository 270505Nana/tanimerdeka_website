<?php

namespace App\Http\Controllers;

use App\Models\Kategori_informasi;
use App\Models\Pusat_informasi;
use Illuminate\Http\Request;

class PusatInformasiController extends Controller
{
    // menampilkan semua data
    public function index()
    {
        $data = Pusat_informasi::with('kategori_informasi')->latest()->get();

        return view('admin.pusatinformasi.index', compact('data'));
    }

    // form tambah data
    public function create()
    {
        $kategori = Kategori_informasi::all();

        return view('admin.pusat_informasi.form_pusatinformasi', compact('kategori'));
    }

    // simpan data
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:10240'
        ]);

        $data = new Pusat_informasi();

        $data->id_kategori = $request->id_kategori;
        $data->body = $request->body;

        if ($request->hasFile('image')) {
            $destination = public_path('images/pusat-informasi');

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destination, $filename);

            $data->image = $filename;
        }

        $data->save();

        return redirect()
            ->route('admin.pusat-informasi.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // detail
    public function show($id)
    {
        $data = Pusat_informasi::with('kategori_informasi')->findOrFail($id);

        return view('admin.pusat_informasi.show', compact('data'));
    }

    // edit
    public function edit($id)
    {
        $data = Pusat_informasi::findOrFail($id);
        $kategori = Kategori_informasi::all();

        return view('admin.pusat_informasi.form_pusatinformasi', compact('data', 'kategori'));
    }

    // update
    public function update(Request $request, $id)
    {
        $data = Pusat_informasi::findOrFail($id);

        $data->id_kategori = $request->id_kategori;
        $data->body = $request->body;

        if ($request->hasFile('image')) {
            $destination = public_path('images/pusat-informasi');

            if ($data->image && file_exists($destination . '/' . $data->image)) {
                unlink($destination . '/' . $data->image);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destination, $filename);

            $data->image = $filename;
        }

        $data->save();

        return redirect()
            ->route('admin.pusat-informasi.index')
            ->with('success', 'Data berhasil diupdate');
    }

    // delete
    public function destroy($id)
    {
        $data = Pusat_informasi::findOrFail($id);

        if ($data->image) {
            $path = public_path('images/pusat-informasi/' . $data->image);

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $data->delete();

        return redirect()
            ->route('admin.pusat-informasi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
