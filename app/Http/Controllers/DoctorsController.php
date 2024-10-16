<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Carbon;

class DoctorsController extends Controller
{
    public function list() {
        $dept = Department::all();
        $data = DB::table('doctors as d')
                    ->join('departments as dp', 'dp.department_id', '=', 'd.department_id')
                    ->get();

        if (request()->ajax()) {
            return DataTables::of($data)->editColumn('hire_date', function ($row) {
                return Carbon::parse($row->hire_date)->format('F j, Y'); // Format: Day-Month-Year
            })->make(true);
        }
        return view('doctors.list',['department' => $dept]);
    }
    public function store(Request $request){
        $request->validate([
             'fname' => ['required', 'string', 'max:255'],
             'lname' => ['required', 'string', 'max:255'],
             'mname' => ['required', 'string', 'max:1'],
             'dept' => ['required' ],
         ]);
         $insert = Doctor::create([
             'first_name' => $request->fname,
             'last_name' => $request->lname,
             'middle_initial' => $request->mname,
             'department_id' => $request->dept,
             'hire_date' => "2022-01-10"
         ]);

         if($insert) {
             return response()->json(['status'=> 'success', 'message' => 'Doctor Successfully Added'], 200);

         }
     }
}
