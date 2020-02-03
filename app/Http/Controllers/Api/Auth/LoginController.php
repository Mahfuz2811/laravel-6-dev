<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator;
use JWTFactory;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        \Log::info("Login");
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'is_success'    => false,
                    'error'         => 'Invalid Credentials!',
                    'message'       => ''
                ], 401);
            }
        } catch (JWTException $e) {
            return response()->json([
                'is_success'    => false,
                'error'         => 'Could not create token! Something went to wrong.',
                'message'       => ''
            ], 500);
        }

        $user = Auth::user();

        //check user status
        if ($user->is_approved == 1)
        {
            auth()->logout();
            return response()->json([
                'is_success'    => false,
                'error'         => 'Could not create token',
                'message'       => 'Your account is not approved yet. Please wait for approval.'
            ], 500);

        }

        //return $user->getPermissions();


        /*$customClaims = ['name' => $user->name];
        $token = JWTAuth::fromUser($user, $customClaims);*/

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'is_success'    => true,
            'message'       => '',
            'token'         => $token
        ]);
    }


    public function logout(Request $request)
    {
        //$this->validate($request, ['token' => 'required']);

        \Log::info("Logout");
        $validator = Validator::make($request->all(), [
            'token'   => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json([
                'is_success' => true,
                'message'=> "You have successfully logged out."
            ]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json([
                'is_success' => false,
                'error' => 'Failed to logout, please try again.'
            ], 500);
        }
    }


    public function username()
    {
        $login = request()->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }
}
