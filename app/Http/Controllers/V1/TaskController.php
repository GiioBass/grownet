<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'tasks',
            'data' => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        try {

            $data = $request->all();
            Log::debug($data);
            $data['created_at'] = Carbon::now();
            $task = Task::create($data);
            if ($task->exists()) {
                return response()->json([
                    'success' => true,
                    'data' => $task,
                    'message' => 'resource created'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'error creating resource'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        try {
            $data = Task::where('id', $task->id)->get();
            return response()->json([
                'succes' => true,
                'message' => 'Task',
                'data' => $data
            ]);
        }
        catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'succes' => false,
                'message' => 'Error'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
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
        try {

            $data = $request->all();

            $task = Task::where('id', $task->id)->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'due_date' => $data['due_date'],
                'status' => $data['status'],
                'updated_at' => Carbon::now()
            ]);

            return response()->json([
                'success' => true,
                'data' => $task,
                'message' => 'resource updated'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th,
                'message' => 'error updating resource'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {

            $task = Task::where('id', $task->id)->delete();

            return response()->json([
                'success' => true,
                'message' => 'resource deleted'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th,
                'message' => 'error deleting resource'
            ]);
        }
    }
}
