<?php

namespace App\Modules\Task\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Task\Models\Task;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function index()
    {
        //get Tasks
        $tasks = Task::paginate(15);
        return (new ApiResponse)->resource($tasks); #collection when returning list

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function store(Request $request)
    {
        $payload = $request->only('task_description');
        $rules = [
            'task_description' => 'required'
        ];

        $validator = Validator::make($payload, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "message" => "Unprocessable Entity",
                    "errors" => $errors
                ],
                422
            );
        }

        $payload = $request->all();
        $task = Task::create($payload);
        return (new ApiResponse)->resource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function show($id)
    {
        //get Tasks
        $task = Task::findOrFail($id);
        
        //return single Task as a resource
        return (new ApiResponse)->resource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payload = $request->only('status', 'account_id');
        $rules = [
            'status'   => 'required',
            'account_id' => 'required'
        ];

        $validator = Validator::make($payload, $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(
                [
                    "message" => "Unprocessable Entity",
                    "errors" => $errors
                ],
                422
            );
        }

        $payload = $request->all();
        $task = Task::findOrFail($id);
        $task->update($payload);
        return (new ApiResponse)->resource($task);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get Tasks
        $task = Task::findOrFail($id);
        if($task->delete()){
            return (new ApiResponse)->resource($task);
        }
        
    }
}
