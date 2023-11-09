@extends('layouts.app')

@section('content')
    <div class="container p-0">
        @include('shared.form-alerts')

        <form action="{{ !empty($seasonMaster->id) ? route('season-masters.update', ['season_master' => $seasonMaster]) : route('season-masters.store') }}" method="POST" class="mb-5" data-parsley-validate id="form-season-master">
            {{ $seasonMaster->id ? method_field('PUT') : method_field('POST') }}
            @csrf

            <div class="card">
                <div class="card-header">
                  Create Season Master
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-12 col-md-2">
                            <label for="js-season-name">Season Name</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <input id="js-season-name" name="season-name" type="text" placeholder="Season Name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12 col-md-2">
                            <label for="js-season-code">Season Code</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <input id="js-season-code" name="season-code" type="text" placeholder="Season Code" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-md-2">
                            <label for="js-from-period">From period</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <input id="js-from-period" name="from_period" type="text" class="form-control datatimepicker-enable" value="{{ $seasonMaster->from_period }}" autocomplete="off" placeholder="From Period"  data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-md-2">
                            <label for="js-to-period">To period</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <input id="js-to-period" name="to_period" type="text" class="form-control datatimepicker-enable" value="{{ $seasonMaster->to_period }}" autocomplete="off" placeholder="To Period"  data-parsley-required="true" data-parsley-trigger="change">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-md-2">
                            <label for="js-to-status">Status</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="d-flex">
                                <div class="form-check mt-2" style="margin-right: 1rem;">
                                    <input class="form-check-input" type="radio" name="status" id="status-active" value="active" 
                                    {{ $seasonMaster->status == 'active' ? 'checked' : ''}}  
                                    data-parsley-required="true" 
                                    data-parsley-required-message="Please choose status" 
                                    data-parsley-errors-container="#js-status-errors">
                                    <label class="form-check-label" for="status-active">Active</label>
                                </div>
                                <div class="form-check  mt-2">
                                    <input class="form-check-input" type="radio" name="status" id="status-inactive" value="inactive" 
                                    {{ $seasonMaster->status == 'inactive' ? 'checked' : ''}}  
                                    data-parsley-required="true" 
                                    data-parsley-required-message="Please choose status" 
                                    data-parsley-errors-container="#js-status-errors">
                                    <label class="form-check-label" for="status-inactive">Inactive</label>
                                </div>
                            </div>
                            <div id="js-status-errors"></div>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col-12 col-md-2">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </div>
              </div>
              
        </form>
    </div>
@endsection 

@section('style')

@endsection

@push('scripts')
    <script src="{{ asset('custom/js/jquery.datetimepicker.full.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.datatimepicker-enable').datetimepicker({
                format: 'Y-m-d',
        		datepicker: true,
                timepicker: false,
            });

            $('#js-from-period, #js-to-period').change(function () {
                $('#form-season-master').parsley().validate();
            })
        });
    </script>
@endpush