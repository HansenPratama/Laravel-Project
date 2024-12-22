<?php

namespace App\Exports;

use App\Models\Kas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KasExport implements FromCollection, WithHeadings
{
    protected $tahun;

    public function __construct($tahun)
    {
        $this->tahun = $tahun;
    }

    public function collection()
    {
        // Array urutan bulan yang benar
        $bulanOrder = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return Kas::with('bulan') // Ambil relasi bulan
            ->where('tahun', $this->tahun)
            ->get(['id', 'tahun', 'jumlah', 'bulan_id']) // Pastikan bulan_id juga diambil
            ->sortBy(function ($item) use ($bulanOrder) {
                // Cari posisi bulan di array urutan bulan
                return array_search($item->bulan->nama_bulan, $bulanOrder);
            })
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'tahun' => $item->tahun,
                    'nama_bulan' => $item->bulan->nama_bulan ?? 'Tidak Diketahui',
                    'jumlah' => $item->jumlah,
                ];
            });
    }

    public function headings(): array
    {
        return ['ID', 'Tahun', 'Nama Bulan', 'Jumlah'];
    }
}
