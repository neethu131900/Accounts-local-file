<?php

namespace App\Http\Controllers;


use App\Models\MidFees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FormatType;
use App\Models\FeesType;
use App\Models\TimeZone;
use App\Models\Currency;


class MidController extends Controller
{
    public function index()
    {
        // $roles = Mid::get();
        // return view('mid_fees.index', ['roles' => $roles]);
    }

    public function create()
    {
        $FormatType = FormatType::where('status', '=', 1)->get();
        $FeesType = FeesType::where('status', '=', 1)->get();
        $TimeZone = TimeZone::all();
        $Currency = Currency::all();

        return view('mid_fees.create', ['formatType' => $FormatType, 'feesType' => $FeesType, 'timeZone' => $TimeZone, 'currency' => $Currency]);
    }

    public function store(Request $request)
    {

        //  $MidFees = Midfees::findOrfail(1);

        $request->validate([
            'name' => 'required|unique:mid_fees',
            'ecom_folderids' => 'required',
            'format_type_id' => 'required',
            'settlement_currency' => 'required',
            'settlement_fee' => 'required|numeric',
            'settlement_fee_type' => 'required',
            'transaction_fee' => 'required|numeric',
            'tax' => 'required|numeric',
            'tax_type' => 'required',
            'declined_fee' => 'required|numeric',
            'declined_fee_type' => 'required',
            'refund_fee' => 'required|numeric',
            'refund_fee_type' => 'required',
            'chargeback_fee' => 'required|numeric',
            'chargeback_fee_type' => 'required',
            'pre_arbitration_fee' => 'required|numeric',
            'pre_arbitration_type' => 'required',
            'representment_fee' => 'required|numeric',
            'representment_type' => 'required',
            'retrievals_fee' => 'required|numeric',
            'retrievals_type' => 'required',
            'mdr' => 'required|numeric',
            'mdr_type' => 'required',
            'mirco_mdr' => 'required|numeric',
            'mirco_mdr_type' => 'required',
            'setup_fee' => 'required|numeric',
            'setup_fee_type' => 'required',
            'monthly_fee' => 'required|numeric',
            'monthly_fee_type' => 'required',
            'annual_fee' => 'required|numeric',
            'annual_fee_type' => 'required',
            'fraud_monitoring_fee' => 'required|numeric',
            'fraud_monitoring_fee_type' => 'required',
            'settlement_transfer_fee' => 'required|numeric',
            'settlement_transfer_fee_type' => 'required',
            'authorisation_fee' => 'required|numeric',
            'authorisation_fee_type' => 'required',
            'timezone' => 'required'
        ]);

        // Retrieve errors message bag
        // $errors = $request->errors();
        // $errors = $validate->errors();
        // echo "<pre>";
        // print_r($errors->all());
        // exit();



        $MidFees = new MidFees();
        $MidFees->name = $request->name;
        $MidFees->ecom_folderids = $request->ecom_folderids;
        $MidFees->format_type_id = $request->format_type_id;
        $MidFees->settlement_currency = $request->settlement_currency;
        $MidFees->settlement_fee = $request->settlement_fee;
        $MidFees->settlement_fee_type = $request->settlement_fee_type;
        $MidFees->transaction_fee = $request->transaction_fee;
        $MidFees->tax = $request->tax;
        $MidFees->tax_type = $request->tax_type;
        $MidFees->declined_fee = $request->declined_fee;
        $MidFees->declined_fee_type = $request->declined_fee_type;
        $MidFees->refund_fee = $request->refund_fee;
        $MidFees->refund_fee_type = $request->refund_fee_type;
        $MidFees->chargeback_fee = $request->chargeback_fee;
        $MidFees->chargeback_fee_type = $request->chargeback_fee_type;
        $MidFees->pre_arbitration_fee = $request->pre_arbitration_fee;
        $MidFees->pre_arbitration_type = $request->pre_arbitration_type;
        $MidFees->representment_fee = $request->representment_fee;
        $MidFees->representment_type = $request->representment_type;
        $MidFees->retrievals_fee = $request->retrievals_fee;
        $MidFees->retrievals_type = $request->retrievals_type;
        $MidFees->mdr = $request->mdr;
        $MidFees->mdr_type = $request->mdr_type;
        $MidFees->mirco_mdr = $request->mirco_mdr;
        $MidFees->mirco_mdr_type = $request->mirco_mdr_type;
        $MidFees->setup_fee = $request->setup_fee;
        $MidFees->setup_fee_type = $request->setup_fee_type;
        $MidFees->monthly_fee = $request->monthly_fee;
        $MidFees->monthly_fee_type = $request->monthly_fee_type;
        $MidFees->annual_fee = $request->annual_fee;
        $MidFees->annual_fee_type = $request->annual_fee_type;
        $MidFees->fraud_monitoring_fee = $request->fraud_monitoring_fee;
        $MidFees->fraud_monitoring_fee_type = $request->fraud_monitoring_fee_type;
        $MidFees->settlement_transfer_fee = $request->settlement_transfer_fee;
        $MidFees->settlement_transfer_fee_type = $request->settlement_transfer_fee_type;
        $MidFees->authorisation_fee = $request->authorisation_fee;
        $MidFees->authorisation_fee_type = $request->authorisation_fee_type;
        $MidFees->timezone = $request->timezone;
        $MidFees->save();


        return redirect('/mid-create')->with(['message' => 'Mid added successfully!', 'status' => 'success']);
    }
}
