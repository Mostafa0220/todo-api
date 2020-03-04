<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Container\Container;

class AuthController extends Controller
 {
    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */

    public function register( Request $request ) : JsonResponse
 {

        $this->validate( $request, [
            'first_name' => ['required', 'max:20'],
            'last_name' => ['required', 'max:20'],
            'mobile' => 'required|regex:/(01)[0-9]{9}/',
            'gender' => 'required|in:male,female',
            'dob' => 'required|before:5 years ago',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ] );

        $hasher = app()->make( 'hash' );
        $password = $hasher->make( $request->input( 'password' ) );

        $user = User::create( [
            'first_name'=>$request->input( 'first_name' ),
            'last_name'=>$request->input( 'last_name' ),
            'mobile'=>$request->input( 'mobile' ),
            'gender'=>$request->input( 'gender' ),
            'dob'=>$request->input( 'dob' ),
            'email'=>$request->input( 'email' ),
            'password'=>$password,
            'api_token' => str_random( 128 ),
        ] );

        return new JsonResponse( [
            'message' => 'Successfully register!',
            'data' => $user,
        ] );

    }
    /**
    * Login.
    *
    * @param Container $app
    * @param Request   $request
    *
    * @return \Illuminate\Http\JsonResponse
    */

    public function login( Container $app, Request $request ): JsonResponse
 {
        $this->validate( $request, [
            'email' => 'required',
            'password' => 'required',
        ] );

        if ( $user = User::where( 'email', $request->email )->first() ) {
            if ( $app->make( 'hash' )->check( $request->password, $user->password ) ) {
                // If we haven't generate the token...
                if (!$user->api_token) {
                    $user->api_token = Str::random(128);
                    $user->save();
                }

                return new JsonResponse([
                    'message' => 'Successfully login.',
                    'data' => $user,
                ]);
            }
        }

        return new JsonResponse([
            'message' => 'Wrong email or password.',
        ], 400);
    }

    /**
     * Logout.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $user = $request->user();

        $user->api_token = '';

        $user->save();

        return new JsonResponse([
            'message' => 'Successfully logout.',
            ] );
        }
    }
