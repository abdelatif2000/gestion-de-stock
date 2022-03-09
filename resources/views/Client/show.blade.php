@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="row">
            <div class="col-lg-3 col-md-4 ">
                <div class="card card-block card-stretch card-height bg-primary ">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 card-total-sale">
                            <div class="icon iq-icon-box-2 bg-info-light">
                                <i class="fas fa-arrow-alt-circle-down"></i>
                            </div>
                            <div>
                                <p class="mb-2 text-white ">Total Orders</p>
                                <h4 class=" text-white ">{{ $result[0]->commands_count }}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 ">
                <div class="card card-block card-stretch card-height  bg-success ">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 card-total-sale">
                            <div class="icon iq-icon-box-2 bg-danger-light">
                                <i class="far fa-money-bill-alt"></i>
                            </div>
                            <div>
                                <p class="mb-2">payment</p>
                                <h4 class="text-white">${{ $result[0]->total_cost }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="card card-block card-stretch card-height bg-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4 card-total-sale  ">
                            <div class="icon iq-icon-box-2 bg-danger-light">
                                <i class="ri-time-line ri-2x line-height text-primary"></i>
                            </div>
                            <div>
                                <p class="mb-2">Rest</p>
                                <h4 class="text-white">${{ $result[0]->total_rest }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header row">
                <h5 class="card-header-text  col-8 col-md-9 col-lg-10 ">Client Information</h5>
                <div class="d-flex align-items-center list-action col-4 col-md-3 col-lg-2">
                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title=""
                        data-original-title="Edit" href="{{ route('Client.edit', $result[0]->id) }}" data-placement="top"><i
                            class="ri-pencil-line mr-0"></i></a>
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
                                                            First Name
                                                        </th>
                                                        <td>{{ $result[0]->firstName }} </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            Last Name</th>
                                                        <td>{{ $result[0]->lastName }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            Created At
                                                        </th>
                                                        <td>{{ $result[0]->created_at }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            Address
                                                        </th>
                                                        <td>{{ $result[0]->address }}</td>
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
                                                            Email</th>
                                                        <td>{{ $result[0]->email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            Mobile
                                                            Number</th>
                                                        <td>{{ $result[0]->tel }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            Fix</th>
                                                        <td>{{ $result[0]->fix }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">
                                                            IsDeteled</th>
                                                        <td>
                                                            @if ($result[0]->isDeleted == 0)
                                                                <span class="badge bg-warning mr-2">No</span>
                                                            @else
                                                                <span class="badge bg-primary  mr-2">Yes</span>
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
                <h4 class="mb-3">Orders</h4>
            </div>
            <a href="{{ url('Command/create?id='.$result[0]->id)}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add
                Order</a>
        </div>
        <table class="data-table table mb-0 tbl-server-info">
            <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>
                        <div class="checkbox d-inline-block">
                            <input type="checkbox" class="checkbox-input" id="checkbox1">
                            <label for="checkbox1" class="mb-0"></label>
                        </div>
                    </th>
                    <th>Index</th>
                    <th>ref </th>
                    <th>Amount</th> 
                    <th>Rest </th>
                    <th>Total Paid</th>
                    <th>Pay</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @php($i = 1)
                @foreach ($result[0]->commands as $command)
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox2">
                                <label for="checkbox2" class="mb-0"></label>
                            </div>
                        </td>
                        <td>{{ $i++ }}</td>
                        <td><a href="{{ route('Command.show', $command->id) }}">{{ $command->ref }}</a></td>
                        <td>${{ $command->price_total }}</td>
                        <td>${{ $command->rest }}</td>
                        <td>@if ($command->rules_sum_total_payment != null)${{ $command->rules_sum_total_payment }}@else 0 @endif </td>
                        <td>
                            @if($command->rest==0)
                              <span class="badge bg-warning mr-2">Paid</span>
                            @else
                            <a onclick="payInfo({{ $command->id }})" data-target="#payment" data-toggle="modal"
                                class="btn btn-success  text-white"><i class="far fa-credit-card text-white"></i> Pay
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div  class="modal fade" id="payment" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <input type="number" min="1" max=""      id="total-payment"
                                        class="form-control" placeholder="Enter Name or Email">
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <div
                                        class="d-flex flex-wrap align-items-ceter justify-content-center">
                                        <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel
                                        </div>
                                        <div class="btn btn-outline-primary" data-dismiss="modal"
                                            onclick="payment()">Pay</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
                result=@json($result[0]);
              function payInfo(id) {
                   result=result.commands.find((item)=>{
                       return  item.id==id;
                   })
             console.log(result);
                   $("#total").text("$"+result.rest);
                    $("#total-payment").val(result.rest);
            }

            function payment(id) {
                    $.ajax({
                        type: 'POST',
                        url: " {{ route('Command.payment', '+idOrder+ ')}} ",
                        data: {
                            _token: "{{ csrf_token()}} ",
                              total_payment: $("#total-payment").val(),
                              id:result.id
                        },
                        success: function(data) {
                            window.location.reload()
                        },
                        error: function(data) {
                            }
                    });
                }

        </script>
    </div>
@endsection
