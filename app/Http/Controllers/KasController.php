<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Bulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KasExport;

class KasController extends Controller
{
    public function index(Request $request)
    {
        $query = Kas::query();

        // Filter by year
        if ($request->has('tahun') && $request->tahun != '') {
            $query->where('tahun', $request->tahun);
        }

        // Filter by month
        if ($request->has('bulan_id') && $request->bulan_id != '') {
            $query->where('bulan_id', $request->bulan_id);
        }

        $kas = $query->get();
        $bulan = Bulan::all();  

        // Prepare the data for the chart
        $bulanNames = $bulan->pluck('nama_bulan')->toArray();
        $kasData = [];

        foreach ($bulan as $bulanItem) {
            $kasData[] = $kas->where('bulan_id', $bulanItem->id)->sum('jumlah');
        }

        if (Auth::user()->usertype_id == '2') {
            return view('anggotaa.view_kas', compact('kas', 'bulan', 'bulanNames', 'kasData'));
        }

        return view('admin.view_kas', compact('kas', 'bulan', 'bulanNames', 'kasData'));
    }

    public function create()
    {
        $bulan = Bulan::all();
        return view('admin.create_kas', compact('bulan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'bulan_id' => 'required|exists:bulan,id',
            'jumlah' => 'required|numeric',
        ]);

        Kas::create($request->all());

        return redirect()->route('kas.index')->with('success', 'Data Kas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kas = Kas::findOrFail($id);
        $bulan = Bulan::all();
        return view('admin.edit_kas', compact('kas', 'bulan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|digits:4',
            'bulan_id' => 'required|exists:bulan,id',
            'jumlah' => 'required|numeric',
        ]);

        $kas = Kas::findOrFail($id);
        $kas->update($request->all());

        return redirect()->route('kas.index')->with('success', 'Data Kas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kas = Kas::findOrFail($id);
        $kas->delete();

        return redirect()->route('kas.index')->with('success', 'Data Kas berhasil dihapus.');
    }

    public function download(Request $request)
    {
        $tahun = $request->input('tahun', date('Y')); // Default tahun sekarang jika tidak diisi
        return Excel::download(new KasExport($tahun), 'kas_bulanan_' . $tahun . '.xlsx');
    }
}

