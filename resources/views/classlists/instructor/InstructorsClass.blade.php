
@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>My Class</b></h2>
        </div>
    </div>
    <div class="row">
        @foreach($subj_section as $section)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-primary"><b>{{ $section['subj_name'] }}</b></h5>
                    <br>
                    <p class="mb-1">Code: <b>{{ $section['subj_code'] }}</b></p>
                    <p class="mb-1">Description: <b>{{ $section['subj_description'] }}</b></p>
                    <p class="mb-1">Units: <b>{{ $section['subj_units'] }}</b></p>
                    <p class="mb-3">Section: <b>{{ $section['subj_section'] }}</b></p>
                    <a href="{{ url('Classlists/my-class/'.$section['id'].'/students') }}" class="btn btn-primary">View Students</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
