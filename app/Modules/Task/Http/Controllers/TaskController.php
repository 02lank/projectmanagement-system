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
    public function index(Request $request)
    {
        $payload = $request->only('project_id');
        $rules = [
            'project_id' => 'required'
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

        $project_id = $request->input('project_id');
        $payload = $request->all();
        $task = Task::where('project_id', $project_id)
                        ->get();
        return (new ApiResponse)->resource($task);
    }


    public function indexUser(Request $request)
    {
        $payload = $request->only('account_id', 'project_id');
        $rules = [
            'project_id' => 'required',
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

        $account_id = $request->input('account_id');
        $project_id = $request->input('project_id');
        $payload = $request->all();
        $task = Task::where('account_id', $account_id)
                        ->where('project_id', $project_id)
                        ->get();
        return (new ApiResponse)->resource($task);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function store(Request $request)
    {
        $payload = $request->only('account_id', 'project_id', 'task_description');
        $rules = [
            'project_id' => 'required',
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
    public function updateStatus(Request $request, $id)
    {
        $payload = $request->only('status');
        $rules = [
            'status'   => 'required'
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

    public function update(Request $request, $id)
    {
        $payload = $request->only('account_id', 'task_description');
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
