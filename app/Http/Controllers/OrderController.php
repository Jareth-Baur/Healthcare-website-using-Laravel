<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;
//composer require yajra/laravel-datatables-oracle
//php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider"

class OrderController extends Controller
{
    public function normalList(){
        $data = DB::table('orderdetails as od')
                    ->join('orders as o', 'o.orderNumber', '=', 'od.orderNumber')
                    ->join('products as p', 'od.productCode', '=', 'p.productCode')
                    ->join('customers as c', 'c.customerNumber', '=', 'o.customerNumber')
                    ->select(
                        'od.orderNumber',      
                        'od.quantityOrdered',
                        'o.orderDate',  
                        'p.productName',  
                        'od.priceEach',  
                        'c.customerName',  
                        'c.contactLastName',
                        'c.contactFirstName' 
                    )
                    ->get();
                
        return view('orders.list',['orders' => $data]);
    }
    public function serverList () {
        $data = DB::table('orderdetails as od')
                    ->join('orders as o', 'o.orderNumber', '=', 'od.orderNumber')
                    ->join('products as p', 'od.productCode', '=', 'p.productCode')
                    ->join('customers as c', 'c.customerNumber', '=', 'o.customerNumber')
                    ->select(
                        'od.orderNumber',      
                        'od.quantityOrdered',
                        'o.orderDate',  
                        'p.productName',  
                        'od.priceEach',  
                        'c.customerName',  
                        'c.contactLastName',
                        'c.contactFirstName' 
                    )
                    ->get();
                
                if (request()->ajax()) {
                    return DataTables::of($data)
                    ->editColumn('orderDate', function ($row) {
                            return Carbon::parse($row->orderDate)->format('M j, Y'); // Format date
                        })
                    ->make(true);
                } 
               
        return view('orders.server');
    }
    
        
}
