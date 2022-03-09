@extends('layouts.app')
@section('title')
    {{ __('product.product_add') }}
@endsection
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ __('product.product_add') }} </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('product.QR') }} *</label>
                                            <input name="QR" type="text" class="form-control" value="{{ old('QR') }}"
                                                placeholder="Enter Product Name" />
                                            @error('QR')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('product.product_name') }} *</label>
                                            <input name="name" type="text" class="form-control"
                                                placeholder="Enter Product Name" value="{{ old('name') }}" />

                                            @error('name')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('category.category') }} </label>
                                            <select name='category_id' class="selectpicker form-control" data-style="py-0">
                                                <option value="">{{ __('category.select_category') }} </option>
                                                @foreach ($categories as $category)
                                                    @if (old('category_id') == $category->id)
                                                        <option value="{{ $category->id }}" selected>
                                                            {{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('product.price') }} *</label>
                                            <input name="price" type="number" class="form-control"
                                                placeholder="Enter Price " value="{{ old('price') }}" />
                                            @error('price')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('product.size') }}</label>
                                            <input name="size" type="text" class="form-control" placeholder="Enter size "
                                                value="{{ old('size') }}" />
                                            @error('size')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('product.alert') }} *</label>
                                            <input name="alert" type="number" class="form-control"
                                                placeholder="Enter Alert " value="{{ old('alert') }}" />
                                            @error('alert')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center" >
                                    <button  type="submit"  class="btn btn-primary mr-2 ">
                                        <i class="fas fa-plus"></i>{{__('public.add')}}
                                    </button>
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
