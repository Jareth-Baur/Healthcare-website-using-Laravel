<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Support\Carbon;

class PatientsController extends Controller
{
    public function list(){
        $data = Patient::all();
        if (request()->ajax()) {
            return DataTables::of($data)->editColumn('date_of_birth', function ($row) {
                return Carbon::parse($row->date_of_birth)->format('F j, Y');
            })->make(true);
        }
        return view('patients.list');
    }


    public function add_patient(){
        return view('patients.add');
    }
    public function store(Request $request){
       $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'mname' => ['required', 'string', 'max:1'],
            'dob' => ['required', 'date', ],
            'gender' => ['required', 'string', 'max:255'],
        ]);
        $insert = Patient::create([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'middle_initial' => $request->mname,
            'date_of_birth' => $request->dob,
            'gender' => $request->gender
        ]);

        if($insert) {
           // return response()->json(['status'=> 'success', 'message' => 'Patient Successfully Added'], 200);
            return redirect()->route('patients.list');
        }
    }
}
