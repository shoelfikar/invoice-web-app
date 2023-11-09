<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
            'name' => 'required|min:3',
            'role' => 'required'
        ]);

        try {
            //code...
            DB::transaction();
            $existingUser = User::where('email', $request->email)->first();

            if(!isset($existingUser)){
                throw('User Email Exist In Database');
            }

            $user = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'status' => 1,
                'role' => $request->role
            ]);

            if(!$user){
                DB::rollBack();
                return redirect()->route('user.create')->with(['error' => 'error create user, please try again later']);
            }

            DB::commit();


            return redirect()->route('user.create')->with(['success' => 'Success Create User']);

        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('user.create')->with(['error' => $th->getMessage()]);
        }


    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8'
        ]);

        $user = $request->all();

        $userExists = User::where(['email'=> $request->email])->first();

        if(empty($userExists)) {
            return redirect()->back()->withErrors(['error' => 'Email Not Found']);
        }

        if(!Hash::check($user['password'], $userExists->password)) {

            return redirect()->back()->withErrors(['error' => 'Wrong Password']);
        }

        Auth::login($userExists);

        return redirect()->route('dashboard');
    }

    public function index()
    {
        if(Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('user.index');
    }
}
