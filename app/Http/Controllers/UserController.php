<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('users.create', Auth::user()))
        {
            $roles=Role::all();
            $permissions=Permission::all();
            return view('user.create', compact('roles','permissions'));
        }else{
            return redirect(route('user.index'))->with('failure', 'Unauthorized access');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);
        
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;


        $user->save();
        $user->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('users.update', Auth::user()))
        {
            $user=User::find($id);
            $roles=Role::all();
            $permissions=Permission::all();
            return view('user.edit', compact('user','roles','permissions'));
        }else
        {
            return redirect(route('user.index'))->with('failure', 'Unauthorized access');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user=User::where('id', $id)->update($request->except('_token', '_method', 'role', 'permission'));
        User::find($id)->roles()->sync($request->role);
        //User::find($id)->permissions()->sync($request->permission);
        return redirect(route('user.index'))->with('message', 'Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('users.delete', Auth::user()))
        {
            User::where('id', $id)->delete();
            return redirect(route('user.index'))->with('message', 'User created successfully');
        }else
        {
            return redirect(route('user.index'))->with('failure', 'Unauthorized access');
        }
    }

    public function permission($id, Request $request)
    {
        $users=User::all();
            foreach($users as $user)
            {
                if($user->id == $id)
                {
                    $role=Role::all();
                    $role->permissions()->sync($request->permission);
                    //$role->save();
                }
            }
        return redirect(route('permission.create'))->with('users', $users);
    }
}
