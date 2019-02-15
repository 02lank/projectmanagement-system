<?php
namespace App\Modules\Team\Http\Controllers;
use Illuminate\Http\Request;
use App\Modules\Team\Models\Team;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function index()
    {
        $teams = Team::get();
        return (new ApiResponse)->resource($teams);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function store(Request $request)
    {
        $payload = $request->only('team_name');
        $rules = [
            'team_name' => 'required'
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
        $team = Team::create($payload);
        return (new ApiResponse)->resource($team);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        return (new ApiResponse)->resource($team);
    }

    public function update(Request $request, $id)
    {
        $payload = $request->only('team_name');
        $rules = [
            'team_name' => 'required'
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
        $team = Team::findOrFail($id);
        $team->update($payload);
        return (new ApiResponse)->resource($team);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if($team->delete()){
            return (new ApiResponse)->resource($team);
        } 
    }
}