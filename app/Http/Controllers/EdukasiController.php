<?php

namespace App\Http\Controllers;

use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    public function index()
    {
        $konten = Edukasi::latest()->get();
        return view('edukasi.index', compact('konten'));
    }

    public function create()
    {
        return view('edukasi.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'url_konten' => 'nullable|url',
            'gambar_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->has('is_featured') && $request->is_featured) {
            Edukasi::query()->update(['is_featured' => false]);
            $validated['is_featured'] = true;
        } else {
            $validated['is_featured'] = false;
        }

        if ($request->hasFile('gambar_thumbnail')) {
            $path = $request->file('gambar_thumbnail')->store('edukasi', 'public');
            $validated['gambar_thumbnail'] = $path;
        }

        Edukasi::create($validated);

        return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        return view('edukasi.form', compact('edukasi'));
    }

    public function update(Request $request, $id)
    {
        $edukasi = Edukasi::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'url_konten' => 'nullable|url',
            'gambar_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        if ($request->has('is_featured') && $request->is_featured) {
            Edukasi::where('id', '!=', $id)->update(['is_featured' => false]);
            $validated['is_featured'] = true;
        } else {
            $validated['is_featured'] = false;
        }

        if ($request->hasFile('gambar_thumbnail')) {
            if ($edukasi->gambar_thumbnail) {
                Storage::disk('public')->delete($edukasi->gambar_thumbnail);
            }
            $path = $request->file('gambar_thumbnail')->store('edukasi', 'public');
            $validated['gambar_thumbnail'] = $path;
        }

        $edukasi->update($validated);

        return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $edukasi = Edukasi::findOrFail($id);
        if ($edukasi->gambar_thumbnail) {
            Storage::disk('public')->delete($edukasi->gambar_thumbnail);
        }
        $edukasi->delete();

        return redirect()->route('edukasi.index')->with('success', 'Konten edukasi berhasil dihapus.');
    }
}
