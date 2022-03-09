@extends('layouts.app')
@section('content')
@section('title')
    {{ __('client.list') }}
@endsection
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">{{ __('client.list') }}</h4>
                    </div>
                    @can('isAble', 'ClientController@create')
                        <a href="{{ route('Client.create') }}" class="btn btn-primary add-list"><i
                                class="fas fa-plus "></i>{{ __('public.add') }}</a>
                    @endcan
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">


                                <th>{{ __('public.fullName') }}</th>
                                <th>{{ __('public.email') }}</th>
                                <th>{{ __('public.tel') }}</th>
                                <th>{{ __('public.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @php($i = 1)
                            @foreach ($results as $result)
                                <tr>
                                    <td>{{ $result->fullName }}</td>
                                    <td>{{ $result->email }}</td>
                                    <td>{{ $result->tel }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle bg-primary  border-none"
                                                type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fas fa-cog"></i>
                                            </button>
                                            <div class="dropdown-menu refont-size "
                                                aria-labelledby="dropdownMenuButton">
                                                @can('isAble', 'ClientController@delete')
                                                    <a class="dropdown-item myLink" data-toggle="modal"
                                                        class="remove" data-target="#conformDelete">
                                                        <i class="far fa-trash-alt mr-1">
                                                        </i> {{ __('public.delete') }}
                                                        <form id="DeleteItem" class="dropdown-item"
                                                            action="{{ route('Client.destroy', $result->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method("DELETE")
                                                        </form>
                                                    </a>
                                                @endcan


                                                @can('isAble', 'ClientController@update')
                                                    <a class="dropdown-item"
                                                        href="{{ route('Client.edit', $result->id) }}">
                                                        <i class="far fa-edit mr-1"></i>{{ __('public.update') }} </a>
                                                @endcan
                                                @can('isAble', 'ClientController@show')
                                                    <a class="dropdown-item"
                                                        href="{{ route('Client.show', $result->id) }}">
                                                        <i class="fas fa-eye mr-1"></i> {{ __('public.show') }}</a>
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
    @include('components.alert')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}" />
    @endpush
    @push('scripts')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    @endpush
</div>
@endsection
