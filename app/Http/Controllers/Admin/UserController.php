<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function index()
    {

    }


    public function create()
    {



    }


    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

        $user  = Admin::find($id);

        $active = 'users_edit';

        return view('admin.users.edit', compact(['active', 'user']));

    }


    public function update(Request $request, $id)
    {


        $user = Admin::find($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if(isset($request->current_password) && $request->current_password != ''){

            if (!Hash::check($request->current_password, $user->password)) {

                return back()->withErrors(['incorrect_password' => 'You have entered incorrect current password']);

            }

            $this->validate($request, [
                'password' => 'confirmed',
            ]);

            $user->password = Hash::make($request->password);

        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->save();

        session()->flash('message', 'Your Information has been updated Successfully');

        return back();


    }


    public function destroy($id)
    {
        //
    }
}
