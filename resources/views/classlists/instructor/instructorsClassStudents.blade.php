
@extends('layouts.app')

@section('content')
<div class="table-responsive-sm py-3">
    <div class="card">
        <div class="card-body">
            <h2 class="text-center text-primary"><b>Grade Book</b></h2>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="bg-success text-center text-white py-2 mb-3">
                    {{ session('status') }}
                </div>
            @endif
            <!-- <a href="#" class="btn btn-success">Create Grade Category</a> -->
            <a class="btn btn-success mb-2" href="javascript:void(0);" data-toggle="modal" data-target="#add_grading_category"><span class="fas fa-th-large mr-2"></span>Create Grade Category</a>
            <a class="btn btn-success mb-2" href="javascript:void(0);" data-toggle="modal" data-target="#add_grading_item"><span class="fas fa-th-large mr-2"></span>Create Grade Item</a>
            
            <div class="table-responsive-sm">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th rowspan="2">Student</th>
                            @if(!$grade_item->isEmpty())
                                @foreach($category as $cat)
                                    @foreach($grade_item as $item)
                                        @if($item['cat_id'] == $cat['id'])
                                            <th colspan="">{{ $cat['cat_name']}}</th>
                                        @endif
                                    @endforeach
                                    @php 
                                        break
                                    @endphp
                                @endforeach
                            @else
                            <th>No Grading Item Added</th>
                            @endif
                        </tr>
                        <tr>
                            @foreach($grade_item as $item)
                               @foreach($category as $cat)
                                    @if($item['cat'][0]['cat_name'] == $cat['cat_name'])
                                        <th class="text-center">{{ $item['item_name']}} <a href="javascript:void(0);" data-toggle="modal" data-target="#grading_grades{{ $item['id']}}"><span class="fas fa-pen ml-2 text-danger"></span></a> <a href="javascript:void(0);" data-toggle="modal" data-target="#grading_item_del{{ $item['id']}}"><span class="fas fa-trash ml-2 text-danger"></span></a></th>
                                    @endif
                               @endforeach  
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=0)
                        @php($count=0)
                        @foreach($classStudents as $class)
                        <tr>
                            <td style="width:20%">{{ $class['students'][0]['std_number'] }} {{ $class['students'][0]['first_name'] }} {{ $class['students'][0]['middle_name'] }}</td>
                            @if(!$grade_item->isEmpty())
                                @foreach($grade_item as $item)
                                <td>
                                    <form action="{{ route('grading-setup/grade_update')}}" method="post" >
                                        @csrf
                                        @foreach($grading as $grade)
                                            @if($grade['item_id'] == $item['id'] && $grade['std_id'] == $class['students'][0]['id']  )
                                            <div class="form-inline">
                                                <input type="hidden" name="item_id" value="{{ $item['id']}}">
                                                <input type="hidden" name="std_id" value="{{ $class['students'][0]['id']}}">
                                                <input type="number" name="grade" value="{{ $grade['grade']}}" class="form-control @error('grade') is-invalid @enderror" max="{{ $item['max_grade'] }}"><span><b>/{{ $item['max_grade'] }}</b></span>
                                                <input type="submit" class="btn btn-primary" value="Input Grade">
                                            </div>
                                            @endif
                                        @endforeach
                                        <input type="hidden" name="std_no[]" value="{{ $count++}}">
                                    </form>
                                </td>
                                @endforeach
                            @else
                                <td>No Grading Item Added</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @foreach($grade_item as $item)
                <!-- grading_grades -->
                <div class="modal fade" id="grading_grades{{ $item['id']}}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="add_grading_grades">Input Grade</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('grading-setup/grade_store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item['id']}}">
                                    <table class="table">
                                        <thead>
                                            <th>Student</th>
                                            <th>Score</th>
                                            <th>Item Count</th>
                                            <th>Feedback</th>
                                        </thead>
                                        <tbody>
                                            @php($count=0)
                                            @foreach($classStudents as $class)
                                            <tr>
                                                <td style="width:30%">
                                                    <input type="hidden" name="std_id[]" value="{{ $class['students'][0]['id']}}">
                                                    <input type="hidden" name="std_no[]" value="{{ $count++}}">
                                                    <span>{{ $class['students'][0]['std_number'] }} {{ $class['students'][0]['first_name'] }} {{ $class['students'][0]['middle_name'] }}</span>
                                                </td>
                                                <td>
                                                    <input type="number" name="grade[]" value="" class="form-control @error('grade') is-invalid @enderror" value="{{ old('grade') }}"  max="{{ $item['max_grade'] }}">
                                                </td>
                                                <td>
                                                   <span><b> / {{ $item['max_grade'] }}</b></span>
                                                </td>
                                                <td>
                                                    <input type="text" name="remarks" value="" class="form-control @error('remarks') is-invalid @enderror" value="{{ old('remarks') }}">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <input type="submit" class="btn btn-primary" value="Input Grade">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                 <!-- grading_item_del -->
                 <div class="modal fade" id="grading_item_del{{ $item['id']}}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="grading_item_del">Input Grade</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('grading-setup/grading_item_del')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $item['id']}}">
                                    <input type="hidden" name="subj_id" value="{{ Request::segment(3) }}">
                                    <p>Delete Grading Item <span>{{ $item['item_name']}}</span> </p>
                                    <input type="submit" class="btn btn-primary" value="Remove Item">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- grading_category -->
            <div class="modal fade" id="add_grading_category" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="grading_category">Create Grading Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('grading-setup/store')}}" method="post">
                                @csrf
                                <input type="hidden" name="subj_id" value="{{ Request::segment(3) }}">
                                <div class="form-group">
                                    <label for="cat_name">Category name <span class="text-danger">*</span></label>
                                    <input type="text" name="cat_name" value="" class="form-control @error('cat_name') is-invalid @enderror" value="{{ old('cat_name') }}">
                                    <div>
                                        @error('cat_name')
                                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight <span class="text-danger">*</span></label>
                                    <input type="text" name="weight" value="" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                                    <div>
                                        @error('weight')
                                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Create Category">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- grading_item -->
            <div class="modal fade" id="add_grading_item" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="add_grading_category">Create Grading Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('grading-setup/grade_item_store')}}" method="post">
                                @csrf
                                    <input type="hidden" name="subj_id" value="{{ Request::segment(3) }}">
                                @foreach($classStudents as $class)
                                    <input type="hidden" name="std_id[]" value="{{ $class['students'][0]['id'] }}">
                                @endforeach
                                <div class="form-group">
                                    <label for="cat_name">Item Name<span class="text-danger">*</span></label>
                                    <input type="text" name="item_name" value="" class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}">
                                    <div>
                                        @error('item_name')
                                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="max_grade">Max Grade<span class="text-danger">*</span></label>
                                    <input type="text" name="max_grade" value="" class="form-control @error('max_grade') is-invalid @enderror" value="{{ old('max_grade') }}">
                                    <div>
                                        @error('max_grade')
                                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="grade_period">Grading Period<span class="text-danger">*</span></label>
                                    <select name="grade_period" id="" class="form-control">
                                        <option value="prelim">Prelim</option>
                                        <option value="midterm">Midterm</option>
                                        <option value="pre-final">Pre Final</option>
                                        <option value="finals">Finals</option>
                                    </select>
                                    <div>
                                        @error('grade_period')
                                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="grade_period">Category<span class="text-danger">*</span></label>
                                    <select name="cat_id" id="" class="form-control">
                                        @if(!$category->isEmpty())
                                            @foreach($category as $cat)
                                                <option value="{{ $cat['id'] }}">{{ $cat['cat_name'] }} <span class="text-primary"><b>( {{ $cat['weight'] }} )</b></span></option>
                                            @endforeach
                                        @else 
                                            <option value="">No Category</option>
                                        @endif
                                    </select>
                                    <div>
                                        @error('grade_period')
                                            <span class="error invalid-feedback d-block"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Create Category">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
