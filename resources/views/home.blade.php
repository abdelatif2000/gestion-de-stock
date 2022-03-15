@extends('layouts.app')
@section('content')
    <div class="content-page" style="position:relative" >
        <div class="container-fluid">
            <div class="row">
                <div class="input-group mb-4 col-5">
                    <div class="input-group-prepend ">
                        <label class="input-group-text bg-primary" style="cursor:pointer" for="startDate"><i
                                class="fas fa-calendar-day text-white"></i></label>
                    </div>
                    <input type="text" id="startDate" readonly class="form-control" placeholder="Start Date">
                </div>
                <div class="input-group mb-4  col-5">
                    <div class="input-group-prepend ">
                        <label class="input-group-text bg-primary" style="cursor:pointer" for="endDate"><i
                                class="fas fa-calendar-day text-white"></i> </label>
                    </div>
                    <input type="text" readonly class="form-control" id="endDate" placeholder="End Date">
                </div>
                {{-- <div class="input-group mb-4 col-2">
                        <select class="form-control ">
                           <option value="1">This Day</option>
                           <option value="2">This Week </option>
                           <option selected >This Month</option>
                        </select>
                </div> --}}
                <div class="input-group mb-4 col-2">
                    <button type="button" id="filterByDate" class="form-control" placeholder="Start Date"> <i
                            class="ri-search-line mr-2"></i> Search </button>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-transparent card-block card-stretch card-height border-none">
                            <div class="card-body p-0 mt-lg-2 mt-0">
                                <h3 class="mb-3">Hi Graham, Good Morning</h3>
                                <p class="mb-0 mr-4">Your dashboard gives you views of key performance or business
                                    process.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card card-block card-stretch">

                                    <div class="card-body">
                                        <div class="m-0">
                                            <div class="card card-block card-stretch card-height  bg-success ">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center  card-total-sale">
                                                        <div class="icon iq-icon-box-2 bg-danger-light">
                                                            <i class="fas fa-user-friends mx-2"></i>
                                                        </div>
                                                        <div>
                                                            <p class="mb-2">Clients</p>
                                                            <h4 class="text-white font" id="total-Clients">
                                                                {{ $statistic['clients'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-block card-stretch">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <div class="card card-block card-stretch card-height  bg-primary ">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center  card-total-sale">
                                                        <div class="icon iq-icon-box-2 bg-danger-light">
                                                            <i class="far fa-money-bill-alt"></i>
                                                        </div>
                                                        <div>
                                                            <p class="mb-2 ">Earnings</p>
                                                            <h4 class="text-white font" id="total-earnings">
                                                                ${{ $statistic['earnings'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card card-block card-stretch">
                                    <div class="card-body">
                                        <div class="m-0">
                                            <div class="card card-block card-stretch card-height  bg-success ">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center  card-total-sale">
                                                        <div class="icon iq-icon-box-2 bg-danger-light">
                                                            <i class="fas fa-arrow-alt-circle-down"></i>
                                                        </div>
                                                        <div>
                                                            <p class="mb-2">Orders</p>
                                                            <h4 class="text-white  font" id="total-orders">
                                                                {{ $statistic['orders'] }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Top Products</h4>
                                </div>
                            </div>
                            <div class="card-body info-product" >
                                <ul class="list-unstyled row top-product mb-0v row" id="content-top-product">
                                    @foreach ($statistic['topProduct'] as $product)
                                        <li class="col-lg-3 ">
                                            <div class="card card-block card-stretch mb-0">
                                                <a href=" {{ route('product.show', $product['product_id']) }} ">
                                                    <div class="card-body">
                                                        <div class="bg-warning-light rounded " width="100%" height="60px">
                                                            <img src="{{ asset($product->product->photos[0]->path) }}"
                                                                class="style-img img-fluid m-auto rounded" height="100%"
                                                                width="100%" alt="image">
                                                        </div>
                                                        <div class="style-text text-left mt-3">
                                                            <h5 class="mb-1 nameTopProduct">{{ $product->product->name }}
                                                            </h5>
                                                            <p class="mb-0"> {{ $product->productSold }} Sold
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                       
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Best Clients</h4>
                                </div>
                            </div>
                            <div class="card-body info-product">
                                   <div class="row">
                                                @foreach ($statistic['topClients'] as $client)
                                                    <div class="card card-block card-stretch card-height-helf col-lg-12 ">
                                                        <div class="card-body card-item-right">
                                                            <a href="{{ route('Client.show', $client->id) }}">
                                                                <div class="d-flex align-items-top">
                                                                    <img src="{{asset('images/user/1.png') }}  " class="style-img img-fluid m-auto rounded " alt="image" width="115px">
                                                                    <div class="style-text text-left">
                                                                        <h5 class="mb-1 ">
                                                                            {{ $client->firstName . '   ' . $client->lastName }}
                                                                        </h5>
                                                                        <p style="color:black" class="mb-1 text-black">Total Order :
                                                                            {{ $client->commands_count }}</p>
                                                                        <p style="color:black" class="mb-0 text-black">Total Paid :
                                                                            ${{ $client->total_cost }}</p>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                       </div>
                                                @endforeach
                                   </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card card-block card-stretch card-height">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Product Close To Finishing</h4>
                                </div>
                            </div>
                            <div class="card-body info-product">
                                <ul class="list-unstyled row top-product mb-0 row">
                                    @foreach ($statistic['productCloseToFinish'] as $product)
                                        <li class="col-lg-2">
                                            <div class="card card-block card-stretch mb-0">
                                                <a href=" {{ route('product.show', $product->product_id) }} ">
                                                    <div class="card-body">
                                                        <div class="bg-warning-light rounded " width="100%" height="60px">
                                                            <img src="{{ asset($product->product->photos[0]->path) }}"
                                                                class="style-img img-fluid m-auto rounded" height="100%"
                                                                width="100%" alt="image" />
                                                        </div>
                                                        <div class="style-text text-left mt-3">
                                                            <h5 class="mb-1 nameTopProduct">{{ $product->product->name }}
                                                            </h5>
                                                            <p class="mb-0"> {{ $product->quantity }} Still</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                {{-- <div class="loading-data">
                                <div id="loader"></div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-block card-stretch">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Earnings This Week</hh4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chartEarnings" style="min-height: 360px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-block card-stretch">
                            <div class="card-header d-flex justify-content-between">
                                <div class="header-title">
                                    <h4 class="card-title">Clients This Week</hh4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="chartClients" style="min-height: 360px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loading-data">
            <div id="loader"></div>
         </div>
    </div>
    @push("styles")
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}} ">
    @endpush
    @push("scripts")
    <script src="{{ asset('vendor/charts/echarts.min.js') }}"></script>
    <script src=" {{ asset('js/jquery-ui.js') }}" ></script>
    <script>
        let data;
        let earningsWeek = @json($statistic['earningsWeek']);
        let clientsWeek = @json($statistic['clientsWeek']);
        $("#filterByDate").on("click", function() {
             $(".loading-data").css("display","inline-block");
            $.ajax({
                type: 'GET',
                url: "{{route('home.filterByDate') }}",
                data: {
                    startDate: $("#startDate").val(),
                    endDate: $("#endDate").val()
                },
                success: function(data) {
                    filterDate(data);
                },
                error: function(errors) {}
            });
        })
    </script>
    <script src="{{ asset('js/home.js') }}"></script>
    @endpush
   

@endsection
