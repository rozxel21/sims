@extends('app')

@section('header')
    <div class="col-lg-10">
        <h2>Course</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong>Course</strong>
            </li>
            <li class="active">
                <a href="{{ route('course.create') }}">New</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
@stop

@section('content')
	<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Course Table</h5>
            <div class="ibox-tools">
                <a href="{{ route('course.create') }}">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div id="flush-message"></div>
            <script type="text/javascript">
                if(localStorage.getItem("response") != null && localStorage.getItem("response") != undefined){
                    var data =  JSON.parse(localStorage.getItem('response'));
                    var html = "<div class='alert alert-" + data.status + " alert-dismissable animated fadeIn'>";
                    html += "<button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>";
                    html += data.message;
                    html += "</div>";

                    $("#flush-message").append(html);

                    localStorage.clear();
                }
            </script>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Abbreviation</th>
                        <th>Name</th>
                        <th>College</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @forelse($courses as $course)
                    <tr>
                        @inject('str', 'Illuminate\Support\Str')
                        <td>{{ $i }}</td>
                        <td>{{ $str->upper($course->course_abrr) }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->college->college_name }}</td>
                        @if( $course->course_status == 1 )
                            <td><span class="label label-success">Active</span></td>
                        @else
                            <td><span class="label label-warning">Deactivated</span></td>   
                        @endif
                        <td>
                            <a href="{{ route('course.edit', ['course_abrr' => $course->course_abrr ]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
                            <button class="btn btn-default btn-xs"><i class="fa fa-times"></i></button>
                        </td>
                        <?php $i++ ?>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Record Found!!!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop