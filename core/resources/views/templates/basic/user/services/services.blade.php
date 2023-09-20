@extends($activeTemplate . 'layouts.app')
@section('panel')

<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
}

</style>
<div class="row gy-4">

    <div class="card bg--primary has-link box--shadow2 overflow-hidden">


    </div>
</div><!-- dashboard-w1 end -->
<div class="col-xxl-4 col-sm-6">


</div>



<div class="row">

    <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="facebook">
                        <div class="center"><img class="center"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/facebook.svg" width="50"
                                height="50" alt=""></div>
                    </a>
                </div>
            </div>
        </div>




        <div class="col-lg-1 col-md-1 col-sm-1 col-3 mb-1">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="youtube">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/youtube.svg" width="50"
                                height="50" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="instagram">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/instagram.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="tiktok">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/tiktok.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="spotify">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/spotify.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3 mb-1">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="twitter">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/twitter.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="snapchat">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/snapchat.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="telegram">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/telegram.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="soundcloud">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/soundcloud.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="linkedin">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/linkedin.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="twitch">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/twitch.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-3">
            <div class="card b-radius--10">
                <div class="card-body">
                    <a href="javascript:void(0);" class="media brand-category" data-id="pintrest">
                        <div class="icon"><img class="img-responsive"
                                src="https://yourpanelassets.com/projects/pak2p/img/svg/pintrest.svg" alt=""></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 p-6">

        <div class="card b-radius--10 mb-4 my-5">
            <div class="card-body">
                <h5 class="p-2 mb-4">New Order</h5>



                <form action="order/create" method="post">
                    @csrf

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <label>Choose Category</label>

                                <select name="cat" class="form-control" id="country-dropdown">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                        @endforeach

                                </select>


                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <div class="form-group mb-3">
                                    <label>Choose Service</label>
                                    <select id="state-dropdown" required name="service" placeholder="Choose service"
                                        class="form-control">
                                    </select>



                                </div>




                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <div class="form-group mb-3">
                                    <label>Link</label>
                                    <input type="text" placeholder="Enter Link" autofocus id="link" required name="link"
                                        class="form-control">
                                    </input>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <div class="form-group mb-3">
                                    <label>Quantity</label>
                                    <input type="number" autofocus id="num1" required name="qty"
                                        placeholder="Enter quantity" class="form-control">
                                    </input>
                                    <span class="text-muted" id="min">Min:</span> | <span class="text-muted"
                                        id="max">Max:</span>
                                </div>

                                <input type="number" hidden id="min2" name="min">



                            </div>

                        </div>


                        <div class="col-md-12">
                            <div class="form-group mb-3">

                                <div class="form-group mb-3">
                                    <label>Charge</label>
                                    <input type="number" disabled id="result2" name="charge" class="form-control">


                                    </input>
                                </div>
                            </div>

                        </div>



                        <div class="col-6 col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg mb-5" role="button">Order</button>
                        </div>




                    </div>

                </form>





            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card b-radius--10 mb-4 my-5">
            <div class="card-body p-2">
                <label class="p-2">Order Information</label>



                <div class="row p-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Amount</label>
                            <h5 class="" value=" " id="price"> </h5>
                        </div>

                    </div>
                </div>

                <div class="row p-4">


                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Details</label>
                            <p class="" id="details"> </p>
                        </div>

                    </div>

                </div>




            </div>


        </div>
    </div>
</div>

</div>



</div>





{{--
@forelse($categories as $category)
<div class="col-lg-12">
    <div class="d-flex flex-wrap justify-content-between mb-3 gap-2">
        <h3>{{ __($category->name) }}</h3>

        <a href="{{ route('user.service.category', $category->id) }}" class="btn btn-sm btn-outline--primary"> <i
                class=" las la-list-ul"></i>
            @lang('View All')</a>
    </div>
    <div class="card b-radius--10">
        <div class="card-body p-0">
            <div class="table-responsive--lg table-responsive">
                <table class="table table--light tabstyle--two">
                    <thead>
                        <tr>
                            <th>@lang('Service ID')</th>
                            <th>@lang('Service')</th>
                            <th>@lang('Price Per 1k')</th>
                            <th>@lang('Min')</th>
                            <th>@lang('Max')</th>
                            <th>@lang('Make Order')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                        $services = $category
                        ->services()
                        ->limit(10)
                        ->get();
                        @endphp
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td class="break_line">{{ __($service->name) }}
                            </td>
                            <td>
                                {{ $general->cur_sym . showAmount($service->price_per_k) }}</td>
                            <td>{{ $service->min }}</td>
                            <td>{{ $service->max }}</td>

                            <td>
                                <button type="button" class="btn btn-sm btn-outline--info detailsBtn"
                                    data-details="{{ $service->details }}" @disabled(!$service->details)> <i
                                        class="la la-desktop"></i> @lang('Details')
                                </button>

                                <button type="button" class=" btn btn-sm btn-outline--primary orderBtn"
                                    data-url="{{ route('user.order.create', $service->id) }}"
                                    data-api_provider_id="{{ $service->api_provider_id }}"
                                    data-price_per_k="{{ getAmount($service->price_per_k) }}"
                                    data-min="{{ $service->min }}" data-max="{{ $service->max }}">
                                    <i class="las la-cart-plus"></i> @lang('Order')
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table><!-- table end -->
            </div>
        </div>
    </div><!-- card end -->
</div>
@empty
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4>
                {{ __($emptyMessage) }}
            </h4>
        </div>
    </div>
</div>
@endforelse --}}
</div>



















{{-- Details MODAL --}}
{{-- <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> @lang('Details')</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div id="details">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--dark btn-sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div> --}}
{{-- Order MODAL --}}
{{-- <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">@lang('Place a new order')</h4>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form method="post" class="resetForm">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="api_provider_id">
                    <div class="form-group">
                        <label>@lang('Link')</label>
                        <input type="url" class="form-control" name="link" required>
                    </div>
                    <div class="form-group">
                        <label>@lang('Quantity')</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-text">@lang('Min')</div>
                                <input type="number" name="min" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <div class="input-group-text">@lang('Max')</div>
                                <input type="number" name="max" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-text">@lang('Price')</div>
                            <input type="text" class="form-control total_price " name="price" readonly>
                            <div class="input-group-text">@lang('Per 1K')</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary h-45 w-100">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="{{ $whatsapp_link }}" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>



@endsection

@push('script')




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

                               /*------------------------------------------
                               --------------------------------------------
                               Country Dropdown Change Event
                               --------------------------------------------
                               --------------------------------------------*/
                               $('#country-dropdown').on('change', function () {
                                   var cat = this.value;
                                   $("#state-dropdown").html('');
                                   $.ajax({
                                       url: "{{url('api/process-request')}}",
                                       type: "GET",
                                       data: {
                                            cat: cat,
                                           _token: '{{csrf_token()}}'
                                       },
                                       dataType: 'json',
                                       success: function (result) {
                                          console.log(result)


                                          $('#state-dropdown').html('<option value="">-- Select Service --</option>');
                                          $.each(result.services, function (key, value) {
                                              $("#state-dropdown").append('<option value="' + value
                                                  .id + '">' + value.name + '</option>');
                                          });

                                          $('#city-dropdown').html('<option value="">-- Amount --</option>');
                                       }
                                   });
                               });


                              /*------------------------------------------
                               --------------------------------------------
                               State Dropdown Change Event
                               --------------------------------------------
                               --------------------------------------------*/
                               $('#state-dropdown').on('change', function () {
                                var cat = this.value;
                                $("#city-dropdown").html('');
                                $.ajax({
                                    url: "{{url('api/process-info')}}",
                                    type: "GET",
                                    data: {
                                        cat: cat,
                                        _token: '{{csrf_token()}}'
                                    },
                                    dataType: 'json',
                                    success: function (res) {
                                       console.log(res)
                                       $.each(res.services, function (key, value) {
                                        document.getElementById('price').innerHTML = value.price_per_k;
                                        document.getElementById('min').innerHTML = value.min;
                                        document.getElementById('max').innerHTML =  value.max;
                                        document.getElementById('details').innerHTML =  value.name;


                                        const price2 =  document.getElementById('price').value = value.price_per_k;
                                        const min2 =    document.getElementById('min2').value = value.min;


                                        });


                                    }
                                });
                            });

                        });







</script>


<script>
    $('input').keyup(function() { // run anytime the value changes

        var num1 = document.getElementById('num1').value; // convert it to a float
        var rate = document.getElementById('price').value; // convert it to a float

        var result =  document.getElementById('result2').value = Number(num1) * Number(rate);

        console.log(result);
        console.log(num1);
        console.log(rate);



    });
</script>





<script>
    (function($) {
            "use strict";

            $('.detailsBtn').on('click', function() {
                var modal = $('#detailsModal');
                var details = $(this).data('details');
                modal.find('#details').html(details);
                modal.modal('show');
            });

            $('.orderBtn').on('click', function() {
                var modal = $('#orderModal');
                $('.resetForm').trigger('reset');
                var url = $(this).data('url');
                var pricePerK = parseFloat($(this).data('price_per_k'));
                var min = $(this).data('min');
                var max = $(this).data('max');
                let apiProviderId = $(this).data('api_provider_id');
                //Calculate total price
                $(document).on("keyup", "#quantity", function() {
                    var quantity = parseInt($('#quantity').val());
                    var totalPrice = parseFloat((pricePerK / 1000) * quantity);
                    modal.find('input[name=price]').val("{{ $general->cur_sym }}" + totalPrice
                        .toFixed(2));
                });

                modal.find('form').attr('action', url);
                modal.find('input[name=quantity]').attr('min', min).attr('max', max);
                modal.find('input[name=min]').val(min);
                modal.find('input[name=max]').val(max);
                modal.find('input[name=api_provider_id]').val(apiProviderId)
                modal.modal('show');
            });

            //Scroll to paginate position
            var pathName = document.location.pathname;
            window.onbeforeunload = function() {
                var scrollPosition = $(document).scrollTop();
                sessionStorage.setItem("scrollPosition_" + pathName, scrollPosition.toString());
            }
            if (sessionStorage["scrollPosition_" + pathName]) {
                $(document).scrollTop(sessionStorage.getItem("scrollPosition_" + pathName));
            }
        })(jQuery);
</script>
@endpush
