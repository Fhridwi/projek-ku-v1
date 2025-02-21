<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
{

    $totalSantri = Pendaftaran::count();
    $santriPutra = Pendaftaran::where('jenis_kelamin', 'L')->count();
    $santriPutri = Pendaftaran::where('jenis_kelamin', 'P')->count();
    $kouta = TahunAjaran::latest()->first();
    $santriTerbaru = Pendaftaran::latest()->take(3)->get();


   $tahunAjaran = $request->input('tahun_ajaran', date('Y'));

   $pendaftaranPerBulan = Pendaftaran::selectRaw('MONTH(created_at) as bulan, COUNT(*) as total')
   ->whereYear('created_at', $tahunAjaran)
   ->groupBy('bulan')
   ->orderBy('bulan')
   ->pluck('total', 'bulan')
   ->toArray();



   $bulanLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

   $dataChart = [];
   for ($i = 1; $i <= 12; $i++) {
       $dataChart[] = $pendaftaranPerBulan[$i] ?? 0;
   }
    return view('admin.dashboard', compact('totalSantri', 'santriPutra', 'santriPutri', 'kouta', 'dataChart', 'bulanLabels', 'tahunAjaran', 'santriTerbaru'));
}
}
