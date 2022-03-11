@extends('layouts.app')
@section('title')
    {{ __('client.orders') }}
@endsection
@section('content')
    <div class="content-page">
        <div class="row">
            <div class="col-lg-4 col-md-4 ">
                <div class="card card-block card-stretch card-height bg-primary ">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 card-total-sale">
                            <div class="icon iq-icon-box-2 bg-info-light">
                                <i class="fas fa-shopping-cart bg-info"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-white ">{{ __('client.totalOrder') }} </p>
                                <h4 class=" text-white ">{{ $result->commands_count }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 ">
                <div class="card card-block card-stretch card-height  bg-success ">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 card-total-sale">
                            <div class="icon iq-icon-box-2 bg-info">
                                <i class="fas fa-thumbs-up bg-info"></i>
                            </div>
                            <div>
                                <p class="mb-2">{{ __('client.paid') }} </p>
                                <h4 class="text-white">{{ $result->total_cost }} DH</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="card card-block card-stretch card-height bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 card-total-sale  ">
                            <div class="icon iq-icon-box-2 bg-danger-light">
                                <i class="fa fa-exclamation-triangle"></i>
                            </div>
                            <div>
                                <p class="mb-2">{{ __('client.reset') }} </p>
                                <h4 class="text-white">{{ $result->total_rest }} DH</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header row">
                <h5 class="card-header-text col-11  ">{{ __('client.infoClient') }} </h5>
                <div class="d-flex align-items-center  list-action col-1">
                    {{--  --}}
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle bg-primary  border-none" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-cog"></i>
                        </button>
                        <div class="dropdown-menu refont-size " aria-labelledby="dropdownMenuButton">
                            @can('isAble', 'ClientController@update')
                                <a class="dropdown-item" href="{{ route('Client.edit', $result->id) }}">
                                    <i class="fas fa-edit mr-1"></i>{{ __('client.update') }} </a>
                            @endcan
                            @can('isAble', 'CommandController@create')
                                <a class="dropdown-item" href="{{ url('Command/create?id=' . $result->id) }}">
                                    <i class="fas fa-plus-square mr-1"></i>{{ __('order.add') }} </a>
                            @endcan

                        </div>
                    </div>
                    {{--  --}}
                </div>
            </div>
            <div class="card-block">
                <div class="view-info">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="general-info">
                                <div class="row">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            {{ __('public.fullName') }}
                                                        </th>
                                                        <td>{{ $result->fullName }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                               {{   __('public.created_at') }}
                                                        </th>
                                                        <td>{{  Carbon\carbon::parse($result->created_at)->format('d-m-Y');  }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            {{ __('public.address') }}
                                                        </th>
                                                        <td>{{ $result->address }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">
                                                            {{ __('public.email') }} </th>
                                                        <td>{{ $result->email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            {{ __('public.tel') }} </th>
                                                        <td>{{ $result->tel }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">
                                                            {{ __('public.isDeleted') }} </th>
                                                        <td>
                                                            @if ($result->isDeleted == 0)
                                                                <span class="badge bg-warning mr-2">
                                                                    {{ __('public.no') }}
                                                                </span>
                                                            @else
                                                                <span class="badge bg-primary  mr-2">
                                                                    {{ __('public.yes') }} </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end of table col-lg-6 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of general info -->
                        </div>
                        <!-- end of col-lg-12 -->
                    </div>
                    <!-- end of row -->
                </div>
                <!-- end of view-info -->
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <div>
                <h4 class="mb-3"> {{ __('client.orders') }} </h4>
            </div>

        </div>
        <table class="data-table table mb-0 tbl-server-info">
            <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>{{ __('order.ref') }} </th>
                    <th>{{ __('order.amount') }} </th>
                    <th>{{ __('client.reset') }} </th>
                    <th>{{ __('client.paid') }}</th>
                    <th>{{ __('public.created_at') }}</th>
                    <th>{{ __('order.isPaid') }}</th>
                    <th>{{ __('public.actions') }}</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @php($i = 1)
                @foreach ($result->commands as $command)
                    <tr>
                        <td><a href="{{ route('Command.show', $command->id) }}">{{ $command->ref }}</a></td>
                        <td>{{ $command->price_total }} DH</td>
                        <td>{{ $command->rest }} DH</td>
                        <td>

                            @if ($command->rules_sum_total_payment != null)
                                ${{ $command->rules_sum_total_payment }}
                            @else
                                0
                            @endif
                        </td>
                        <td>{{  Carbon\carbon::parse($command->create_at )->format('d-m-Y'); }} </td>
                        <td>
                            @if ($command->rest== 0)
                                <span class="badge bg-success mr-2">{{__('public.yes')}}</span>
                            @else
                               <span class="badge bg-warning mr-2">{{__('public.no')}}</span>
                            @endif  
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle bg-primary  border-none" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu refont-size " aria-labelledby="dropdownMenuButton">
                                    @can('isAble', 'CommandController@update')
                                        <a class="dropdown-item" href="{{ route('Command.edit',  $command->id) }}">
                                            <i class="fas fa-edit mr-1"></i>{{ __('public.update') }} </a>
                                    @endcan
                                    @can('isAble', 'CommandController@delete')
                                    <a class="dropdown-item" href="{{ route('Command.destroy',  $command->id) }}">
                                        <i class="fas fa-trash mr-1"></i>{{ __('public.delete') }} </a>
                                    @endcan
                                    @can('isAble', 'CommandController@show')
                                    <a class="dropdown-item" href="{{ route('Command.show',  $command->id) }}">
                                        <i class="fas fa-eye mr-1"></i>{{ __('public.show') }} </a>
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup text-left">
                            <h4 class="mb-3">Pay Order</h4>
                            <div class="content create-workform bg-body">
                                <div class="pb-3">
                                    <label id="total" class="mb-2"> <strong>Total :</strong>
                                    </label>
                                </div>
                                <div class="pb-3">
                                    <input type="number" min="1" max="" id="total-payment" class="form-control"
                                        placeholder="Enter Name or Email">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel
                                        </div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal" onclick="payment()">Pay
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.alert')
        @push('styles')
            <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}" />
        @endpush
        @push('scripts')
            <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        @endpush
        <script>
            result = @json($result);

            function payInfo(id) {
                result = result.commands.find((item) => {
                    return item.id == id;
                })
                $("#total").text("$" + result.rest);
                $("#total-payment").val(result.rest);
            }

            function payment(id) {
                $.ajax({
                    type: 'POST',
                    url: " {{ route('Command.payment', '+idOrder+ ') }} ",
                    data: {
                        _token: "{{ csrf_token() }} ",
                        total_payment: $("#total-payment").val(),
                        id: result.id
                    },
                    success: function(data) {
                        window.location.reload()
                    },
                    error: function(data) {}
                });
            }
        </script>
    </div>
@endsection
