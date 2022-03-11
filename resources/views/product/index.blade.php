@extends('layouts.app')
@section('title')
    {{ __('product.list') }}
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}" />
@endpush
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">{{ __('product.list') }}</h4>
                        </div>
                        @can('isAble', 'ProductController@create')
                            <a href="{{ route('product.create') }}" class="btn btn-primary add-list">
                                <i class="fas fa-plus mr-3"></i>{{ __('public.add') }}
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        <table class="data-table table reponsive-table display  mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>{{ __('product.QR') }}</th>
                                    <th>{{ __('product.product_name') }}</th>
                                    <th>{{ __('category.category') }}</th>
                                    <th>{{ __('public.price') }}</th>
                                    <th> {{ __('product.alert') }}</th>
                                    <th>{{ __('public.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @php($i = 1)
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->QR }}</td>
                                        <td>{{ $result->name }}</td>
                                        <td>
                                            @if (isset($result->category->name))
                                                {{ $result->category->name }}
                                            @else
                                                <div class="badge badge-success">{{ __('public.null') }}</div>
                                            @endif
                                        </td>
                                        <td>{{ $result->price }}</td>
                                        <td>{{ $result->alert }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle bg-primary  border-none"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu refont-size "
                                                    aria-labelledby="dropdownMenuButton">
                                                    @can('isAble', 'ProductController@delete')
                                                        <a class="dropdown-item myLink" 
                                                            data-toggle="modal"
                                                             class="remove"
                                                            data-target="#conformDelete"
                                                        >
                                                            <i class="far fa-trash-alt mr-1">
                                                            </i> {{ __('public.delete') }}
                                                            <form id="DeleteItem" class="dropdown-item"
                                                                action="{{route('product.destroy',$result->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method("DELETE")
                                                            </form>
                                                        </a>
                                                    @endcan
                                                    @can('isAble', 'ProductController@update')
                                                        <a class="dropdown-item"
                                                            href="{{ route('product.edit', $result->id) }}">
                                                            <i class="far fa-edit mr-1"></i>{{ __('public.update') }} </a>
                                                    @endcan
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
    @include('components.conformDelete')
    @include('components.alert')
    </div>
    @push('scripts')
        <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    @endpush
@endsection
