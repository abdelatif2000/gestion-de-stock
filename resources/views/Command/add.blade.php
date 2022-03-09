@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Add Order</h4>
                            </div>
                            <a href="{{ route('Command.index') }}" class="btn btn-primary add-list"> List Orders</a>
                        </div>
                        <div id='success' class="alert alert-primary " style="display: none" role="alert">
                            <div class="iq-alert-text ">{{ Session::get('success') }}</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Command.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    @if(isset($client_id))
                                           <input type="hidden" value="{{$client_id}}" id="client_id" />    
                                    @else
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Client * </label>
                                            <select id='client_id' class="selectpicker form-control" data-style="py-0">
                                                <option value="" selected>Select Client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">
                                                        {{ $client->firstName . ' ' . $client->lastName }}</option>
                                                @endforeach
                                            </select>
                                            <div id="client_error" class="help-block with-errors text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ref *</label>
                                            <input id="ref" value="" type="text" class="form-control"
                                                placeholder="Enter Ref " />
                                            <div id="ref_error" class="help-block with-errors text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product * </label>
                                            <select   id="product_selected" class="selectpicker form-control"
                                                data-style="py-0">
                                                <option id="productSelcect" value="" selected>Select Product</option>
                                                 @foreach ($products as $product)
                                                     <option value="{{ $product->product->id }}">{{ $product->product->name  }}</option>
                                                 @endforeach 
                                            </select>
                                            <div id="products_error" class="help-block with-errors text-danger"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quantity * </label>
                                            <div class="row">
                                                    <button  type="button" id="decrease"  class="form-control col-1"><i class="fas fa-minus"></i></button>
                                                    <input type="number" readonly id="quantity" value='1'  class="form-control col-2 text-center mx-2" />
                                                    <button  type="button" id="increase" class="form-control col-1 mr-4"><i class="fas fa-plus"></i></button>
                                                    <label     class="form-control col-4 border-none"> <strong class="mr-2">Available :</strong>
                                                        <label  id="quantityAvaibale" for="form-control col-2 border-none">30</label>
                                                    </label>
                                            </div>
                                            <div id="quantity_error" class="help-block with-errors text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="product_in_array" class="col-md-12">
                                    </div>
                                    <button type="button" class="btn btn-success mb-2 ml-3 mt-2" onclick="add()"><i
                                            class="las la-plus"></i>  </button>
                                </div>
                                <div class="text-center">
                                    <button id="addCommand" type="submit " class="btn btn-primary mr-2">Add Order</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
       @push('scripts')
       <script src="{{ asset('js/add.js') }}"> </script>
         @include('scripts.orders.add')
       @endpush
    </div>
@endsection
