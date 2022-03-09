@extends('layouts.app')
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3"> List Product Stocked</h4>
                    </div>
                    @can('isAble','StoreController@create')
                    <a href="{{route('Store.create')}}" 
                    class="btn btn-primary add-list">
                    <i class="las la-plus mr-3"></i>Add Product
                   </a>
                  @endcan
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
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Alert</th>
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
                                <td>{{$result->product->name}}</td>
                                <td>{{$result->total_product}}</td>
                                <td>{{$result->product->alert}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        @can('isAble','StoreController@show')
                                        <a class="badge badge-info mr-2" data-toggle="tooltip"
                                         data-placement="top" title="" data-original-title="View"
                                         href="{{route('Store.show',$result->product_id)}}">
                                         <i class="ri-eye-line mr-0"></i>
                                        </a>
                                        @endcan
                                        @can('isAble','StoreController@update')
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                         title="" data-original-title="Edit" href=" {{route('Store.edit',$result->id)}}">
                                         <i class="ri-pencil-line mr-0"></i>
                                        </a>
                                        @endcan
                                        @can('isAble','StoreController@delete')
                                        <form action="{{route('Store.destroy',$result->id)}}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></button>
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
    @include('components.alert')
</div>
@endsection