<?php

namespace App\Http\Controllers;

use App\Models\Tentang_kami;
use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    public function index()
    {
        $data = Tentang_kami::find(1);
        $view = auth()->check() && auth()->user()->role === 'admin'
        ? 'admin.tentangkami.form_tentangkami'
        : 'pages.tentang_kami';

        return view($view, compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi_program' => 'required|string',
            'visi' => 'required|string',
            'misi' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        $data = Tentang_kami::find(1);

        // update data
        $data->deskripsi_program = $request->deskripsi_program;
        $data->visi = $request->visi;
        $data->misi = $request->misi;

        if ($request->hasFile('image')) {
            $destinationPath = public_path('images/tentang-kami');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // hapus gambar lama
            if ($data->image && file_exists($destinationPath . '/' . $data->image)) {
                unlink($destinationPath . '/' . $data->image);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);

            $data->image = $filename;
        }

        $data->save();

        return redirect()
            ->route('admin.tentang-kami.index')
            ->with('success', 'Data berhasil diperbarui!');
    }
}
