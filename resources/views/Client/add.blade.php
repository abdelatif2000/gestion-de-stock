@extends('layouts.app')
@section('title')
{{__('client.add')}}
@endsection
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{__('client.add')}}</h4>
                            </div>
                        </div>
                            <div class="card-body">
                                <form action="{{ route('Client.store') }}" method="POST" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('public.fullName')}} *</label>
                                                <input name="fullName" value="{{ old('fullName') }}" type="text"
                                                    class="form-control" placeholder="{{__('public.fullName')}}" />
                                                @error('fullName')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                               
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('public.email')}} *</label>
                                                <input name="{{__('public.email')}}" type="text" value="{{old('email')}}"
                                                    class="form-control" placeholder="{{__('public.email')}} " />
                                                @error('email')')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>{{__('public.address')}}</label>
                                                <input name="{{__('public.address')}}" type="text" value="{{ old('address') }}"
                                                    class="form-control" placeholder="{{__('public.address')}} " />
                                                @error('address')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> {{__('public.tel')}} *</label>
                                                <input name="{{__('public.tel')}}" value="{{ old('tel') }}" type="number"
                                                    class="form-control" placeholder="{{__('public.tel')}} " />
                                                @error('tel')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mr-2">  <i class="fas fa-plus"></i>{{__('public.add') }}</button>
                                         <a href="{{ route('Client.index') }}" type="reset" class="btn btn-danger">
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
