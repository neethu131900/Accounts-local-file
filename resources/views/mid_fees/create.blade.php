<x-app-layout>

    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Fees Create</h3>
        </div>

        <!-- /.card-header -->
        <form action="/savemidfees" method="POST">
            @csrf
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mid Name</label>
                            <select class="form-control @if($errors->has('mid_list_id')) is-invalid @endif" name="mid_list_id" id="mid_list_id" style="width: 100%;">
                                <option value="">Select Mid</option>
                                @foreach ($midList as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mid_list_id'))
                            <p class="invalid-feedback">{{ $errors->first('mid_list_id') }}</p>
                            @endif

                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Transaction Fees </label>
                            <input type="text" class="form-control @if($errors->has('transaction_fee')) is-invalid @endif" id="transaction_fee" name="transaction_fee" value="{{ old('transaction_fee') }}">
                            @if($errors->has('transaction_fee'))
                            <p class="invalid-feedback">{{ $errors->first('transaction_fee') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Time Zone</label>
                            <select class="form-control @if($errors->has('timezone')) is-invalid @endif" name="timezone" id="timezone" style="width: 100%;">
                                <option value="">Choose Time Zone</option>
                                @foreach ($timeZone as $value)
                                <option value="{{ $value->utc_offset }}">{{ $value->time_zone }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('timezone'))
                            <p class="invalid-feedback">{{ $errors->first('timezone') }}</p>
                            @endif
                        </div>


                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Format Type</label>
                            <select class="form-control @if($errors->has('format_type_id')) is-invalid @endif" name="format_type_id" id="format_type_id" style="width: 100%;">
                                <option value="">Choose Format Type</option>
                                @foreach ($formatType as $value)
                                <option value="{{ $value->id }}">{{ $value->type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('format_type_id'))
                            <p class="invalid-feedback">{{ $errors->first('format_type_id') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-12 col-lg-4 col-md-4">
                                    <label>Settlement Currency </label>

                                    <select class="form-control @if($errors->has('settlement_currency')) is-invalid @endif" name="settlement_currency" id="settlement_currency" style="width: 100%;">
                                        <option value="">Select currency</option>
                                        @foreach ($currency as $value)
                                        <option value="{{ $value->code }}">{{ $value->code }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('settlement_currency'))
                                    <p class="invalid-feedback">{{ $errors->first('settlement_currency') }}</p>
                                    @endif

                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <label>Settlement Fees</label>
                                    <input type="text" class="form-control @if($errors->has('settlement_fee')) is-invalid @endif" id="settlement_fee" name="settlement_fee" value="{{ old('settlement_fee') }}">
                                    @if($errors->has('settlement_fee'))
                                    <p class="invalid-feedback">{{ $errors->first('settlement_fee') }}</p>
                                    @endif
                                </div>
                                <div class="col-12 col-lg-4 col-md-4">
                                    <label>Type</label>

                                    <select class="form-control @if($errors->has('settlement_fee_type')) is-invalid @endif" name="settlement_fee_type" id="settlement_fee_type" style="width: 100%;">

                                        @foreach ($feesType as $value)
                                        <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                        @endforeach
                                    </select>

                                    @if($errors->has('settlement_fee_type'))
                                    <p class="invalid-feedback">{{ $errors->first('settlement_fee_type') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="card card-info mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Account Fees</h3>
                    </div>

                    <div class="row">
                        <div class="col-12 row-style">
                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Tax</label>
                                        <input type="text" class="form-control @if($errors->has('tax')) is-invalid @endif" id="tax" name="tax" value="{{ old('tax') }}">
                                        @if($errors->has('tax'))
                                        <p class="invalid-feedback">{{ $errors->first('tax') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>

                                        <select class="form-control @if($errors->has('tax_type')) is-invalid @endif" name="tax_type" id="tax_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('tax_type'))
                                        <p class="invalid-feedback">{{ $errors->first('tax_type') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Refund Fees</label>
                                        <input type="text" class="form-control @if($errors->has('refund_fee')) is-invalid @endif" id="refund_fee" name="refund_fee" value="{{ old('refund_fee') }}">
                                        @if($errors->has('refund_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('refund_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>

                                        <select class="form-control @if($errors->has('refund_fee_type')) is-invalid @endif" name="refund_fee_type" id="refund_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('refund_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('refund_fee_type') }}</p>
                                        @endif
                                    </div>

                                </div>
                            </div>


                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Pre arbitration Fee</label>
                                        <input type="text" class="form-control @if($errors->has('pre_arbitration_fee')) is-invalid @endif" id="pre_arbitration_fee" name="pre_arbitration_fee" value="{{ old('pre_arbitration_fee') }}">
                                        @if($errors->has('pre_arbitration_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('pre_arbitration_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>

                                        <select class="form-control @if($errors->has('pre_arbitration_type')) is-invalid @endif" name="pre_arbitration_type" id="pre_arbitration_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('pre_arbitration_type'))
                                        <p class="invalid-feedback">{{ $errors->first('pre_arbitration_type') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Retrievals Fee</label>
                                        <input type="text" class="form-control @if($errors->has('retrievals_fee')) is-invalid @endif" id="retrievals_fee" name="retrievals_fee" value="{{ old('retrievals_fee') }}">
                                        @if($errors->has('retrievals_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('retrievals_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('retrievals_type')) is-invalid @endif" name="retrievals_type" id="retrievals_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>

                                        @if($errors->has('retrievals_type'))
                                        <p class="invalid-feedback">{{ $errors->first('retrievals_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Mirco Mdr</label>
                                        <input type="text" class="form-control @if($errors->has('mirco_mdr')) is-invalid @endif" id="mirco_mdr" name="mirco_mdr" value="{{ old('mirco_mdr') }}">
                                        @if($errors->has('mirco_mdr'))
                                        <p class="invalid-feedback">{{ $errors->first('mirco_mdr') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('mirco_mdr_type')) is-invalid @endif" name="mirco_mdr_type" id="mirco_mdr_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('mirco_mdr_type'))
                                        <p class="invalid-feedback">{{ $errors->first('mirco_mdr_type') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Monthly Fee</label>
                                        <input type="text" class="form-control @if($errors->has('monthly_fee')) is-invalid @endif" id="monthly_fee" name="monthly_fee" value="{{ old('monthly_fee') }}">
                                        @if($errors->has('monthly_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('monthly_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('monthly_fee_type')) is-invalid @endif" name="monthly_fee_type" id="monthly_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('monthly_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('monthly_fee_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Fraud Monitoring Fee</label>
                                        <input type="text" class="form-control @if($errors->has('fraud_monitoring_fee')) is-invalid @endif" id="fraud_monitoring_fee" name="fraud_monitoring_fee" value="{{ old('fraud_monitoring_fee') }}">
                                        @if($errors->has('fraud_monitoring_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('fraud_monitoring_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('fraud_monitoring_fee_type')) is-invalid @endif" name="fraud_monitoring_fee_type" id="fraud_monitoring_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('fraud_monitoring_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('fraud_monitoring_fee_type') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Authorisation Fees</label>
                                        <input type="text" class="form-control @if($errors->has('authorisation_fee')) is-invalid @endif" id="authorisation_fee" name="authorisation_fee" value="{{ old('authorisation_fee') }}">
                                        @if($errors->has('authorisation_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('authorisation_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('authorisation_fee_type')) is-invalid @endif" name="authorisation_fee_type" id="authorisation_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('authorisation_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('authorisation_fee_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Declined Fees</label>
                                        <input type="text" class="form-control @if($errors->has('declined_fee')) is-invalid @endif" id="declined_fee" name="declined_fee" value="{{ old('declined_fee') }}">
                                        @if($errors->has('declined_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('declined_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('declined_fee_type')) is-invalid @endif" name="declined_fee_type" id="declined_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('declined_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('declined_fee_type') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Chargeback Fees</label>
                                        <input type="text" class="form-control @if($errors->has('chargeback_fee')) is-invalid @endif" id="chargeback_fee" name="chargeback_fee" value="{{ old('chargeback_fee') }}">
                                        @if($errors->has('chargeback_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('chargeback_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('chargeback_fee_type')) is-invalid @endif" name="chargeback_fee_type" id="chargeback_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('chargeback_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('chargeback_fee_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Representment Fee</label>
                                        <input type="text" class="form-control @if($errors->has('representment_fee')) is-invalid @endif" id="representment_fee" name="representment_fee" value="{{ old('representment_fee') }}">
                                        @if($errors->has('representment_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('representment_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('representment_type')) is-invalid @endif" name="representment_type" id="representment_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('representment_type'))
                                        <p class="invalid-feedback">{{ $errors->first('representment_type') }}</p>
                                        @endif
                                    </div>

                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Mdr</label>
                                        <input type="text" class="form-control @if($errors->has('mdr')) is-invalid @endif" id="mdr" name="mdr" value="{{ old('mdr') }}">
                                        @if($errors->has('mdr'))
                                        <p class="invalid-feedback">{{ $errors->first('mdr') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('mdr_type')) is-invalid @endif" name="mdr_type" id="mdr_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('mdr_type'))
                                        <p class="invalid-feedback">{{ $errors->first('mdr_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Setup Fee</label>
                                        <input type="text" class="form-control @if($errors->has('setup_fee')) is-invalid @endif" id="setup_fee" name="setup_fee" value="{{ old('setup_fee') }}">
                                        @if($errors->has('setup_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('setup_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('setup_fee_type')) is-invalid @endif" name="setup_fee_type" id="setup_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('setup_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('setup_fee_type') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Annual Fee</label>
                                        <input type="text" class="form-control @if($errors->has('annual_fee')) is-invalid @endif" id="annual_fee" name="annual_fee" value="{{ old('annual_fee') }}">
                                        @if($errors->has('annual_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('annual_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('annual_fee_type')) is-invalid @endif" name="annual_fee_type" id="annual_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('annual_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('annual_fee_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-0">
                                <div class="row p-3 pb-4">
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Settlement Transfer Fee</label>
                                        <input type="text" class="form-control @if($errors->has('settlement_transfer_fee')) is-invalid @endif" id="settlement_transfer_fee" name="settlement_transfer_fee" value="{{ old('settlement_transfer_fee') }}">
                                        @if($errors->has('settlement_transfer_fee'))
                                        <p class="invalid-feedback">{{ $errors->first('settlement_transfer_fee') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-12 col-lg-3 col-md-3">
                                        <label>Type</label>
                                        <select class="form-control @if($errors->has('settlement_transfer_fee_type')) is-invalid @endif" name="settlement_transfer_fee_type" id="settlement_transfer_fee_type" style="width: 100%;">

                                            @foreach ($feesType as $value)
                                            <option value="{{ $value->type }}" {{ ($value->type =='amount')?'selected':'' }}>{{ $value->type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('settlement_transfer_fee_type'))
                                        <p class="invalid-feedback">{{ $errors->first('settlement_transfer_fee_type') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.row -->
            </div>

            <!-- /.card-body -->
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-info">Submit</button>
                <!-- <input type="submit" value="Add Mid" class="btn btn-primary"> -->
            </div>
        </form>
    </div>
</x-app-layout>

<style>
    .row-style .form-group:nth-child(odd) {
        background-color: #eee;
    }
</style>