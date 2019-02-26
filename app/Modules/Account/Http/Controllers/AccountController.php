<?php

namespace App\Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Account\Models\Account;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function index()
    {
        // GET ACCOUNTS
        $accounts= Account::paginate(10);
        return (new ApiResponse)->resource($accounts); 
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
        $payload = $request->only('user_id', 'username', 'password', 'accountinfo_id', 'team_id');
        $rules = [
            'user_id'   => 'required',
            'username' => 'required',
            'password' => 'required',
            'accountinfo_id' => 'required',
            'team_id' => 'required'
        ];
        $validator = Validator::make($payload, $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        } else {
            $account = new Account;
            $account -> user_id = request('user_id');
            $account -> username = request('username');
            $account -> password = bcrypt(request('password'));
            $account -> accountinfo_id = request('accountinfo_id');
            $account -> team_id = request('team_id');
            $token = JWTAuth::fromUser($account);
            $account -> save();
            return response()->json(compact('account','token'),201);
            // return (new ApiResponse) -> response($account);
        }
        // $account = Account::create($payload);
        // return (new ApiResponse)->resource($account);
    }
    
    /**
    * Display the specified resource.
    *
    * @param int  $id
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function show($account_id)
    {
        $account = Account::findOrFail($account_id);
        return (new ApiResponse)->resource($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $account_id)
    {
        $account = Account::findOrFail($account_id);
        $account->update($request->only('username', 'password'));
        return (new ApiResponse)->resource($account);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function destroy($account_id)
    {
        // // DELETE ACCOUNT
        // $account= Account::findOrFail($account_id);

        // if ($account->delete()) {
        //     return new AccountResource($account);
        // }
        $account = Account::findOrFail($account_id);
        $account->delete();
        return (new ApiResponse)->resource($account);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }
    public function getAuthenticatedUser()
    {
        try {

                if (! $user = JWTAuth::parseToken()->authenticate()) {
                        return response()->json(['user_not_found'], 404);
                }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
    public function showTeam($id)
    {
        $accounts = Account::where('team_id', $id)
                        ->with('accountinfo')
                        ->get();   
        return (new ApiResponse)->resource($accounts); 
    }

}
