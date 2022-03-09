@extends('layouts.app')
@section('content')
<div class="content-page">
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <div class="card-header d-flex justify-content-between bg-primary header-invoice">
                    <div class="iq-header-title">
                        <h4 class="card-title mb-0">Command #{{ $result[0]->id}}</h4>
                    </div>
                    <div class="invoice-btn">
                        <a  href="{{ route('Command.generateInvoice',$result[0]->id) }}" class="btn btn-primary-dark">       <i class="fas fa-download"></i>Invoice</a>
                        <a  data-target="#payment"  data-toggle="modal" class="btn btn-success" ><i class="far fa-credit-card"></i> Pay
                        </a>
                    </div>
                    <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="popup text-left">
                                        <h4 class="mb-3">Pay  Order</h4>
                                        <div class="content create-workform bg-body">
                                                <div class="pb-3">
                                                    <label class="mb-2"> <strong>Total :</strong> ${{$result[0]->products_sum_product_commandprice_product_commandquantity}}</label>
                                                </div>
                                                <div class="pb-3">
                                                        <input type="number" min="1" max="{{$result[0] ->products_sum_product_commandprice_product_commandquantity}}"  id="total-payment" value="{{$result[0]->products_sum_product_commandprice_product_commandquantity}}" class="form-control" placeholder="Enter Name or Email">
                                                </div>
                                            <div class="col-lg-12 mt-4">
                                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                                    <div class="btn btn-outline-primary" data-dismiss="modal" onclick="payment({{$result[0]->id}})">Pay</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" >Date Command  </th>
                                <th scope="col">Command Ref</th>
                                <th scope="col">Client Information</th>
                                <th scope="col">Total Price </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $result[0]->created_at}}</td>
                                <td>{{ $result[0]->ref}}</td>
                                <td>
                                    <p class="mb-0">Name: {{ $result[0]->client->firstName.'  '. $result[0]->client->firstName}}<br>
                                        Phone: {{ $result[0]->client->tel}}<br>
                                        Email:  {{ $result[0]->client->email}}<br>
                                        Edress:  {{ $result[0]->client->address}}<br>
                                    </p>
                                </td>
                                <td>${{$result[0]->products_sum_product_commandprice_product_commandquantity}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3"> Command's  Products </h4>
                        </div>
                        <a href="{{route('Command.index')}}" class="btn btn-primary add-list">List Commands</a>
                    </div>
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
                            <th>Product Name</th> 
                            <th>Quantity </th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @php($i=1)
                        @foreach( $result[0]->products as  $result[0])
                        <tr>
                            <td>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td>
                            <td>{{$i++}}</td>
                            <td>
                               <a href="{{route('product.show', $result[0]->product->id)}}"> {{$result[0]->product->name}}</a>  
                            </td>
                            <td>{{ $result[0]->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
    <script>
           
            function payment(id) {
                $.ajax({
                    type: 'POST',
                    url: " {{ route('Command.payment',$result[0]->id) }} ",
                    data: {
                        _token: "{{ csrf_token() }} ",
                          total_payment: $("#total-payment").val(),
                    },
                    success: function(data) {

                    },
                    error: function(data) {
                        }
                });
            }
          
    </script>
</div>
@endsection