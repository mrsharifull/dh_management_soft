<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Hosting;
use App\Models\Payment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $data['payments'] = Payment::with(['created_user','domainOrHosting'])->latest()->get();
        return view('admin.payment.index',$data);
    }
    // public function details($id): JsonResponse
    // {
    //     $data = User::findOrFail($id);
    //     $data->creating_time = $data->created_date();
    //     $data->updating_time = $data->updated_date();
    //     $data->created_by = $data->created_user_name();
    //     $data->updated_by = $data->updated_user_name();
    //     return response()->json($data);
    // }

    public function create(): View
    {
        return view('admin.payment.create');
    }
    public function get_hostings_or_domains($payment_for): JsonResponse
    {
        $data = [];
        if($payment_for == 'Domain'){
            $data['datas'] = Domain::activated()->latest()->get();
        }else if($payment_for == 'Hosting'){
            $data['datas'] = Hosting::activated()->latest()->get();
        }
        return response()->json($data);
    }
}
