<?php

namespace App\Modules\Project\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Project\Models\Project;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function index()
    {
        // GET ACCOUNTS
        $projects= Project::paginate(10);
        return (new ApiResponse)->resource($projects); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function store(Request $request)
    {
        // //STORE ACCOUNT
        // $account = $request->isMethod('put') ? Account::findOrFail($request->account_id) : new Account;

        // $account->user_id = $request->input('user_id');
        // $account->username = $request->input('username');
        // $account->password = $request->input('password');
        
        // if ($account->save()) {
        //     return new AccountResource($account);
        // }
        $payload = $request->only('account_id','team_id', 'name', 'description', 'status', 'deadline');
        $rules = [
            'account_id' => 'required',
            'team_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'deadline' => 'required'
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
        $project = Project::create($payload);
        return (new ApiResponse)->resource($project); 
    }

    /**
    * Display the specified resource.
    *
    * @param int  $id
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function show($project_id)
    {
        $project = Project::findOrFail($project_id);
            return (new ApiResponse)->resource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id222222
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project_id)
    {
        $project = Project::findOrFail($project_id);
        $project->update($request->only('name', 'description', 'status', 'deadline'));
        return (new ApiResponse)->resource($project);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function destroy($project_id)
    {
        // // DELETE ACCOUNT
        // $account= Account::findOrFail($account_id);

        // if ($account->delete()) {
        //     return new AccountResource($account);
        // }
        $project = Project::findOrFail($project_id);
        $project->delete();
        return (new ApiResponse)->resource($project);
    }
}