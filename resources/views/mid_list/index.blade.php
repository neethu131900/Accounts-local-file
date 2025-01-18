<x-table-layout>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Mid's</h3>
                    @can('create mid')
                    <div class="text-right">
                        <a href="{{ url('mid/create') }}" class="btn btn-info">Create Mid</a>
                    </div>
                    @endcan
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="custom_tbl">
                        <thead>
                            <tr>
                                <th>Mid</th>
                                <th>Ecom Mapped Folders</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($midlist as $value)
                            @php
                            $implode = json_decode($value->ecom_folderids);
                            $ecom_folderids = implode(",",$implode);
                            @endphp
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $ecom_folderids }}</td>
                                <td>
                                    @can('update mid')
                                    <a href="{{ url('mid/'.$value->id.'/edit') }}" class="btn btn-info">Edit</a>
                                    @endcan
                                    <!-- <a href="{{ url('mid/'.$value->id.'/delete') }}" class="btn btn-danger mx-2">Delete</a> -->
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