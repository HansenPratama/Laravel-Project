<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\KategoriSurat; // Make sure the KategoriSurat model is included
use App\Models\JenisSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    // Tampilkan daftar surat
    public function index(Request $request)
    {
        // Ambil parameter filter kategori dan jenis dari request
        $kategori = $request->input('kategori');
        $jenis = $request->input('jenis');

        // Query surat berdasarkan kategori dan jenis jika ada
        $surats = Surat::when($kategori, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('nama', $kategori);
            });
        })->when($jenis, function ($query, $jenis) {
            return $query->whereHas('jenis', function ($query) use ($jenis) {
                $query->where('nama', $jenis);
            });
        })->with(['kategori', 'jenis'])->get();

        // Ambil semua kategori dan jenis untuk dropdown
        $kategoriSurats = KategoriSurat::all();
        $jenisSurats = JenisSurat::all();

        // Jika user adalah anggota, tampilkan view anggota
        if (Auth::user()->usertype_id == '2') {
            return view('anggotaa.view_surat', compact('surats', 'kategoriSurats', 'jenisSurats', 'kategori', 'jenis'));
        }

        // Untuk admin, tampilkan view admin (seperti sebelumnya)
        return view('admin.view_surat', compact('surats', 'kategoriSurats', 'jenisSurats', 'kategori', 'jenis'));
    }


    // Tampilkan form upload surat
    public function create()
    {
        $kategoriSurats = KategoriSurat::all(); // Ambil semua kategori dari database
        $jenisSurats = JenisSurat::all(); // Ambil semua jenis surat
        return view('admin.create_surat', compact('kategoriSurats', 'jenisSurats')); // Kirim data kategori ke view
    }

    // Proses penyimpanan surat
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'required|mimes:pdf,doc,docx|max:20480', // Validasi file surat
            'kategori_id' => 'required|exists:kategori_surats,id', // Pastikan kategori ada di tabel kategori_surats
            'jenis_id' => 'required|exists:jenis_surats,id',
            'deskripsi' => 'nullable|string', // Deskripsi opsional
        ]);

        // Proses upload file
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/surat', $fileName, 'public');

            // Simpan data surat ke database
            Surat::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'file_path' => '/storage/' . $filePath,
                'kategori_id' => $request->kategori_id,
                'jenis_id' => $request->jenis_id,
            ]);
        }

        // Redirect kembali ke halaman daftar surat dengan pesan sukses
        return redirect()->route('surats.index')->with('success', 'Surat berhasil diunggah');
    }

    // Tampilkan form untuk edit surat
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $kategoriSurats = KategoriSurat::all(); // Ambil semua kategori untuk dropdown
        $jenisSurats = JenisSurat::all(); // Ambil semua jenis surat
        return view('admin.edit_surat', compact('surat', 'kategoriSurats', 'jenisSurats')); // Kirim data surat dan kategori ke view
    }

    // Update surat dalam penyimpanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori_id' => 'required|exists:kategori_surats,id', // Validasi kategori_id
            'jenis_id' => 'required|exists:jenis_surats,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:20480', // Validasi file jika ada
        ]);

        // Temukan surat yang akan diupdate
        $surat = Surat::findOrFail($id);
        $surat->judul = $request->judul;
        $surat->deskripsi = $request->deskripsi;
        $surat->kategori_id = $request->kategori_id; // Gunakan kategori_id
        $surat->jenis_id = $request->jenis_id;

        // Jika ada file yang diupload, proses file baru
        if ($request->hasFile('file')) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads/surat', $fileName, 'public');
            $surat->file_path = '/storage/' . $filePath; // Update file_path
        }

        $surat->save(); // Simpan perubahan ke database

        return redirect()->route('surats.index')->with('success', 'Surat berhasil diperbarui');
    }

    // Hapus surat dari penyimpanan
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete(); // Hapus surat

        return redirect()->route('surats.index')->with('success', 'Surat berhasil dihapus');
    }
}
