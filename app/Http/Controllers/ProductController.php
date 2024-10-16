<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $data = Product::get();
        if (request()->ajax()) {
            return DataTables::of($data)
               
                ->make(true);
        }

        return view('products.list');
       
    }
}
