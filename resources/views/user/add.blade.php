@extends("layouts.app")
@section("content")
<div class="container-fluid">
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ __('user.add') }}</h4>
                            </div>
                            <a href="{{route('user.index')}}" class="btn btn-primary add-list"> {{__('user.list')}}</a>
                        </div>
                       
                        <div class="card-body">
                            <form action="{{ route('user.store') }}" method="POST" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('public.name') }} *</label>
                                            <input name="name" type="text" class="form-control" value="{{old('name') }}"  placeholder="{{ __('public.name') }}" />
                                            @error('name') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('public.email') }} *</label>
                                            <input name="email" type="text" class="form-control" value="{{old('email') }}"  placeholder="{{ __('public.email') }}" />
                                            @error('email') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label>{{ __('user.user_type') }}  * </label>
                                          <select name='type_id' class="selectpicker form-control" data-style="py-0">
                                              @foreach($types as $type)
                                              <option    {{ $type->id==1 ?? 'selected'}}   value="{{$type->id}}">{{$type->name}}</option>
                                              @endforeach
                                          </select>
                                          @error('type_id') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                      </div>
                                     </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('Password') }} *</label>
                                            <input name="password" type="text" class="form-control" value="{{old('password') }}"  placeholder="{{ __('Password') }}" />
                                            @error('password') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> {{__('public.password_confirmation') }} *</label>
                                            <input name="password_confirmation" type="text" class="form-control" value="{{old('password_confirmation') }}"  placeholder="{{__('public.password_confirmation') }}" />
                                            @error('password_confirmation') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">{{ __('public.add') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      @include('components.alert')
</div>
@stop




