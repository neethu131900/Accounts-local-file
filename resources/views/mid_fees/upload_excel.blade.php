<x-app-layout>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Upload Excel File</h3>
                </div>

                <!-- /.card-header -->
                <form action="/uploadexcel/{{$roleId}}" method="POST" name="importform"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <!-- accept="excel/*" -->
                            <input type="file" name="excel_file" id="excel_file" class="form-control @error('excel_file') is-invalid @enderror">
                            @if($errors->has('excel_file'))
                            <p class=" invalid-feedback">{{ $errors->first('excel_file') }}</p>
                            @endif

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info">upload</button>
                    </div>
                </form>


                <!-- <form action="/uploadexcel/{{$roleId}}" method="POST" name="importform"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">File:</label>
                        <input id="file" type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <a class="btn btn-info" href="">Export File</a>
                    </div>
                    <button class="btn btn-success">Import File</button>
                </form> -->
            </div>


        </div>

    </div>
</x-app-layout>