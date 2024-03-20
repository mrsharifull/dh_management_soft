@extends('admin.layouts.app', ['pageSlug' => 'company_report'])

@section('title', 'Company Report')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ __('Company Report') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('company_report.company_report_search') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 mx-auto">
                                    <select name="company_id" id="company_id" class="form-control">
                                        <option selected hidden value="">{{__('Select Company')}}</option>
                                        @foreach ($companies as $company)
                                            <option value="{{$company->id}}" {{(old('company_id') == $company->id) ? 'selected' : ''}}>{{__($company->name)}}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'company_id'])
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Search') }}</button>
                                </div>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
