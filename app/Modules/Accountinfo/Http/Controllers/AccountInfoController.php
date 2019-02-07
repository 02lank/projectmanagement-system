<?php

namespace App\Modules\AccountInfo\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\AccountInfo\Models\AccountInfo;
use App\Http\Controllers\Controller;
use Damnyan\Cmn\Services\ApiResponse;
use Illuminate\Support\Facades\Validator;

class AccountInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function index()
    {
        // GET ACCOUNTS
        $accountinfos= AccountInfo::paginate(10);
        return (new ApiResponse)->resource($accountinfos); 
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
        $payload = $request->only('firstName', 'lastName', 'email');
        $rules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required'
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
        $accountinfo = AccountInfo::create($payload);
        return (new ApiResponse)->resource($accountinfo);
    }
    
    /**
    * Display the specified resource.
    *
    * @param int  $id
    *
    * @return \Damnyan\Cmn\Services\ApiResponse
    */
    public function show($accountinfo_id)
    {
        $accountinfo = AccountInfo::findOrFail($accountinfo_id);
        return (new ApiResponse)->resource($accountinfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accountinfo_id)
    {
        $accountinfo = AccountInfo::findOrFail($accountinfo_id);
        $accountinfo->update($request->only('firstName', 'lastName', 'email'));
        return (new ApiResponse)->resource($accountinfo);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Damnyan\Cmn\Services\ApiResponse
     */
    public function destroy($accountinfo_id)
    {
        // // DELETE ACCOUNT
        // $account= Account::findOrFail($account_id);

        // if ($account->delete()) {
        //     return new AccountResource($account);
        // }
        $accountinfo = AccountInfo
        ::findOrFail($accountinfo_id);
        $accountinfo->delete();
        return (new ApiResponse)->resource($accountinfo);
    }
}
