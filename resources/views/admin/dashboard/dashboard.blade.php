@extends('admin.layouts.app',['pageSlug'=>'dashboard'])
@section('title', 'Admin Dashboard')
@push('css')
<style>
    .dashboard_wrap{
        height: 69vh;
    }
    .dashboard_wrap h2{
        margin: 40px auto;
        font-family: 'Ubuntu', sans-serif;
        font-size: 90px;
        color: #182456;
        text-align: center;
        letter-spacing: 5px;
        text-shadow: 0 2px 1px #747474,
            -1px 3px 1px #767676,
            -2px 5px 1px #787878,
            -3px 7px 1px #7a7a7a,
            -4px 9px 1px #7f7f7f,
            -5px 11px 1px #838383,
            -6px 13px 1px #878787,
            -7px 15px 1px #8a8a8a,
            -8px 17px 1px #8e8e8e,
            -9px 19px 1px #949494,
            -10px 21px 1px #989898,
            -11px 23px 1px #9f9f9f,
            -12px 25px 1px #a2a2a2,
            -13px 27px 1px #a7a7a7,
            -14px 29px 1px #adadad,
            -15px 31px 1px #b3b3b3,
            -16px 33px 1px #b6b6b6,
            -17px 35px 1px #bcbcbc,
            -18px 37px 1px #c2c2c2,
            -19px 39px 1px #c8c8c8,
            -20px 41px 1px #cbcbcb,
            -21px 43px 1px #d2d2d2,
            -22px 45px 1px #d5d5d5,
            -23px 47px 1px #e2e2e2,
            -24px 49px 1px #e6e6e6,
            -25px 51px 1px #eaeaea,
            -26px 53px 1px #efefef;
        }

</style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row row-cols-5">
            <div class="col">

                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{$companies->count()}}</h3>
                        <p>{{__('Total Companies')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('company.company_list')}}" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$hostings->count()}}</h3>
                        <p>{{__('Total Hostings')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('hosting.hosting_list')}}" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$domains->count()}}</h3>
                        <p>{{__('Total Domains')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('domain.domain_list')}}" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$domains->where('is_developed',1)->count()}}</h3>
                        <p>{{__('Total Website')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('domain.domain_list')}}" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$domains->where('is_developed',0)->count()}}</h3>
                        <p>{{__('Empty Domains')}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('domain.domain_list')}}" class="small-box-footer">{{__('More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-12">
                <div class="dashboard_wrap d-flex flex-column justify-content-center align-items-center">
                    <h2>{{__('DASHBOARD')}}</h2>
                </div>
            </div>
        </div>
 
            
    </div>
@endsection