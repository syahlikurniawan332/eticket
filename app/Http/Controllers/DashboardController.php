<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\Ticket;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung total seminar
        $totalSeminars = Seminar::count();

        // Menghitung total penjualan tiket
        $totalTicketSales = Ticket::sum('quantity');

        // Menghitung total pendapatan
        $totalRevenue = Revenue::sum('amount');

        // Menghitung total pengguna
        $userCount = User::count();

        // Ambil data seminar
        $seminarData = Seminar::select('title', DB::raw('COUNT(*) as count'))
            ->groupBy('title')
            ->pluck('count', 'title')
            ->toArray();

        // Ambil data revenue bulanan
        $revenueData = Revenue::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(amount) as total_revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_revenue', 'month')
            ->toArray();

        // Hitung pendapatan kumulatif
        $cumulativeData = [];
        $total = 0;

        foreach ($revenueData as $month => $revenue) {
            $total += $revenue; // Tambahkan pendapatan bulan ini ke total kumulatif
            $cumulativeData[$month] = $total; // Simpan total kumulatif untuk bulan ini
        }

        // Ambil data kategori seminar
        $categoryData = Ticket::select('jenis_tiket as category', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('category')
            ->pluck('total_quantity', 'category')
            ->toArray();

        // Ambil data pendapatan seminar
        $seminarRevenueData = Revenue::select('seminar_id', DB::raw('SUM(amount) as total_revenue'))
            ->groupBy('seminar_id')
            ->pluck('total_revenue', 'seminar_id')
            ->toArray();

        // Format bulan untuk label
        $revenueLabels = array_map(function ($month) {
            return date('F', strtotime($month . '-01'));
        }, array_keys($revenueData));

        $cumulativeLabels = array_map(function ($month) {
            return date('F Y', strtotime($month . '-01'));
        }, array_keys($cumulativeData));

        return view('dashboard.home', compact(
            'totalSeminars',
            'totalTicketSales',
            'totalRevenue',
            'userCount',
            'seminarData',
            'revenueData',
            'revenueLabels',
            'categoryData',
            'cumulativeData',
            'cumulativeLabels',
            'seminarRevenueData'
        ));
    }
}
