<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HostingRequest;
use App\Models\Company;
use App\Models\Hosting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HostingController extends Controller
{
    public function __construct() {
        return $this->middleware('auth');
    }

    public function index(): View
    {
        $data['hostings'] = Hosting::with(['created_user','company'])->latest()->get();
        return view('admin.hosting.index',$data);
    }
    public function details($id): JsonResponse
    {
        $data = Hosting::with('company')->findOrFail($id);
        $data->admin_url = removeHttpProtocol($data->admin_url);
        $data->username = $data->username ? $data->username : '--' ;
        $data->purchase_date = timeFormate($data->purchase_date);
        $data->expire_date = $data->expire_date ? timeFormate($data->expire_date) : '--';
        $data->creating_time = $data->created_date();
        $data->updating_time = $data->updated_date();
        $data->created_by = $data->created_user_name();
        $data->updated_by = $data->updated_user_name();
        return response()->json($data);
    }
    public function create(): View
    {
        $data['companies'] = Company::activated()->latest()->get();
        return view('admin.hosting.create',$data);
    }
    public function store(HostingRequest $req): RedirectResponse
    {
        $hosting = new Hosting();
        $hosting->company_id = $req->company_id;
        $hosting->name = $req->name;
        $hosting->admin_url = $req->admin_url;
        $hosting->username = $req->username;
        $hosting->email = $req->email;
        $hosting->password = $req->password;
        $hosting->purchase_date = $req->purchase_date;
        $hosting->expire_date = $req->expire_date;
        $hosting->note = $req->note;
        $hosting->created_by = admin()->id;
        $hosting->save();
        flash()->addSuccess('Hosting '.$hosting->name.' created successfully.');
        return redirect()->route('hosting.hosting_list');
    }
    public function edit($id): View
    {
        $data['hosting'] = Hosting::findOrFail($id);
        $data['companies'] = Company::activated()->latest()->get();
        return view('admin.hosting.edit',$data);
    }
    public function update(HostingRequest $req, $id): RedirectResponse
    {
        $hosting = Hosting::findOrFail($id);
        $hosting->company_id = $req->company_id;
        $hosting->name = $req->name;
        $hosting->admin_url = $req->admin_url;
        $hosting->username = $req->username;
        $hosting->email = $req->email;
        $hosting->password = $req->password;
        $hosting->purchase_date = $req->purchase_date;
        $hosting->expire_date = $req->expire_date;
        $hosting->note = $req->note;
        $hosting->updated_by = admin()->id;
        $hosting->update();
        flash()->addSuccess('Hosting '.$hosting->name.' updated successfully.');
        return redirect()->route('hosting.hosting_list');
    }
    public function status($id): RedirectResponse
    {
        $hosting = Hosting::findOrFail($id);
        $this->statusChange($hosting);
        flash()->addSuccess('Hosting '.$hosting->name.' status updated successfully.');
        return redirect()->route('hosting.hosting_list');
    }
    public function delete($id): RedirectResponse
    {
        $hosting = Hosting::findOrFail($id);
        $hosting->delete();
        flash()->addSuccess('Hosting '.$hosting->name.' deleted successfully.');
        return redirect()->route('hosting.hosting_list');

    }
}
