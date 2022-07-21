<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quote;
use Yajra\DataTables\Facades\DataTables;

class QuoteController extends Controller
{
    public function index()
    {
        return view('admin.quotes.index');
    }
    public function getModels()
    {
        try {
            $quotes = Quote::orderBy('created_at', 'DESC');
            $datatable = Datatables::eloquent($quotes)


                ->addColumn("action", function ($row) {
                    return view('admin.quotes._partials.action', compact('row'));
                })


                ->rawColumns(['action'])
                ->make(true);
            return $datatable;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function destroy(Request $request)
    {
        Quote::where('id', $request->id)->delete();
    }
}
