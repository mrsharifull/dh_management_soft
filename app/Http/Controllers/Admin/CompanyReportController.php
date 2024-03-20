<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyReportController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function search(){
        $data['companies'] = Company::activated()->latest()->get();
        return view('admin.company_report.index',$data);
    }
    public function searchResult(Request $req){
        $validator = Validator::make($req->all(), [
            'company_id' => 'required|exists:companies,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        return redirect()->route('company_report.company_report',['company_id'=>$req->company_id]);
    }
    public function report($id){
        $data['company'] = Company::findOrFail($id);
        return view('admin.company_report.report',$data);
    }
}
