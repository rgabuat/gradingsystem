@extends('layouts.app')


@section('content')

<div class="container py-3">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-body">
                <h2>Upload Subject Class List</h2>
                <hr>
                <h4>Step 1</h4>
                <p>Click Upload File and Browse for CSV template</p>
                <div class="form-group">
                    <input type="file" name="classfile" class="form-control">
                </div>
                <h4>Step 2</h4>
                <p>Select for Section</p>
                <div class="form-group">
                    <select name="sections" id="" class="form-control">
                        <option value="">Select Section</option>
                    </select>
                </div>
                <input type="submit" class="form-control btn btn-primary" value="UPLOAD FILE">
            </div>
        </div>
    </div>
</div>

@endsection