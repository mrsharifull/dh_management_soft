@extends('admin.layouts.app', ['pageSlug' => 'payment'])

@section('title', 'Edit Payment')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ __('Edit Payment') }}</h3>
                    <div class="button_">
                        @include('admin.partials.button', [
                            'routeName' => 'payment.payment_list',
                            'className' => 'btn-outline-info',
                            'label' => 'Back',
                        ])
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('payment.payment_edit',$payment->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="payment_for">{{ __('Payment For') }}</label>
                                    <select name="payment_for" id="payment_for" class="form-control">
                                        <option selected hidden value="">{{__('Select Payment For')}}</option>
                                        <option value="Hosting" {{($payment->payment_for =='Hosting') ? 'selected' : ''}}>{{__('Hosting')}}</option>
                                        <option value="Domain" {{($payment->payment_for =='Domain') ? 'selected' : ''}}>{{__('Domain')}}</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'payment_for'])
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="hd_id" id="dh_label">{{ __($payment->payment_for) }}</label>
                                    <select name="hd_id" id="hd_id" class="form-control">
                                        <option selected hidden value="">{{__('Select '.$payment->payment_for)}}</option>
                                        @foreach ($hds as $hd)
                                        <option value="{{$hd->id}}" {{($payment->hd_id == $hd->id) ? 'selected' : ''}}>{{__($hd->name)}}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'hd_id'])
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="payment_type">{{ __('Payment Type') }}</label>
                                    <select name="payment_type" id="payment_type" class="form-control">
                                        <option selected hidden value="">{{__('Select Payment For')}}</option>
                                        <option value="First-payment" {{($payment->payment_type =='First-payment') ? 'selected' : ''}}>{{__('First-payment')}}</option>
                                        <option value="Renew" {{($payment->payment_type =='Renew') ? 'selected' : ''}}>{{__('Renew')}}</option>
                                    </select>
                                    @include('alerts.feedback', ['field' => 'payment_type'])
                                </div>
    
                                <div class="form-group col-md-6">
                                    <label for="payment_date">{{ __('Payment Date') }}</label>
                                    <input type="date" name="payment_date" id="payment_date" class="form-control" value="{{$payment->payment_date}}">
                                    @include('alerts.feedback', ['field' => 'payment_date'])
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">{{ __('Price') }}</label>
                                    <div class="input-group" role="group">
                                        <input type="text" name="price" placeholder="Enter price" id="price" class="form-control" value="{{$payment->price}}">
                                        <span class="btn btn-sm btn-secondary disabled" style="line-height: 2">{{__('BDT')}}</span>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'price'])
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="duration">{{ __('Duration') }}</label>
                                    <div class="input-group" role="group">
                                        <input type="text" name="duration" placeholder="Enter duration" id="duration" class="form-control" value="{{$payment->duration}}">
                                        <select name="duration_type" class="form-control">
                                            <option selected hidden value="">{{__('Select type')}}</option>
                                            <option value="Year" {{($payment->duration_type =='Year') ? 'selected' : ''}}>{{__('Year')}}</option>
                                            <option value="Month" {{($payment->duration_type =='Month') ? 'selected' : ''}}>{{__('Month')}}</option>
                                        </select>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'price'])
                                </div>
                                <div class="form-group">
                                    <label for="file">{{ __('Upload') }}</label>
                                    <input type="file" name="file" id="file" class="form-control">
                                    @include('alerts.feedback', ['field' => 'file'])
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        $('#payment_for').on('change', function() {
            let payment_for = $(this).val();
            let url = ("{{ route('payment.get_hostings_or_domains.payment_list', ['payment_for']) }}");
            let _url = url.replace('payment_for', payment_for);
            $.ajax({
                url: _url,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                   let result = '';
                   $('#dh_label').html(payment_for);
                   result += `<option selected hidden value=''>Select ${payment_for}</option>`;
                   response.datas.forEach(function(data) {
                        result += `<option value='${data.id}'>${data.name}</option>`;
                    });
                    $('#hd_id').html(result); 
                    $('#hd_id').prop('disabled',false); 
                     
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    });
</script>
@endpush
