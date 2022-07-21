<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CareerController extends Controller
{
    public function applicant_index()
    {
      return view('admin\career\applicant\index');
    }
    public function applicant_data()
    {
        try {
            $models = Applicant::orderBy('created_at', 'DESC');
            $datatable = Datatables::eloquent($models)
            ->editColumn('created_at',function($request){
                return $request->created_at->format('d-m-y');
            })
            
            ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
