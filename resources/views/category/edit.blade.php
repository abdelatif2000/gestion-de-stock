@extends('layouts.app')
@section('title')
{{ __('category.category_update') }}
@endsection
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ __('category.category_update') }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update',$result->id)}}"  method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('category.name')}} *</label>
                                        <input name="name" type="text" class="form-control" value="{{old('name') ? old('name') : $result->name}}" placeholder="Enter Name" />
                                        @error('name') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{__('public.description')}} </label>
                                        <textarea name="description" class="form-control" rows="4" placeholder="{{__('public.description')}}"> {{old('name') ? old('name') :$result->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mr-2">  <i class="fas fa-plus"></i>{{__('public.add') }}</button>
                                 <a href="{{ route('category.index') }}" type="reset" class="btn btn-danger">
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