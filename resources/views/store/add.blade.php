@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{__('public.add')}} </h4>
                        </div>
                    </div>
                  
                    <div class="card-body">
                        <form action="{{route('Store.store')}}" method="POST">
                            @csrf
                            <div class="row">
                               
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('provider.provider')}} * </label>
                                        <select name='product_id' class="selectpicker form-control" data-style="py-0">
                                            <option value="">{{ __('product.select_product') }} </option>
                                            @foreach ($providers as $provider)
                                                @if (old('provider_id') == $provider->id)
                                                    <option value="{{$provider->id }}" selected>
                                                        {{ $provider->fullName }}</option>
                                                @else
                                                    <option value="{{ $provider->id }}">{{ $provider->fullName }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('provider_id') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Facture N° *</label>
                                        <input name="quantity" type="number" class="form-control" placeholder="00.00 " />
                                        @error('quantity') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date *</label>
                                        <input name="quantity" type="number" class="form-control" placeholder="00.00 " />
                                        @error('quantity') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('product.product_name')}} * </label>
                                        <select name='product_id' class="selectpicker form-control" data-style="py-0">
                                            <option value="">{{ __('product.select_product') }} </option>
                                            @foreach ($products as $product)
                                                @if (old('product_id') == $product->id)
                                                    <option value="{{$product->id }}" selected>
                                                        {{ $product->name }}</option>
                                                @else
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('product_id') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{__('public.quantity')}} *</label>
                                        <input name="quantity" type="number" class="form-control" placeholder="00.00 " />
                                        @error('quantity') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PU HT *</label>
                                        <input name="quantity" type="number" class="form-control" placeholder="00.00 " />
                                        @error('quantity') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total HT *</label>
                                        <input name="quantity" type="number" class="form-control" placeholder="00.00 " />
                                        @error('quantity') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <button  type="submit" class="btn btn-primary ">  <i class="fas fa-plus"></i>Nouvelle medecamente </button>
                                </div>
                            </div>
                            {{-- start of DataTable : --}}
                            <div class="table-responsive rounded mb-3 col-md-12">
                                <table class="data-table table reponsive-table display  mb-0 tbl-server-info">
                                    <thead class="bg-white text-uppercase">
                                        <tr class="ligth ligth-data">
                                            <th>{{ __('product.product_name') }}</th>
                                            <th>{{ __('public.quantity') }}</th>
                                            <th>PU HT</th>
                                            <th>Total HT</th>
                                        </tr>
                                    </thead>
                                    <tbody class="ligth-body">
                                         
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mr-2">  <i class="fas fa-plus"></i>{{__('public.add') }}</button>
                                 <a href="{{ route('product.index') }}" type="reset" class="btn btn-danger">
                                    <i class="fas fa-arrow-left"></i> {{__('public.reset')}} </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.alert')
</div>
@endsection