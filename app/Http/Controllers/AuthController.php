<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use \Exception as Exception;

use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $auth = Auth::user();
            $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken;
            $success['name'] =  $auth->name;

            $response = [];
            $response['token'] = $success['token'];
            $response['user'] = User::where('email', $request->email)->get();

            return $response;
        }
        else{
            return "fail";
        }
    }

    public function register(Request $request)
    {
        try {
            $input = $request->all();
            // $input['password'] = bcrypt($input['password']);
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
            $success['name'] =  $user->name;

            return 'User successfully registered!';
        } catch(Exception $e) {
            return "fail";
        }

    }

    public function getUserById($user_id) {
        return User::find($user_id);
    }

    public function profile()
    {

        $user= $this->guard()->user();
        //   $this->returnData('amout',Crypt::decrypt( $user->password));
        return $this->returnData('user', $user);



    }//end profile()
}
