<?php

namespace App\Http\Controllers;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PharmaciesController extends Controller
{
    public function list (){
        $data = Pharmacy::all(); /* DB::table('pharmacies')->get() */
        if (request()->ajax()) {
            return DataTables::of($data)->make(true);
        }
        return view('pharmacy.list');
    }

    public function store(Request $request){
        $request->validate([
            'pname' => ['required', 'string', 'max:255','regex:/^[A-Za-z0-9\s]+$/','unique:pharmacies,pharmacy_name'],
            'address' => ['required', 'string', 'max:255'],
            'cnumber' => ['required', 'string', 'max:255','unique:pharmacies,contact_number'],
            'email' => ['required', 'email','unique:pharmacies,email'],
        ] );

         $insert = Pharmacy::create([
             'pharmacy_name' => $request->pname,
             'address' => $request->address,
             'contact_number' => $request->cnumber,
             'email' => $request->email
         ]);

         if($insert) {
             return response()->json(['status'=> 'success', 'message' => 'Pharmacy Successfully Added'], 200);
         }else {
            return response()->json(['status'=> 'error', 'message' => 'Error when adding data'], 500);

         }
     }

}
