@extends('layouts.app')
@section('content')
<div class="content-page">
<div class="card">
    <div class="card-header row">
        <h5 class="card-header-text  col-8 col-md-9 col-lg-10 ">Client Information</h5>
        <div class="d-flex align-items-center list-action col-4 col-md-3 col-lg-2">
            <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title=""
                data-original-title="Edit" href="{{ route('Client.edit', $result[0]->id) }}" data-placement="top"><i
                    class="ri-pencil-line mr-0"></i></a>
        </div>
    </div>
    <div class="card-block">
        <div class="view-info">
            <div class="row">
                <div class="col-lg-12">
                    <div class="general-info">
                        <div class="row">
                            <div class="col-lg-12 col-xl-6">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row">
                                                    {{__('public.name')}}
                                                </th>
                                                <td>{{ $result[0]->name}} </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    {{__('public.type')}}
                                                 </th>
                                                 <td>{{ $result[0]->type->name}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    {{__('public.created_at')}}
                                                </th>
                                                <td>{{ $result[0]->created_at }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    {{__('public.isDeleted')}}
                                                </th>
                                                <td>   @if ($result[0]->isDeleted == 0)
                                                    <span class="badge bg-warning mr-2">No</span>
                                                @else
                                                    <span class="badge bg-primary  mr-2">Yes</span>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end of row -->
                    </div>
                    <!-- end of general info -->
                </div>
                <!-- end of col-lg-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of view-info -->
    </div>
</div>
</div>

@endsection
