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
                            New Task
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
                        <h5 class="text-center mt-2">New Task</h5>
                    </div>
                        <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        @method('POST')
                    <div class="card-body">

                            <fieldset>
				<input type="hidden" name="created_by" value="{{ $user->id }}" />
                                <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="title" class="form-control">
                                        @error('title')
                                                <div class="text-danger">
                                                        {{ $message }}
                                                </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="">Description</label>
                                        <input type="text" name="description" class="form-control">
                                        @error('description')
                                                <div class="text-danger">
                                                        {{ $message }}
                                                </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="">Assigned To</label>
                                        <select name="user_id" class="form-control">
                                            <option hidden disabled selected value> -- select an option -- </option>
                                            @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                        </select>
                                        @error('user_id')
                                                <div class="text-danger">
                                                        Please select a valid option
                                                </div>
                                        @enderror
                                </div>
                                <div class="form-group">
                                        <label for="">Due Date</label>
                                        <input type="date" value="" min="{{ date('Y-m-d') }}" name="due_date" class="form-control">
                                        @error('description')
                                                <div class="text-danger">
                                                        {{ $message }}
                                                </div>
                                        @enderror
                                </div>
                            </fieldset>


                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Add</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection
