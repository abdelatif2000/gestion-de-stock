@extends('layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}" />
@endpush
@section('title')
    {{ __('category.category_list') }}
@stop
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3 ">{{ __('category.category_list') }}</h4>
                        </div>
                        @can('isAble', 'CategoryController@create')
                            <a href="{{ route('category.create') }}" class="btn btn-primary add-list">
                                <i class="fas fa-plus mr-3"></i>{{ __('public.add') }}
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class=" rounded mb-3">
                        <table class="data-table table reponsive-table display  mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>{{ __('category.category') }}</th>
                                    <th>{{ __('public.description') }} </th>
                                    <th>{{ __('public.action') }} </th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->description }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle bg-primary  border-none"
                                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu refont-size "
                                                    aria-labelledby="dropdownMenuButton">
                                                    @can('isAble', 'CategoryController@delete')
                                                        <a href="#" class="dropdown-item myLink" data-toggle="modal"
                                                            data-target="#conformDelete{{$result->id}}">
                                                            <i class="far fa-trash-alt mr-1">
                                                            </i> {{ __('public.delete') }}
                                                        </a>
                                                       
                                                    @endcan
                                                    @can('isAble', 'CategoryController@update')
                                                        <a class="dropdown-item"
                                                            href="{{ route('category.edit', $result->id) }}">
                                                            <i class="far fa-edit mr-1"></i>{{ __('public.update') }} </a>
                                                    @endcan
                                                    @can('isAble', 'CategoryController@show')
                                                        <a class="dropdown-item"
                                                            href="{{ route('category.show', $result->id) }}">
                                                            <i class="fas fa-eye mr-1"></i> {{ __('public.show') }}</a>
                                                    @endcan
                                                   
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('components.conformDelete',['model' => 'category'])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('components.alert')
    </div>
    @push('scripts')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    @endpush
@endsection
