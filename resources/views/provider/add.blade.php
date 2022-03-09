@extends('layouts.app')
@section('title')
{{__('provider.add')}}
@endsection
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{__('provider.add')}}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('provider.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("provider.ICE")}} *</label>
                                        <input name="ICE" type="text" value="{{old('ICE')}}" class="form-control" placeholder="{{__("provider.ICE")}}" />
                                        @error('ICE') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("public.fullName")}} *</label>
                                        <input name="fullName" type="text" value="{{old('fullName')}}" class="form-control" placeholder="{{__("public.fullName")}}" />
                                        @error('fullName') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("public.email")}}</label>
                                        <input name="email" type="text" value="{{old('email')}}" class="form-control" placeholder="{{__("public.email")}}" />
                                        @error('email') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("public.address")}}</label>
                                        <input name="address" value="{{old('address')}}" type="text" class="form-control" placeholder="{{__("public.address")}} " />
                                        @error('address') <div class="help-block with-errors text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__("public.tel")}}</label>
                                        <input name="tel" type="text" value="{{old('tel')}}" class="form-control" placeholder="{{__("public.tel")}} " />
                                        @error('tel') <div class="help-block with-errors text-danger">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mr-2">  <i class="fas fa-plus"></i>{{__('public.add') }}</button>
                                 <a href="{{ route('provider.index') }}" type="reset" class="btn btn-danger">
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