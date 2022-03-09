@extends('layouts.app')
@section('title')
{{__('category.category_details_title')}}
@endsection
@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">{{  __('public.products') }} {{ $result->name  }}   </h4>
                    </div>
                    <a href="{{route('category.create')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>{{  __('category.category_add')}} </a>
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
                                <th> {{__('public.index')}} </th>
                                <th>   {{__('public.product') }} </th>
                                <th>  {{ __('public.action')}} </th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @php($i=1)
                            @foreach($result->products as $product)
                            <tr>
                                <td>
                                    <div class="checkbox d-inline-block">
                                        <input type="checkbox" class="checkbox-input" id="checkbox2">
                                        <label for="checkbox2" class="mb-0"></label>
                                    </div>
                                </td>
                                <td>{{$i++}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <div class="d-flex align-items-center list-action">
                                        <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="View"
                                            href="{{ route('product.show', $product->id) }}"><i
                                                class="ri-eye-line mr-0"></i></a>
                                        <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Edit"
                                            href=" {{ route('product.edit', $product->id) }}"><i
                                                class="ri-pencil-line mr-0"></i></a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button class="badge bg-warning mr-2" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Delete"
                                                href="#"><i class="ri-delete-bin-line mr-0"></i></button>
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
   @include('components.alert')
</div>    
        @endsection