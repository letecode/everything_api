<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    /**
     * Register a new user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('EveryThing')->plainTextToken;
        $success['user'] = new UserResource($user);

        return $this->sendResponse($success, 'User register successfully.');
    }

    /**
     * Login existing user
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = User::auth();
            $success['token'] = $user->createToken('EveryThing')->plainTextToken;
            $success['user'] = new UserResource($user);

            return $this->sendResponse($success, 'User login successfully.');
        }
        else{
            return $this->sendError('Account not found', ['error' => 'Unauthorised']);
        }
    }
}
