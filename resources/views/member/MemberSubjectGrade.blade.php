@extends('layouts.app')

@section('content')

<div class="col-lg-12 py-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>Student Grade</b></h2>
        </div>
    </div>
      <div class="card ">
        <div class="card-body ">
          <h3 class="text-center text-primary">Coming Soon</h3>
          <hr>
                @if (session('status'))
                    <div class="bg-success text-center text-white py-2 mb-3">
                        {{ session('status') }}
                    </div>
                @endif
            <form action="{{ route('member/store') }}" method="post">
                @csrf

          </form>
        </div>
    </div>
</div>
@endsection