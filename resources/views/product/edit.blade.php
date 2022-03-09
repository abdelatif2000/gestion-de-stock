@extends('layouts.app')
@section('content')
@section('title')
    {{ __('product.product_edit_title') }}
@endsection
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ __('product.product_edit_title') }} </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $result->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('product.QR') }} *</label>
                                        <input value="{{old('QR') ? old('QR') : $result->QR }}" name="QR" type="text" class="form-control"
                                            placeholder="{{ __('product.QR') }}" />
                                        @error('QR')
                                            <div class="help-block with-errors text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('product.product_name') }} *</label>
                                        <input value="{{old('name') ? old('name') : $result->name }}" name="name" type="text"
                                            class="form-control" placeholder="{{ __('product.product_name') }}" />
                                        @error('name')
                                            <div class="help-block with-errors text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ __('category.category') }} </label>
                                        <select name='category_id' class="selectpicker form-control" data-style="py-0">
                                            <option value="">{{ __('category.select_category') }}</option>
                                            <option value="">{{ __('public.none') }}</option>
                                            @foreach ($categories as $category)
                                               <option value="{{$category->id}}"
                                                {{  old('category_id') && old('category_id')==$category->id ? "selected" :(
                                                 isset($result->category->id) && $result->category->id==$category->id ? "selected" :"" )}}
                                               >
                                                {{ $category->name }}
                                               </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="help-block with-errors text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('product.price') }} </label>
                                        <input value="{{ $result->price }}" name="price" type="text"
                                            class="form-control" placeholder="Enter Price " />
                                        @error('price')
                                            <div class="help-block with-errors text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ __('product.size') }}</label>
                                        <input value="{{ $result->size }}" name="size" type="text"
                                            class="form-control" placeholder="Enter size " />
                                        @error('size')
                                            <div class="help-block with-errors text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('product.alert') }} *</label>
                                        <input value="{{ $result->alert }}" name="alert" type="number"
                                            class="form-control" placeholder="Enter Alert " />
                                        @error('alert')
                                            <div class="help-block with-errors text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
</div>
@endsection
