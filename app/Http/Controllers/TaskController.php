<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $tasks = $user->tasks;
	$data = [
		'user' => $user,
		'tasks' => $tasks
	];
	return view('tasks.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$user = Auth::user();
	$users = User::all();
	$data = [
		'user' => $user,
		'users' => $users
	];
        return view('tasks.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
       $request->validate([
		'title' => 'required',
		'user_id' => 'required'
	]);

	Task::create($request->all());

	return redirect()->route('tasks.index')->with('status', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
	$data = [
		'task' => $task
	];
        return view('tasks.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
	$users = User::all();
	$data = [
		'task' => $task,
		'users' => $users
	];
        return view('tasks.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $request->validate([
		'title' => 'required',
		'user_id' => 'required'
	]);

	$task->update($request->all());

	return redirect()->route('tasks.show', $task->id)->with('status', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();

	return redirect()->route('tasks.index')->with('status', 'Task deleted successfully');
    }
}
