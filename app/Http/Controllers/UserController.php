<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', ['users' => $users]);
    }

    public function getUsers(Request $request)
    {
        if($request->ajax()) {
            return response()->json([
                'status' => 'success'
            ], 200);
        }
    }
}
