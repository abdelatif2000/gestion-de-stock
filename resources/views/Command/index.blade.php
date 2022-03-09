@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Order List</h4>
                    </div>
                    <a href="{{route('Command.create')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Order</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    @if(Session::has('success'))
                    <div class="alert alert-primary" role="alert">
                        <div class="iq-alert-text">{{Session::get('success')}}</div>
                    </div>
                    @endif
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
                                <th>Client</th> 
                                <th>Ref  </th>
                                <th> Total Product </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @php($i=1)
                            @foreach($results as $result)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>
                                   <a href="{{ route('Client.show', $result->client->id) }}"> {{$result->client ->firstName .'  '.$result->client->lastName }}</a> 
                                </td>
                                <td>{{$result->ref}}</td>
                                <td>{{$result->products_count}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="{{route('Command.show',$result->id)}}"><i class="ri-eye-line mr-0"></i></a>
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href=" {{route('Command.edit',$result->id)}}"><i class="ri-pencil-line mr-0"></i></a>
                                        <form action="{{route('Command.destroy',$result->id)}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></button>
                                        </form>
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
      <script>
                    function d(params) {
                             console.log($('#totalPay').val());
                    } 
      </script>
</div>
@endsection