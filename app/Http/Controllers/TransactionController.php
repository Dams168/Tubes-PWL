<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['transactions'] = Transaction::with('branch')->orderBy('id_cabang', 'asc')->orderBy('tanggal_transaksi', 'asc')->get();
        return view('transactions.index', $data);
    }
}
