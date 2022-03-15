@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="container-fluid add-form-list">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">{{ __('public.add') }} </h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('Store.store') }}" id="products" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>{{ __('provider.provider') }} * </label>
                                            <select name='provider_id' class="selectpicker form-control" data-style="py-0">
                                                <option value="">{{ __('product.select_product') }} </option>
                                                @foreach ($providers as $provider)
                                                    @if (old('provider_id') == $provider->id)
                                                        <option value="{{ $provider->id }}" selected>
                                                            {{ $provider->fullName }}</option>
                                                    @else
                                                        <option value="{{ $provider->id }}">{{ $provider->fullName }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('provider_id')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('purchase.invoice_no') }} *</label>
                                            <input name="facture_no" type="text" class="form-control"
                                                placeholder="{{ __('purchase.invoice_no') }}" />
                                            @error('facture_no')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{ __('public.date') }} *</label>
                                            <input name="date" type="text" id="date" class="form-control"
                                                placeholder="jj/mm/aaaa">
                                            @error('date')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{ __('product.product_name') }} * </label>
                                            <select name='product_id' class="selectpicker form-control" data-style="py-0">
                                                <option value="">{{ __('product.select_product') }} </option>
                                                @foreach ($products as $product)
                                                    @if (old('product_id') == $product->id)
                                                        <option value="{{ $product->id }}" selected>
                                                            {{ $product->name }}</option>
                                                    @else
                                                        <option value="{{ $product->id }}">{{ $product->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{ __('public.quantity') }} *</label>
                                            <input name="quantity" type="number" class="form-control"
                                                placeholder="00.00 " />
                                            @error('quantity')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{ __('purchase.PU_HT') }} *</label>
                                            <input name="PU_HT" type="number" class="form-control" placeholder="00.00" />
                                            @error('PU_HT')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>{{ __('purchase.total_HT') }} *</label>
                                            <input name="total_HT" type="number" class="form-control"
                                                placeholder="00.00 " />
                                            @error('total_HT')
                                                <div class="help-block with-errors text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <button onclick="getValue()" type="button" class="btn btn-primary "> <i
                                                class="fas fa-plus"></i>{{ __('product.new') }} </button>
                                    </div>
                                </div>
                                {{-- start of DataTable : --}}
                                <div class="table-responsive rounded mb-3 col-md-12">
                                    <table class="data-table table reponsive-table display  mb-0 tbl-server-info">
                                        <thead class="bg-white text-uppercase">
                                            <tr class="ligth ligth-data">
                                                <th>{{ __('product.product_name') }}</th>
                                                <th>{{ __('public.quantity') }}</th>
                                                <th>{{ __('purchase.PU_HT') }}</th>
                                                <th>{{ __('purchase.total_HT') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableContent" class="ligth-body">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mr-2"> <i
                                            class="fas fa-plus"></i>{{ __('public.add') }}</button>
                                    <a href="{{ route('product.index') }}" type="reset" class="btn btn-danger">
                                        <i class="fas fa-arrow-left"></i> {{ __('public.reset') }} </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('components.alert')
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }} ">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script>
            $( function() {
             $("#date" ).datepicker({
                changeMonth: true,
                maxDate: "+1m +1w",
                // minDate: "-1m -1w",
                changeYear:true,
                monthNames: ["janvier", "février", "mars", "avril", "mai",
                        "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"
                ],
                monthNamesShort: ["anv", "févr", "mars", "avril", "mai", "juin", "juil", "août", "sept","oct", "nov", "déc"],
                dayNames: ["lundi", "mardi","mercredi", "jeudi","vendredi", "samedi",  "dimanche"],
                dayNamesShort: ["lundi", "mardi","mercredi", "jeudi","vendredi", "samedi",  "dimanche"],
                dayNamesMin: ["", "", "", "", "", "",
                    ""]
             });
           } );
         function getValue(){
            let formEl = document.forms.products;
            let formData = new FormData(formEl);
            let name = formData.get('provider_id');
            let provider_id = formData.get('provider_id');
            
           
         }  
       
        </script>
    @endpush
@endsection
