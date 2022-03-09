@extends("layouts.app")
@section("content")
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
                  @if(Session::has('success'))
                  <div class="alert alert-primary" role="alert">
                      <div class="iq-alert-text">{{Session::get('success')}}</div>
                  </div>
                  @endif
                  <div class="card-body">
                      <form action="{{ route('user.update',$result->id) }}" method="POST" >
                        @method("PUT")
                        @csrf
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>{{ __('public.name') }} *</label>
                                      <input name="name" type="text" class="form-control" value="{{$result->name}} "  placeholder="{{ __('public.name') }}" />
                                      @error('name') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>{{ __('public.email') }} *</label>
                                      <input name="email" type="text" class="form-control" value="{{$result->email}}"  placeholder="{{ __('public.email') }}" />
                                      @error('email') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                  </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('user.user_type') }}  * </label>
                                    <select name='type_id' class="selectpicker form-control" data-style="py-0">
                                        @foreach($types as $type)
                                        <option    {{ $type->id == $result->type_id ?  'selected':"" }}   value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id') <div class="help-block with-errors text-danger">{{$message}}</div> @enderror
                                </div>
                               </div>
                          </div>
                          <button type="submit" class="btn btn-primary mr-2">{{ __('public.update') }}</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop
</body>
</html>