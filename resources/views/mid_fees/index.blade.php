<x-table-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Mid Fees</h3>
                    @can('create midfees')
                    <div class="text-right">
                        <a href="{{ url('midfees/create') }}" class="btn btn-info">Create Mid Fees</a>
                    </div>
                    @endcan
                </div>
                <!-- /.card-header -->

                <div class="card-body">

                    <table class="table table-bordered table-striped" id="custom_tbl">
                        <thead>
                            <tr>
                                <th>Mid</th>
                                <th>Format Type</th>
                                <th>Time Zone</th>
                                <th>Settlement Currency</th>
                                <th>Settlement Fees</th>
                                <th>Transaction Fees</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($midfees as $row)

                            <tr>
                                <td>{{ $row->getMidName->name }}</td>
                                <td>{{ $row->getFormatType->type;  }}</td>
                                <td>{{ $row->getTimeZoneDetails->time_zone.'->'.$row->getTimeZoneDetails->utc_offset;  }}</td>
                                <td>{{ $row->settlement_currency;  }}</td>
                                <td>{{ $row->settlement_fee;  }}</td>
                                <td>{{ $row->transaction_fee;  }}</td>
                                <td>
                                    @can('update midfees')
                                    <a href="{{ url('midfees/'.$row->id.'/edit') }}" class="btn btn-info">Edit</a>
                                    @endcan

                                    <a href="{{ url('midfees/'.$row->id.'/upload') }}" class="btn btn-info"><i class="fas fa-file-excel"></i> &nbsp;Import Excel</a>

                                    <!-- <a href="{{ url('midfees/'.$row->id.'/delete') }}" class="btn btn-danger mx-2">Delete</a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-table-layout>