<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use Yajra\DataTables\Facades\DataTables;


class AdminContactController extends Controller
{
    public function index()
    {
        $details = ContactInquiry::all();
        return view('admin.contactus.index', compact('details'));
    }
    public function contact_list()
    {
        try {
            $models = ContactInquiry::orderBy('created_at', 'DESC');
            $datatable = Datatables::eloquent($models)
            ->addColumn('created_at',function($request){
                return $request->created_at->format('d-m-y');
            })
            ->rawColumns(['created_at'])
            ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
