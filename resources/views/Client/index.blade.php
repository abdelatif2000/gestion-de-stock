@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Client List</h4>
                    </div>
                    @can('isAble','ClientController@create') <a href="{{route('Client.create')}}" 
                    class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Client</a>@endcan
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>
                                    <div class="checkbox d-inline-block">
                                        <input type="checkbox" class="checkbox-input" id="checkbox1">
                                        <label for="checkbox1" class="mb-0"></label>
                                    </div>
                                </th>
                                <th>Index</th>
                                <th>first Name </th>
                                <th>last Name</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @php($i=1)
                            @foreach($results as $result)
                            <tr>
                                <td>
                                    <div class="checkbox d-inline-block">
                                        <input type="checkbox" class="checkbox-input" id="checkbox2">
                                        <label for="checkbox2" class="mb-0"></label>
                                    </div>
                                </td>
                                <td>{{$i++}}</td>
                                <td>{{$result->firstName}}</td>
                                <td>{{$result->lastName}}</td>
                                <td>{{$result->email}}</td>
                                <td>{{$result->tel}}</td>
                                <td>
                                  <div class="d-flex align-items-center list-action">
                                    @can('isAble','ClientController@show')  <a  class="badge bg-success mr-2" data-toggle="tooltip"
                                      data-placement="top" title="" data-original-title="View"
                                       href="{{route('Client.show',$result->id)}}"><i class="ri-eye-line mr-0"></i></a>
                                  @endcan
                                  @can('isAble','ClientController@update')
                                        <a  class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" 
                                        title="" data-original-title="Edit" 
                                        href="{{route('Client.edit',$result->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                  @endcan    
                                  @can('isAble','ClientController@delete')
                                        <form action="{{route('Client.destroy',$result->id)}}"  method="POST">
                                            @csrf
                                            @method("DELETE")
                                        <button class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" ><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
                                  @endcan      
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
    @if(Session::has('success'))
    <div onLoad="fideOut()" class="alert bg-success" role="alert">
        <div class="iq-alert-text text-white"><i class="fas fa-check-circle"></i> {{Session::get("success")}} </div>
    </div>
    <script> setTimeout(function(){
        $("div.alert").fadeOut('easy');
        }, 3500 );</script>
@endif
</div>    
        @endsection