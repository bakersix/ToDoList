@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('tasks.index') }}">To-Do List</a>
                        </li>
                        <li class="breadcrumb-item active">
				{{ $task->title }}
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">{{ $task->title }}</h5>
                    </div>
                    <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                            <fieldset>
                                <div class="form-group">
                                        <strong>Title:</strong>
                                        {{ $task->title }}
                                </div>
                                <div class="form-group">
                                        <strong>Description</strong>
					{{ $task->description }}
                                </div>
                                <div class="form-group">
                                        <strong>Assigned To</strong>
					{{ $task->user->name }}
                                </div>
                                <div class="form-group">
                                        <strong>Due Date</strong>
					{{  $task->due_date ? $task->due_date->format('m/d/Y') : "" }}
                                </div>
                            </fieldset>


                    </div>
                </div>
            </div>

            <div class="card-footer text-center">
                <input type="button" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem" onClick="location.href='{{ route('tasks.edit', $task->id) }}'" value="Edit Task">
            </div>
            <div class="card-footer text-center">
		<form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-flat btn-danger" style="width: 40%; font-size:1.3rem" value="Delete Task">
		</form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection
