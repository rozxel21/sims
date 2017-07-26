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
                <strong>Edit</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
@stop

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Edit Course</h5>
        </div>
        <div class="ibox-content">
            <div id='validation-message'></div>
            <form id="course-edit-form" action="{{ route('course.update', $course->id) }}" method="PUT" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 control-label">College</label>
                    <div class="col-sm-10">
                        <select name="college" class="form-control">
                            @foreach($colleges as $college)
                                <option value="{{ $college->id }}">{{ $college->college_name }}</option>
                            @endforeach
                        </select>
                        <script type="text/javascript">
                            $('select[name=college]').val("{{ $course->college_id }}");
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Course Abbrevation</label>
                    <div class="col-sm-10">
                        <input type="text" name="course-abrr" value="{{ $course->course_abrr }}" class="form-control" minlength="2" required="true" disabled="true" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Course Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="course-name" value="{{ $course->course_name }}" class="form-control" minlength="5" maxlength="50" required="true" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Course Status</label>
                    <div class="col-sm-10">
                        <select name="course-status" class="form-control">
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select> 
                    </div>
                    <script type="text/javascript">
                        $('select[name=course-status]').val("{{ $course->course_status }}");
                    </script>
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