<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
   public function register (Request $request)
   {
    $validator = Validator::make($request->all(), [
    'name'=>'required',
    'email' => 'required|min:4|email|unique:users',
    'password' => ['required', 'string', Password::min(8)
            ->mixedCase()
            ->letters()
            ->numbers()
            ->symbols()
            ->uncompromised()],
    'confirm_password' => 'required|same:password',
    'status'=> 1,
    ]);

    if ($validator->fails()){
        return response()->json([
        'success'=> false,
        'message'=>'ada kesalahan',
        'data'=> $validator->errors()
        ]);
    }

    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    $user = User::create($input);

    $success['token'] = $user->createToken('auth_token')->plainTextToken;
    $success['name'] = $user -> name;

    return response()->json([
        'success'=> true,
        'message'=>'sukses register',
        'data'=> $success
    ]);
   }

   public function login(Request $request){
    if (Auth::attempt(['email'=> $request->email, 'password'=>$request->password])){
    $auth = Auth::user();
    $success['token'] = $auth->createToken('auth_token')->plainTextToken;
    $success['name'] = $auth->name;
    $success['email'] = $auth->email;

    return response()->json([
        'success'=>true,
        'message' => 'login sukses',
        'data'=> $success
    ]);
   } else {
    return response()->json([
        'success'=>false,
        'message' => 'cek email dan password',
        'data'=> null
      ]);}
    }

}