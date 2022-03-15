@extends('layouts.app')
@section('title')
    {{ __('provider.provider_list') }}
@stop
@section('content')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">{{ __('provider.provider_list') }}</h4>
                        </div>
                        @can('isAble', 'ProviderController@create')
                            <a href="{{ route('provider.create') }}" class="btn btn-primary add-list">
                                <i class="fas fa-plus mr-3"></i>{{ __('public.add') }}
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>{{ __('provider.ICE') }} </th>
                                    <th>{{ __('public.fullName') }} </th>
                                    <th>{{ __('public.email') }} </th>
                                    <th>{{ __('public.tel') }}</th>
                                    <th>{{ __('public.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @foreach ($results as $result)
                                    <tr>
                                        <td>{{ $result->ICE }} </td>
                                        <td>{{ $result->fullName }} </td>
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
                                                    @can('isAble', 'ProviderController@delete')
                                                        <a class="dropdown-item myLink" data-toggle="modal"
                                                            data-target="#conformDelete{{$result->id}}">
                                                            <i class="far fa-trash-alt mr-1">
                                                            </i> {{ __('public.delete') }}
                                                        </a>
                                                    @endcan
                                                    @can('isAble', 'ProviderController@update')
                                                        <a class="dropdown-item"
                                                            href="{{ route('provider.edit', $result->id) }}">
                                                            <i class="far fa-edit mr-1"></i>{{ __('public.update') }} </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('components.conformDelete',['model' => 'provider'])
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
