<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('branch')->orderBy('id_cabang', 'asc')->get();
        return view('products.index', $data);
    }
}
