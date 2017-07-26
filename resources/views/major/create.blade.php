@extends('app')

@section('title', '| Major')

@section('header')
    <div class="col-lg-10">
        <h2>Course</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="{{ route('major.index') }}">Major</a>
            </li>
            <li class="active">
                <strong>New</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
@stop

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Create New Major</h5>
        </div>
        <div class="ibox-content">
            <div id='validation-message'></div>
            <form id="major-create-form" action="{{ route('major.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 control-label">College</label>
                    <div class="col-sm-10">
                        <select name="course" class="form-control">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Major Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="major-name" class="form-control" minlength="5" maxlength="50" required="true" /> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Submit</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>

@stop