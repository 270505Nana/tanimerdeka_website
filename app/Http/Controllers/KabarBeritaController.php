<?php

namespace App\Http\Controllers;

use App\Models\Kabar_berita;
use Illuminate\Http\Request;

class KabarBeritaController extends Controller
{

    public function index()
    {
        $posts = Kabar_berita::latest()->paginate(10);

        return view('admin.kabar-berita.index', compact('posts'));
    }


    public function create()
    {
        $latestPosts = Kabar_berita::latest()->take(5)->get();

        return view('admin.kabarberita.form_kabarberita', compact('latestPosts'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:255',
            'body_berita' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images/kabarberita'), $filename);
            $data['image'] = $filename;
        }

        Kabar_berita::create($data);
        return redirect()
            ->route('admin.kabar-berita.index')
            ->with('success', 'Berita berhasil ditambahkan');
    }


    public function show($id)
    {
        $berita = Kabar_berita::findOrFail($id);

        return view('admin.kabar-berita.show', compact('berita'));
    }


    public function edit($id)
    {
        $berita = Kabar_berita::findOrFail($id);

        return view('admin.kabar-berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Kabar_berita::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|max:255',
            'body_berita' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time() . '_' . $file->getClientOriginalName();

            $file->move(public_path('assets/images/kabarberita'), $filename);

            $data['image'] = $filename;
        }

        $berita->update($data);

        return redirect()
            ->route('admin.kabar-berita.index')
            ->with('success', 'Berita berhasil diupdate');
    }


    public function destroy($id)
    {
        $berita = Kabar_berita::findOrFail($id);

        $berita->delete();

        return redirect()
            ->route('admin.kabar-berita.index')
            ->with('success', 'Berita berhasil dihapus');
    }
}
