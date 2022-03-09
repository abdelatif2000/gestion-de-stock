@extends('layouts.app')
@section('title')
{{__('client.update')}}
@endsection
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{__('client.update')}} </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('Client.update',$result->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('client.fullName')}} *</label>
                                        <input value="{{old('fullName') ? old('fullName') :  $result->fullName}}" name="fullName" type="text" class="form-control" placeholder="{{__('client.fullName')}}" />
                                        @error('fullName') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('client.email')}} </label>
                                        <input value="{{old('email') ? old('email') : $result->email}}" name="email" type="text" class="form-control" placeholder="{{__('client.email')}}" />
                                        @error('email') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('client.address')}}</label>
                                        <input value="{{old('address') ? old('address') : $result->address}}" name="address" type="text" class="form-control" placeholder="{{__('client.address')}} " />
                                        @error('address') <div class="help-block with-errors text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('client.tel')}} </label>
                                        <input value="{{old('tel') ? old('tel') : $result->tel}}" name="tel" type="text" class="form-control" placeholder="{{__('client.tel')}} " />
                                        @error('tel') <div class="help-block with-errors text-danger">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mr-2">  <i class="fas fa-plus"></i>{{__('public.update') }}</button>
                                 <a href="{{ route('Client.index') }}" type="reset" class="btn btn-danger">
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