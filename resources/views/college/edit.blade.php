@extends('app')

@section('title', '| College')

@section('header')
    <div class="col-lg-10">
        <h2>College</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li>
                <a href="">College</a>
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
            <h5>Edit College</h5>
        </div>
        <div class="ibox-content">
        	<form id="college-edit-form" action="{{ route('college.update', $college->id) }}" class="form-horizontal">
                {{ csrf_field() }}
        		<div class="form-group">
        			<label class="col-sm-2 control-label">College Abbrevation</label>
                    <div class="col-sm-10">
                    	<input type="text" value="{{ $college->college_abrr }}" name="college-abrr" class="form-control" disabled="true"/>
                    </div>
                </div>
                <div class="form-group">
        			<label class="col-sm-2 control-label">College Name</label>
                    <div class="col-sm-10">
                    	<input type="text" value="{{ $college->college_name }}" name="college-name" class="form-control" minlength="5" maxlength="50" required="true" /> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">College Status</label>
                    <div class="col-sm-10">
                        <select name="college-status" class="form-control">
                            <option value="1">Activate</option>
                            <option value="0">Deactivate</option>
                        </select> 
                    </div>
                    <script type="text/javascript">
                        $('select[name=college-status]').val("{{ $college->college_status }}");
                    </script>
                </div>
                <div class="form-group">
                	<div class="col-sm-2"></div>
                	<div class="col-sm-10">

                		<button class="btn btn-primary" type="submit"><i class="fa fa-check"></i>&nbsp;Update</button>
                	</div>
                </div>
        	</form>	
        </div>
    </div>

@stop