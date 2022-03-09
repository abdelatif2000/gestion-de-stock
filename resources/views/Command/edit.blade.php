@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Updated Order</h4>
                            </div>
                            <a href="{{ route('Command.index') }}" class="btn btn-primary add-list"> List Order</a>
                        </div>
                        <div id='success' class="alert alert-primary " style="display: none" role="alert">
                            <div class="iq-alert-text ">{{ Session::get('success') }}</div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('Command.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Client * </label>
                                            <select id='client_id' class="selectpicker form-control" data-style="py-0">
                                                <option value="{{ $result->client->id}}" selected>
                                                    {{ $result->client->firstName . ' ' . $result->client->lastName }}
                                                </option>
                                                @foreach ($clients as $client)
                                                    @if ($client->id != $result->client->id)
                                                        <option value="{{ $client->id }}">
                                                            {{ $client->firstName . ' ' . $client->lastName }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <div id="client_error" class="help-block with-errors text-danger">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Ref *</label>
                                            <input id="ref" value="{{$result->ref}}" type="text" class="form-control"
                                                placeholder="Enter Ref " />
                                            <div id="ref_error" class="help-block with-errors text-danger">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product * </label>
                                            <select id="product_selected" class="selectpicker form-control"
                                                data-style="py-0">
                                                <option value="" selected>
                                                    Select Product
                                               </option>
                                                @foreach ($products_list as $product)
                                                        <option value="{{ $product->id }}">{{ $product->name }}
                                                        </option>
                                                @endforeach
                                            </select>
                                            <div id="products_error" class="help-block with-errors text-danger"> </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quantity *</label>
                                            <input id="quantity" value="1" type="number" class="form-control"
                                                placeholder="Enter Quantity " />
                                            <div id="quantity_error" class="help-block with-errors text-danger">       </div>
                                        </div>
                                    </div>
                                    <div id="product_in_array" class="col-md-12">
 
                                    </div>
                                    <button type="button" class="btn btn-success mb-2 ml-3 mt-2" onclick="add()"><i
                                            class="las la-plus"></i> Add Product </button>
                                </div>
                                <div class="text-center">
                                    <button id="addCommand" type="submit " class="btn btn-primary mr-2">Update Order</button>
                                    <a type="reset" href="{{ route('Command.index') }}" class="btn btn-danger">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @push('scripts')
        <script src="{{ asset('js/add.js') }}"> </script>
        <script>      
            products= @json($products_commanded)  
            jQuery(document).on('click', "#addCommand", function(e) {
                e.preventDefault();
                if (products.length <= 0) {
                    data = {
                        product_id: product.value,
                        quantity: parseInt(quantity.value),
                    };
                    products = [...products, data];
                }
                $("#client_error").text('');
                $("#products_error").text('');
                $("#quantety_error").text('');
                let client = $('#client_id');
                $.ajax({
                    type: 'PUT',
                    url: " {{ route('Command.update',$result->id) }} ",
                    data: {
                        _token: "{{ csrf_token() }} ",
                        products: products,
                        client: client.find(":selected").val(),
                        ref: $("#ref").val()
                    },
                    success: function(data) {
                        products = [];
                        client.value = "";
                        renderDom();
                        $("#success").show();
                        $("#success").text(data.success);   
                        $(window).scrollTop(0); 
                    },
                    error: function(data) {
                        if (data.responseJSON.errors) {
                            $.each(data.responseJSON.errors, function(key, value) {
                                $("#" + key + "_error").text(value[0]);
                            })
                        }
                    }
                });
            })
            renderDom()
        </script>
        @endpush
     
    </div>
@endsection
