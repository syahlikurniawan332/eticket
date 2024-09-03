<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $pendingReports = Report::where('status', 'Belum Selesai')->get();
        $completedReports = Report::where('status', 'Selesai')->get();

        return view('dashboard.reports', compact('pendingReports', 'completedReports'));
    }

    public function show(Report $report)
    {
        return view('dashboard.reports.show', compact('report'));
    }

    public function edit(Report $report)
    {
        return view('dashboard.reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report)
    {
        $report->update($request->all());
        return redirect()->route('dashboard.reports');
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect()->route('dashboard.reports');
    }
}
