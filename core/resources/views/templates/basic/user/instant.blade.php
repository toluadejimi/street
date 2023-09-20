@extends($activeTemplate . 'layouts.app')
@section('panel')

<style>
    .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #25d366;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float {
        margin-top: 16px;
    }
</style>


<div class="row d-none d-lg-block">

    <ul class="list-group list-group-horizontal mb-3">
        @foreach ($services as $data)
        <li class="list-group-item"><img src="{{$data->logo}}" width="25" height="25"></li>
        @endforeach
    </ul>

    <ul class="list-group list-group-horizontal responsive b-radius--5">
        @foreach ($countries as $data)
        <li class="list-group-item"><img src="{{$data->flag}}" width="25" height="25"></li>
        @endforeach
    </ul>

</div>

<div class="row d-sm-none">

    <ul class="list-group list-group-horizontal d-sm-none mb-2">
        @foreach ($mservices as $data)
        <li class="list-group-item"><img src="{{$data->logo}}" width="40" height="40"></li>
        @endforeach
    </ul>

    <ul class="list-group list-group-horizontal responsive b-radius--5">
        @foreach ($mcountries as $data)
        <li class="list-group-item"><img src="{{$data->flag}}" width="40" height="40"></li>
        @endforeach
    </ul>

</div>







<div class="row">



    <div class="col-md-6 p-6">


        <div class="card b-radius--10 mb-4 my-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif

            <div class="card-body">
                <h5 class="p-2 mb-4">New Instant SMS Order</h5>


                <form action="get-number" method="get">
                    @csrf

                    <div class=" ">
                        <ul class="list-group list-group-horizontal responsive">
                            {{-- @foreach ($countries as $data)
                            <li class="list-group-item"><img src="{{$data->flag}}" width="20" height="20"></li>
                            @endforeach --}}
                        </ul>
                    </div>
                    <div class="form-group">
                        <label class=" my-2">Choose Country</label>
                        <input required name="country" list="datalistOptions" id="exampleDataList"
                            placeholder="Type to search for country" class="form-control mb-3">
                        <datalist id="datalistOptions">
                            <option value="">-- Select Item --</option>
                            @foreach ($countries as $data)
                            <option value="{{$data->country}}">{{$data->country}}
                            </option>
                            @endforeach
                        </datalist>
                    </div>



                    <div class="form-group">

                        <label class="my-2">Choose Service</label>
                        <input required name="service" list="datalistOption" id="exampleDataList"
                            placeholder="Type to search for service" class="form-control">
                        <datalist id="datalistOption">
                            <option value="">-- Select Item --</option>
                            @foreach ($services as $data)
                            <option value="{{$data->service}}">{{$data->service}} <img src="{{$data->logo}}" width="50"
                                    height="15">
                            </option>
                            @endforeach
                        </datalist>
                    </div>


                    <div class="row">


                        <div class="col-12 col-md-6 mt-3">
                            <button type="submit" class="btn btn-primary btn-lg mb-5" role="button">Purchase
                                Number</button>
                        </div>



                    </div>




                </form>




            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="card b-radius--10 mb-4 my-5">
            <div class="card-body p-4">


                <div class="section-title">
                    <h4>Get Number</h4>
                </div>





                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="icon-box">
                            <div class="col-12 col-md-12">

                                <hr>

                                @if($number_view == 1)

                                <div class="row">

                                    <input type="country" value="{{ $country_cc }}" id="country_cc" hidden>
                                    <input type="country" value="{{ $service_cc }}" id="service_cc" hidden>
                                    <input type="country" value="{{ $id }}" id="sid" hidden>


                                    <input type="country" value="{{ $amount }}" id="amount" hidden>
                                    <input type="country" value="{{ Auth::user()->id }}" id="user_id" hidden>


                                    <h4 class="mb-3">Waiting for SMS </h4>
                                    <h4 style="color:red;" id="timer"> <span id="countdown"></span></h4>

                                    <div class="row">

                                        <div class="col-6 col-md-6 mt-4">
                                            <h5>Phone No</h5>
                                            <p>{{$country_code ?? " "}}{{$number ?? " "}}</p>

                                        </div>

                                        <div class="col-6 my-4">

                                            <textarea id="displaySms"> </textarea>

                                        </div>
                                    </div>

                                    <div class="row mt-3">


                                        <div class="col-6 col-md-6 mt-4">
                                            <a href="#" id="requestButtonp" class="btn btn-success btn-lg"
                                                role="button">Get Sms</a>
                                        </div>


                                        <div class="col-6 col-md-6 my-4">
                                            <a href="/user/ban-number?country={{$country_cc ?? " "}}&service={{$service_cc  ?? " " }}&id={{$id  ?? " " }}"
                                                class="btn btn-danger btn-lg" role="button">Cancle</a>
                                        </div>

                                    </div>
                                    @elseif($number_view == 2)
                                    <div class="row">

                                        <div class="col-6 col-md-6">
                                            @if($country != null )
                                            <h5>County </h5> <img src="{{$flag ?? " "}}" alt="">
                                            <p>{{$country ?? " "}} </p>
                                            @endif
                                        </div>

                                        <div class="col-6 col-md-6">
                                            @if($service != null )
                                            <h5>Service</h5>
                                            <p>{{$service ?? " "}}</p>
                                            @endif
                                        </div>


                                        <div class="col-6 col-md-6">
                                            @if($amount != null )
                                            <h5>Amount</h5>
                                            <p>NGN {{number_format($amount, 2)}}</p>
                                            @endif
                                        </div>

                                        <div class="col-6 col-md-6">
                                            @if($count != null )
                                            <h5>Count</h5>
                                            <p>{{number_format($count)}} Available</p>
                                            @endif
                                        </div>


                                        <div class="col-6 col-md-6 mt-4">
                                            @if($count ?? null != 0)
                                            <a href="/user/buyinstant-number?service={{$service ?? " "}}&country={{$country  ?? " " }}&amount={{$amount  ?? " " }}"
                                                id="requestButtonp" class="btn btn-success btn-md" role="button">Buy
                                                Number</a>
                                            @endif
                                        </div>
                                    </div>

                                    @else


                                    <div class="row">
                                        <p>Select Country and Service to get a number for verification</p>
                                    </div>

                                    @endif



                                </div>
                            </div>

                        </div>



                    </div>




                </div>
            </div>
        </div>


























        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="{{ " whatsapp_link" }}" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>



        @endsection

        @push('script')



        <script src="{{url('')}}/assets/js/main.js"></script>



        <script>
          function displaySms(data) {
            const message = data.sms;
            const getSmsDiv = document.getElementById("getSms"); 
          }
      
      
          let repeatRequest = true;
      
      
          function makeRequest() {
          if (!repeatRequest) {
              return; // Stop the repetition
          }
      
      
      
      
          const country = document.getElementById('country_cc').value;
          const service = document.getElementById('service_cc').value;
          const sid = document.getElementById('sid').value;
      
      
          console.log(country);
          console.log(service);
          console.log(sid);
      
      
      
         
      
          const url = "{{ url('') }}/api/fetch-sms?country=" +country+"&service="+service+"&id="+sid;
          fetch(url)
        
              .then((response) => response.json())
              .then(data => {
              // Process the response data
              console.log(data);
              //displaySms(data);
      
              if (data.status === 'pending') {
                  // Repeat the request after 5 seconds
                  setTimeout(makeRequest, 10000);
      
      
      
              } else if (data.status === 'success') {
      
                const user_id = document.getElementById('user_id').value;
                const amount = document.getElementById('amount').value;
      
                document.getElementById("displaySms")
                .innerHTML += data.sms;
      
                var audio = new Audio('{{url('')}}/assets/Yeet.mp3');
                audio.play();
      
                fetch("{{ url('') }}/api/process", {
                  method: "POST",
                  body: JSON.stringify({
                    user_id: user_id,
                    amount: amount
                  }),
                  headers: {
                    "Content-type": "application/json; charset=UTF-8"
                  }
      
                })
      
                  .then((response) => response.json())
                  .then((json) => console.log(json));
      
             
      
               
      
      
      
                  repeatRequest = false; // Stop the repetition
              }
              })
      
              //console.log(error);
              //.catch(error => {
              // Handle any errors that occurred during the request
              //console.error(error);
             // });
          }
      
      
      
          function startTimer(duration, display) {
              let timer = duration;
              const countdownElement = document.getElementById(display);
      
              const intervalId = setInterval(function() {
                  const minutes = Math.floor(timer / 60);
                  const seconds = timer % 60;
      
                  countdownElement.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
      
      
      
      
      
                if (timer === 0) {
      
      
                const user_id = document.getElementById('user_id').value;
                const amount = document.getElementById('amount').value;
      
               
      
                  fetch("{{ url('') }}/api/ban", {
                    method: "POST",
                    body: JSON.stringify({
                      user_id: user_id,
                      amount: amount
                    }),
                    headers: {
                      "Content-type": "application/json; charset=UTF-8"
                    }
        
                  })
        
                    .then((response) => response.json())
                    .then((json) => console.log(json));
                 
                  window.location.href = "{{url('')}}/user/instant";
      
                }
      
                timer--;
              }, 1000);
            }
      
      
        const btn =    document.getElementById('requestButtonp');
        btn.addEventListener("click", function(){
          //document.getElementById('requestButtonp').classList.add('hidden');
      
          startTimer(600, 'countdown');
          makeRequest()
        })
      
      
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