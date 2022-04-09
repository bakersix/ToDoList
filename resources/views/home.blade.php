@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

		    <input type="button" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem" onClick="location.href='{{ route('tasks.index') }}'" value="To-Do List">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
