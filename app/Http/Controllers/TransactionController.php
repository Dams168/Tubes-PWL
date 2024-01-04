<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['transactions'] = Transaction::with('branch')->orderBy('id_cabang', 'asc')->orderBy('tanggal_transaksi', 'asc')->get();
        $data['branches'] = Branch::all();
        return view('transactions.index', $data);
    }

    public function print(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $cabangId = $request->input('cabang_id');

        $transactions = Transaction::with(['product', 'branch'])
            ->when($startDate, function ($query) use ($startDate) {
                return $query->where('tanggal_transaksi', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->where('tanggal_transaksi', '<=', $endDate);
            })
            ->when($cabangId, function ($query) use ($cabangId) {
                return $query->whereHas('branch', function ($query) use ($cabangId) {
                    $query->where('id', $cabangId);
                });
            })
            ->orderBy('id_cabang', 'asc')->orderBy('tanggal_transaksi', 'asc')
            ->get();

        $data = [
            'transactions' => $transactions,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'selectedBranchName' => Branch::find($cabangId)->nama_cabang ?? 'Semua Cabang',
        ];

        $pdf = Pdf::loadView('transactions.print', $data);
        return $pdf->stream('transactions.pdf');
    }
}
