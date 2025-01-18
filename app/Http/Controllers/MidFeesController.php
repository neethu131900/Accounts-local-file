<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MidFees;
use App\Models\FormatType;
use App\Models\FeesType;
use App\Models\TimeZone;
use App\Models\Currency;
use App\Models\MidList;
use Spatie\Permission\Models\Permission;
use App\Imports\ImportData;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use  App\Models\MidfeesExcelUpload;

class MidFeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view midfees', ['only' => ['index']]);
        $this->middleware('permission:create midfees', ['only' => ['create', 'store']]);
        $this->middleware('permission:update midfees', ['only' => ['update', 'edit']]);
        //$this->middleware('permission:delete midfees', ['only' => ['destroy']]);
    }

    public function index()
    {
        $MidFees = MidFees::get();
        return view('mid_fees.index', ['midfees' => $MidFees]);
    }

    public function create()
    {
        $FormatType = FormatType::where('status', '=', 1)->get();
        $FeesType = FeesType::where('status', '=', 1)->get();
        $TimeZone = TimeZone::all();
        $Currency = Currency::all();
        $MidList = MidList::where('status', '=', 1)->get();

        return view('mid_fees.create', ['formatType' => $FormatType, 'feesType' => $FeesType, 'timeZone' => $TimeZone, 'currency' => $Currency, 'midList' => $MidList]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'mid_list_id' => 'required',
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
            'timezone' => 'required',
            'created_date' => 'created_date'
        ]);

        try {
            $MidFees = new MidFees();
            $MidFees->mid_list_id = $request->mid_list_id;
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
            $MidFees->created_date = time();
            $MidFees->save();


            return redirect('/midfees')->with(['message' => 'Mid Fees added successfully!', 'status' => 'success']);
        } catch (\Exception $e) {

            return redirect('/midfees')->with(['error' => 'Something went wrong!' . $e->getMessage(), 'status' => 'error']);
        }
    }


    public function edit($roleId)
    {
        $data = MidFees::find($roleId);

        $FormatType = FormatType::where('status', '=', 1)->get();
        $FeesType = FeesType::where('status', '=', 1)->get();
        $TimeZone = TimeZone::all();
        $Currency = Currency::all();
        $MidList = MidList::where('status', '=', 1)->get();

        return view('mid_fees.edit', [
            'MidFees' => $data,
            'formatType' => $FormatType,
            'feesType' => $FeesType,
            'timeZone' => $TimeZone,
            'currency' => $Currency,
            'midList' => $MidList
        ]);
    }

    public function update(Request $request, $midfees)
    {
        $request->validate([
            'mid_list_id' => 'required',
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
            'timezone' => 'required',
            'created_date' => 'created_date'
        ]);

        try {

            $MidFees = MidFees::find($midfees);
            $MidFees->mid_list_id = $request->mid_list_id;
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

            return redirect('/midfees')->with(['message' => 'Mid fees updated successfully!', 'status' => 'success']);
        } catch (\Exception $e) {

            return redirect('/midfees')->with(['error' => 'Something went wrong!' . $e->getMessage(), 'status' => 'error']);
        }
    }


    public function destroy($roleId)
    {
        $MidFees = MidFees::find($roleId);
        $MidFees->delete();
        return redirect('midfees')->with(['info' => 'Mid Fees Deleted Successfully', 'status' => 'success']);
    }

    public function upload($roleId)
    {
        return view('mid_fees.upload_excel', [
            'roleId' => $roleId
        ]);
    }

    public function uploadexcel(Request $request, $rowId)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv',
        ]);
        $MidFees = MidFees::find($rowId);

        /* data read & write in db */
        $data = [
            'rowId' => $rowId,
            'table' => $MidFees->getFormatType->table_name,
        ];

        Excel::import(new ImportData($data), request()->file('excel_file'));


        $file = $request->file('excel_file');
        $imageName = time() . '.' . $file->extension();
        $file->move(public_path('uploads/data'), $imageName);

        try {
            $upload = new MidfeesExcelUpload();
            $upload->midfees_id = $rowId;
            $upload->excel_file = $imageName;
            $upload->save();

            return redirect('/midfees')->with(['message' => 'Excel upload successfully!', 'status' => 'success']);
        } catch (\Exception $e) {

            return redirect('/midfees')->with(['error' => 'Something went wrong!' . $e->getMessage(), 'status' => 'error']);
        }
    }
}
