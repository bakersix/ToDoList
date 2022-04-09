@extends('layouts.app')

@section('content')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">
                            To-Do List
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">To-Do List for {{ $user->name }}</h5>
                    </div>
                    <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		    @if ($tasks && $tasks->count())
			<table class='table'>
				<thead>
					<tr>
						<th>Title</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tasks as $task)
						<tr>
							<td><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		    @else
			<b>Looks like you're all caught up!</b>
		    @endif
		</div>
	    </div>
            <div class="card-footer text-center">
                <input type="button" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem" onClick="location.href='{{ route('tasks.create') }}'" value="Create New Task">
            </div>
        </div>
    </div>
</div>
@endsection
