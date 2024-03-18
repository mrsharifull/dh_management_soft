@extends('admin.layouts.app', ['pageSlug' => 'payment'])

@section('title', 'Create Payment')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">{{ __('Create Payment') }}</h3>
                    <div class="button_">
                        @include('admin.partials.button', [
                            'routeName' => 'payment.payment_list',
                            'className' => 'btn-outline-info',
                            'label' => 'Back',
                        ])
                    </div>

                </div>
                <div class="card-body">
                    <form action="{{ route('payment.payment_create') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="payment_for">{{ __('Payment For') }}</label>
                                <select name="payment_for" id="payment_for" class="form-control">
                                    <option selected hidden value="">{{__('Select Payment For')}}</option>
                                    <option value="Hosting" {{(old('payment_for') =='Hosting') ? 'selected' : ''}}>{{__('Hosting')}}</option>
                                    <option value="Domain" {{(old('payment_for') =='Domain') ? 'selected' : ''}}>{{__('Domain')}}</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'payment_for'])
                            </div>


                            <div class="form-group">
                                <label for="dh_id" id="dh_label">{{ __('Hosting/Domain') }}</label>
                                <select name="dh_id" id="dh_id" class="form-control" disabled>
                                    <option selected hidden value="">{{__('Select Hosting/Domain')}}</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'dh_id'])
                            </div> 
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
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
                    $('#dh_id').html(result); 
                    $('#dh_id').prop('disabled',false); 
                     
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    });
</script>
@endpush
