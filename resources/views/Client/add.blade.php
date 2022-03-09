@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{__('client.add_client')}}</h4>
                            </div>
                        </div>
                            <div class="card-body">
                                <form action="{{ route('Client.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label> First Name *</label>
                                                <input name="firstName" value="{{ old('firstName') }}" type="text"
                                                    class="form-control" placeholder="Enter Fist Name" />
                                                @error('firstName')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name * </label>
                                                <input name="lastName" value="{{ old('lastName') }}" type="text"
                                                    class="form-control" placeholder="Enter Last Name" />
                                                @error('lastName')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input name="email" type="text" value="{{ old('email') }}"
                                                    class="form-control" placeholder="Enter email " />
                                                @error('email')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text" value="{{ old('address') }}"
                                                    class="form-control" placeholder="Enter address " />
                                                @error('address')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tel *</label>
                                                <input name="tel" value="{{ old('tel') }}" type="text"
                                                    class="form-control" placeholder="Enter tel " />
                                                @error('tel')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fix </label>
                                                <input name="fix" value="{{ old('fix') }}" type="text"
                                                    class="form-control" placeholder="Enter fix " />
                                                @error('fix')
                                                    <div class="help-block with-errors text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">Add Client</button>
                                    <a href="{{ route('Client.index') }}" type="reset" class="btn btn-danger">Reset</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.alert')
        </div>
    @endsection
