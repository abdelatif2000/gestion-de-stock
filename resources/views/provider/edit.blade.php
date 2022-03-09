@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Provider</h4>
                        </div>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-primary" role="alert">
                        <div class="iq-alert-text">{{Session::get('success')}}</div>
                    </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('provider.update',$result->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name *</label>
                                        <input value="{{$result->firstName}}" name="firstName" type="text" class="form-control" placeholder="Enter Fist Name" />
                                        @error('firstName') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name * </label>
                                        <input value="{{$result->lastName}}" name="lastName" type="text" class="form-control" placeholder="Enter Last Name" />
                                        @error('lastName') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input value="{{$result->email}}" name="email" type="text" class="form-control" placeholder="Enter email " />
                                        @error('email') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input value="{{$result->address}}" name="address" type="text" class="form-control" placeholder="Enter address " />
                                        @error('address') <div class="help-block with-errors text-danger">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tel *</label>
                                        <input value="{{$result->tel}}" name="tel" type="text" class="form-control" placeholder="Enter tel " />
                                        @error('tel') <div class="help-block with-errors text-danger">{{$message}}</div>@enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fix </label>
                                        <input value="{{$result->fix}}" name="fix" type="text" class="form-control" placeholder="Enter fix " />
                                        @error('fix') <div class="help-block with-errors text-danger">{{$message}}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">update Provider</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection