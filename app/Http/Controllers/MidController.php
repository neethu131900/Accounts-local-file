<?php

namespace App\Http\Controllers;


use App\Models\MidList;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class MidController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view mid', ['only' => ['index']]);
        $this->middleware('permission:create mid', ['only' => ['create', 'store']]);
        $this->middleware('permission:update mid', ['only' => ['update', 'edit']]);
        //$this->middleware('permission:delete mid', ['only' => ['destroy']]);
    }

    public function index()
    {
        $midlist = MidList::get();
        return view('mid_list.index', ['midlist' => $midlist]);
    }

    public function create()
    {
        return view('mid_list.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:mid_lists',
            'ecom_folderids' => 'required',
            'status' => 'required'
        ]);

        try {

            $MidList = new MidList();
            $MidList->name = $request->name;
            $MidList->ecom_folderids = json_encode($request->ecom_folderids);
            $MidList->status = $request->status;
            $MidList->save();
            return redirect('/mid')->with(['message' => 'Mid added successfully!', 'status' => 'success']);
        } catch (\Exception $e) {

            return redirect('/mid')->with(['error' => 'Something went wrong!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    public function edit($MidList)
    {
        $data = MidList::find($MidList);
        $selected = array();
        foreach (json_decode($data->ecom_folderids) as $key => $value) {
            array_push($selected, ($value));
        }
        return view('mid_list.edit', [
            'MidList' => $data,
            'selected' => $selected
        ]);
    }

    public function update(Request $request, $midlist)
    {
        $request->validate([
            'name' =>  'required|unique:mid_lists,name,' . $midlist,
            'ecom_folderids' => 'required',
            'status' => 'required'
        ]);

        try {

            $MidList = MidList::find($midlist);
            $MidList->name = $request->name;
            $MidList->ecom_folderids = json_encode($request->ecom_folderids);
            $MidList->status = $request->status;
            $MidList->save();

            return redirect('/mid')->with(['message' => 'Mid updated successfully!', 'status' => 'success']);
        } catch (\Exception $e) {

            return redirect('/mid')->with(['error' => 'Something went wrong!' . $e->getMessage(), 'status' => 'error']);
        }
    }

    public function destroy($roleId)
    {
        $MidList = MidList::find($roleId);
        $MidList->delete();
        return redirect('mid')->with(['info' => 'Mid Deleted Successfully', 'status' => 'success']);
    }
}
