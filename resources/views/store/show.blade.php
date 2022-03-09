@extends('layouts.app')
@section('content')
    @if(!isset($result[0]->product->name)){
        <script>window.location = "{{route('Store.index')}}"</script>
    @endif
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                        <div>
                            <h4 class="mb-3">
                                {{ isset($result[0]->product->name) ? $result[0]->product->name."'s Providers" : ''}}
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive rounded mb-3">
                        @if (Session::has('success'))
                            <div class="alert alert-primary" role="alert">
                                <div class="iq-alert-text">{{ Session::get('success') }}</div>
                            </div>
                        @endif
                        <table class="data-table table mb-0 tbl-server-info">
                            <thead class="bg-white text-uppercase">
                                <tr class="ligth ligth-data">
                                    <th>Index</th>
                                    <th>LastName</th>
                                    <th>FirstName</th>
                                    <th>Quantity</th>
                                    <th>Return Product</th>
                                </tr>
                            </thead>
                            <tbody class="ligth-body">
                                @php($i = 1)
                                @foreach ($result as $result)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $result->provider->lastName }} </td>
                                        <td>{{ $result->provider->firstName }}</td>
                                        <td>{{ $result->quantity }}</td>
                                        <td>
                                            <form action="{{ route('Store.return', $result->id) }} " method="POST">
                                                @csrf
                                                <button type='submit' class="btn btn-warning" value="Return">Return</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
