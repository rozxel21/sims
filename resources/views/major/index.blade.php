@extends('app')

@section('header')
    <div class="col-lg-10">
        <h2>Major</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Home</a>
            </li>
            <li class="active">
                <strong>Major</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
@stop

@section('content')
	<div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Basic Table</h5>
        </div>
        <div class="ibox-content">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    @forelse($majors as $major)
                    <tr>
                        @inject('str', 'Illuminate\Support\Str')
                        <td>{{ $i }}</td>
                        <td>{{ $major->major_name }}</td>
                        <td>{{ $str->upper($major->course->course_abrr) }}</td>
                        @if( $major->major_status == 1 )
                            <td><span class="label label-success">Active</span></td>
                        @else
                            <td><span class="label label-warning">Deactivated</span></td>   
                        @endif
                        <td>
                            <a href="{{ route('major.edit', ['id' => $major->id ]) }}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
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