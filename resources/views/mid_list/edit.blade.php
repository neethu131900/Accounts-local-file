<x-app-layout>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Mid Edit</h3>
                </div>

                <!-- /.card-header -->
                <form action="/midupdate/{{$MidList->id}}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Mid Name</label>
                            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" id="name" name="name" value="{{ $MidList->name }}">
                            @if($errors->has('name'))
                            <p class=" invalid-feedback">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Ecom Folders</label>
                            <select class="form-control select2 @if($errors->has('ecom_folderids')) is-invalid @endif" multiple="multiple" name="ecom_folderids[]" id="ecom_folderids" style="width: 100%;">
                                @php
                                $string = '';
                                $string2 = '';
                                if(in_array('SPP5', $selected)){
                                $string = 'selected';
                                }
                                if(in_array('WPRBS', $selected)){
                                $string2 = 'selected';
                                }
                                @endphp
                                <option value="SPP5" {{$string}}>SPP5</option>
                                <option value="WPRBS" {{$string2}}>WPRBS</option>
                            </select>
                            @if($errors->has('ecom_folderids'))
                            <p class="invalid-feedback">{{ $errors->first('ecom_folderids') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="1" checked>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value="0">
                                <label class="form-check-label">Inactive</label>
                            </div>
                        </div>

                        <!-- /.row -->
                        <!-- /.row -->
                    </div>

                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-info">Submit</button>
                        <!-- <input type="submit" value="Add Mid" class="btn btn-primary"> -->
                    </div>
                </form>
            </div>


        </div>

    </div>
</x-app-layout>