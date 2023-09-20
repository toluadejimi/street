@extends($activeTemplate . 'layouts.app')
@section('panel')



<style>

    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:50px;
        right:40px;
        background-color:#25d366;
        color:#FFF;
        border-radius:50px;
        text-align:center;
      font-size:40px;
        box-shadow: 2px 2px 3px #999;
      z-index:100;
    }

</style>






    <div class="row gy-4">
        <div class="col-xxl-4 col-sm-6">
            <div class="card bg--primary has-link box--shadow2 overflow-hidden">
                <a class="item-link" href="{{ route('user.transactions') }}"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="la la-wallet f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Balance')</span>
                            <h2 class="text-white">{{ $general->cur_sym }}{{ showAmount($widget['balance']) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-4 col-sm-6 d-none d-lg-block">
            <div class="card bg--success has-link box--shadow2">
                <a class="item-link" href="{{ route('user.transactions') }}?remark=order"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="la la-money-bill f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Total Spent')</span>
                            <h2 class="text-white">{{ $general->cur_sym }}{{ showAmount($widget['total_spent']) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xxl-4 col-sm-6 d-none d-lg-block">
            <div class="card bg--danger has-link box--shadow2">
                <a class="item-link" href="{{ route('user.transactions') }}"></a>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <i class="la la-exchange-alt f-size--56"></i>
                        </div>
                        <div class="col-8 text-end">
                            <span class="text--small text-white">@lang('Total Transactions')</span>
                            <h2 class="text-white">{{ $widget['total_transaction'] }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
    </div>





    </div>

    <div class="row gy-4 mt-2">

        <div class="col-xxl-4 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <a class="item-link" href="{{ route('user.voice') }}"></a>
                <i class="las la-phone-volume overlay-icon text-primary"></i>
                <div class="widget-two__icon b-radius--5 bg-success">
                    <i class="las la-phone-volume"></i>
                </div>
                <div class="widget-two__content">
                    <h3>@lang('Google Voice')</h3>
                    <p>@lang('Buy instant google voice')</p>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->

        <div class="col-xxl-4 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <a class="item-link" href="{{ route('user.instant') }}"></a>
                <i class="la la-signal overlay-icon text-secondary"></i>
                <div class="widget-two__icon b-radius--5 bg-secondary">
                    <i class="la la-signal"></i>
                </div>
                <div class="widget-two__content">
                    <h3>@lang('Social Media Boosting')</h3>
                    <p>@lang('Get more followers, Likes, Subscribers, View etc')</p>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->

        <div class="col-xxl-4 col-sm-6">
            <div class="widget-two box--shadow2 b-radius--5 bg--white">
                <a class="item-link" href="{{ route('user.order.cancelled') }}"></a>
                <i class="las la-sms overlay-icon text--danger"></i>
                <div class="widget-two__icon b-radius--5 bg--danger">
                    <i class="las la-sms"></i>
                </div>
                <div class="widget-two__content">
                    <h3>@lang('Instant SMS Verification')</h3>
                    <p>@lang('All countries and services available, on our instant sms verification')</p>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->




    </div><!-- row end-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="{{ $whatsapp_link }}" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

@endsection
