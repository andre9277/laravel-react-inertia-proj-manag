<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Task::query();

        //New query params for sorting:
            $sortField = request("sort_field", 'created_at');
            $sortDirection = request("sort_direction", "desc");

        if(request("name")){
            $query->where("name","like","%".request("name")."%");
        }
        if(request('status'))
        {
            $query->where('status', request('status'));
        }

        $tasks= $query->orderBy($sortField,$sortDirection)->paginate(10)->onEachSide(1);


        //The entire data will be available to the frontend (dont send sensible data)
        return inertia("Task/Index", [
            "tasks"=> TaskResource::collection($tasks),
            'queryParams' => request()->query() ?: null, //if its an empty array, im going to pass null
            //queryParams are passed to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
