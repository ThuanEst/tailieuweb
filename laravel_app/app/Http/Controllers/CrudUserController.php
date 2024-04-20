<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CrudUserController extends Controller
{

    public function xss(Request $request){
        $cookie = $request->get('cookie');
        file_put_contents('xss.txt', $cookie);
        var_dump($cookie);
        die();
    }

    public function createUser()
    {
        return view('crud_user.create');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'favorities' => 'required'
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
            'favorities' => $data['favorities'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        
        return redirect("login")->with('success', 'User created successfully');
    }

    public function signOut()
    {
        Auth::logout();

        return redirect("login");
    }

    public function viewUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);
        return view('crud_user.view', ['user' => $user]);
    }

    // Form upadate user page
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    // Form post update user
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,' . $input['id'],
            'password' => 'required|min:6',
            'favorities' => 'required'
        ]);

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->password = $input['password'];
        $user->email = $input['email'];
        $user->favorities = $input['favorities'];
        $user->save();

        return redirect("list")->withSuccess("You have updated success");
    }

    /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.view', ['user' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser(Request $request)
    {

        if(Auth::check()){
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
    
}
