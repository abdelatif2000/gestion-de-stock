@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">{{__('user.list')}} </h4>
                    </div>
                    <a href="{{route('user.create')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i> {{__('user.add')}} </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsives rounded mb-3">
           
                    <table class="display table nowrap dt-responsive mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <td></td>
                                <th>{{ __('public.index') }}</th>
                                <th>{{ __('public.name') }} </th>
                                <th> {{ __('public.email') }}</th>
                                <th> {{ __('public.type') }} </th>
                                <th>{{ __('public.created_at') }}</th>
                                <th>{{ __('public.action') }} </th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @php($i=1)
                            @foreach($results as $result)
                            <tr>
                                <td></td>
                                <td>{{$i++}}</td>
                                <td>{{$result->name}}</td>
                                <td>{{$result->email}}</td>
                                <td>{{$result->type->name}}</td>
                                <td>{{$result->created_at}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle bg-primary  border-none" 
                                        type="button" id="dropdownMenuButton" 
                                        data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-cog"></i>
                                        </button>
                                        <div class="dropdown-menu refont-size " aria-labelledby="dropdownMenuButton">
                                                   <a class="dropdown-item myLink" 
                                                    onclick="document.getElementById('form-delete').submit();" >
                                                    <i class="far fa-trash-alt mr-1">
                                                       </i> {{__('public.delete')}} </a>
                                                  <form id="form-delete"  class="dropdown-item" action="{{route('user.destroy',$result->id)}}"  method="post">
                                                    @csrf
                                                    @method("DELETE")
                                                  </form>  
                                                  <a class="dropdown-item" href="{{route('user.edit',$result->id)}}"><i class="far fa-edit mr-1"></i>{{__('public.update')}} </a>
                                                  <a class="dropdown-item"  href="{{route('user.show',$result->id)}}" ><i class="fas fa-eye mr-1"></i> {{__('public.show')}}</a>
                                        </div>
                                       </div>
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  
    @include('components.alert')
       
</div>    
        @endsection