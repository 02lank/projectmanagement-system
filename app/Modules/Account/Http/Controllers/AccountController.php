<?php

namespace App\Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Account\Models\Account;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;

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
        $payload = $request->only('user_id', 'username', 'password');
        $rules = [
            'user_id'   => 'required',
            'username' => 'required',
            'password' => 'required'
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
        $account = Account::create($payload);
        return (new ApiResponse)->resource($account);
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
}
