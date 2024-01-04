<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('branch')->orderBy('id_cabang', 'asc')->get();
        $data['branches'] = Branch::all();
        return view('products.index', $data);
    }

    public function print(Request $request)
    {
        $cabangId = $request->input('cabang_id');

        $products = Product::with('branch')
            ->when($cabangId, function ($query) use ($cabangId) {
                return $query->where('id_cabang', $cabangId);
            })
            ->orderBy('id_cabang', 'asc')
            ->get();

        $selectedBranchName = Branch::find($cabangId)->nama_cabang ?? 'Semua Cabang';

        $data = [
            'products' => $products,
            'selectedBranchName' => $selectedBranchName,
        ];

        $pdf = Pdf::loadView('products.print', $data);
        return $pdf->stream('products.pdf');
    }
}
