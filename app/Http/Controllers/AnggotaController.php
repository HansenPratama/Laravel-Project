<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Anggota::with('jabatan', 'departemen'); // Ambil anggota beserta jabatan dan departemen
        
        // Filter berdasarkan angkatan
        if ($request->has('angkatan') && $request->angkatan != '') {
            $query->where('angkatan', $request->angkatan);
        }

        // Filter berdasarkan jabatan
        if ($request->has('jabatan_id') && $request->jabatan_id != '') {
            $query->where('jabatan_id', $request->jabatan_id);
        }

        // Filter berdasarkan departemen
        if ($request->has('departemen_id') && $request->departemen_id != '') {
            $query->where('departemen_id', $request->departemen_id);
        }

        $anggota = $query->get(); // Ambil data anggota sesuai filter

        // Ambil data jabatan dan departemen untuk dropdown
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();

        if (Auth::user()->usertype_id == '2') {
            return view('anggotaa.view_anggota', compact('anggota', 'jabatan', 'departemen'));
        }

        return view('admin.view_anggota', compact('anggota', 'jabatan', 'departemen'));
    }


    public function create()
    {
        $departemen = Departemen::all(); // Mendapatkan semua departemen
        $jabatan = Jabatan::all(); // Mendapatkan semua jabatan
        return view('admin.create_anggota', compact('departemen', 'jabatan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'angkatan' => 'required|integer',
            'jabatan_id' => 'required|exists:jabatan,id', // Validasi untuk jabatan_id
            'departemen_id' => 'nullable|exists:departemen,id', // Validasi untuk departemen_id
        ]);

        // Menyimpan anggota baru
        Anggota::create([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'jabatan_id' => $request->jabatan_id, // Simpan jabatan_id
            'departemen_id' => $request->departemen_id, // Simpan departemen_id
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $departemen = Departemen::all(); // Mendapatkan semua departemen
        $jabatan = Jabatan::all(); // Mendapatkan semua jabatan
        return view('admin.edit_anggota', compact('anggota', 'departemen', 'jabatan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'angkatan' => 'required|integer',
            'jabatan_id' => 'required|exists:jabatan,id', // Validasi untuk jabatan_id
            'departemen_id' => 'nullable|exists:departemen,id', // Validasi untuk departemen_id
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update([
            'nama' => $request->nama,
            'angkatan' => $request->angkatan,
            'jabatan_id' => $request->jabatan_id, // Update jabatan_id
            'departemen_id' => $request->departemen_id, // Update departemen_id
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
