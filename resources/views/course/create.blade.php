@extends('app')

@section('title', '| Course')

@section('header')
    <div class="col-lg-10">
        <h2>Course</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="{{ route('course.index') }}">Course</a>
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
            <h5>Create New Course</h5>
        </div>
        <div class="ibox-content">
            <div id='validation-message'></div>
            <form id="course-create-form" action="{{ route('course.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 control-label">College</label>
                    <div class="col-sm-10">
                        <select name="college" class="form-control">
                            @foreach($colleges as $college)
                                <option value="{{ $college->id }}">{{ $college->college_name }}</option>
                            @endforeach
                        </select> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Course Abbrevation</label>
                    <div class="col-sm-10">
                        <input type="text" name="course-abrr" class="form-control" minlength="2" required="true" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Course Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="course-name" class="form-control" minlength="5" maxlength="50" required="true" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <p class="col-sm-10 text-center"><em>*if applicable</em>></p>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Course Major</label>
                    <div class="col-sm-10">
                        <input type="text" name="major-name-1" class="form-control" minlength="5" maxlength="50" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="text" name="major-name-2" class="form-control" minlength="5" maxlength="50" /> 
                    </div>
                </div>
                <div id='add-major'></div>
                <div class="form-group">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button id='add-major-btn' type="button" class="btn btn-info"><i class="fa fa-plus"></i>&nbsp;Add Major</button>
                        <button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Submit</button>
                    </div>
                </div>
            </form> 
        </div>
    </div>

@stop