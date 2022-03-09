@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product To  Store</h4>
                        </div>
                    <a href="{{route('Store.index')}}" class="btn btn-primary add-list">List Product</a>
                    </div>
                  
                    <div class="card-body">
                        <form action="{{route('Store.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product * </label>
                                        <select name='product' class="selectpicker form-control" data-style="py-0">
                                            <option value="" selected >Select Product</option>
                                            @foreach($products as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('product') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provider * </label>
                                        <select name='provider' class="selectpicker form-control" data-style="py-0">
                                            <option value="" selected >Select Provider</option>
                                            @foreach($providers as $provider)
                                            <option value="{{$provider->id}}">{{$provider->firstName.' '.$provider->lastName }}</option>
                                            @endforeach
                                        </select>
                                        @error('provider') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Quantity *</label>
                                        <input name="quantity" type="number" class="form-control" placeholder="Enter Quantity " />
                                        @error('quantity') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                              
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Add  Product</button>
                            <a href="{{route('Store.index')}}" type="reset" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.alert')
</div>
@endsection