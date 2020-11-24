<?php

namespace App\Http\Controllers;

use App\Models\Deputy;
use App\Models\Directorate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $userlist = User::all();
        return view('user.user-list',compact('userlist'));
    }


    public function create()
    {
        $directoraties = Directorate::all();
        $roles = Role::all();
        return view('user.add-user',compact('directoraties','roles'));
    }


    public function store(Request $request)
    {

        $deputy_name = Deputy::join('directorates','directorates.deputy_id','=','deputies.deputy_id')
            ->where('directorates.directorate_id',$request['directory_id'])
            ->select('deputy_name')
            ->get();
        $directory_name = Directorate::find($request['directory_id']);


        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'email' => 'required|email|unique:users,email'
        ]);
        $password = Hash::make($request['password']);

        $user = new User();
        $user->name = trim($request['name']);
        $user->email = trim($request['email']);
        $user->position = trim($request['position']);
        $user->password = $password;
        $user->directory_id = trim($request['directory_id']);
        $user->directory_name = $directory_name->directorate_name;
        $user->deputy_name = $deputy_name[0]->deputy_name;
        $user->save();

        $user->assignRole($request['role_id']);

        if ($user) {
            return redirect()->route('users.index');
        } else {
            return redirect()->back();
        }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $user = User::find($id);
        $directoraties = Directorate::all();
        $roles = Role::all();
        return view('user.edit-user',compact('user','directoraties','roles'));
    }


    public function update(Request $request, $id)
    {

        if($request['password'] == '' || $request['password'] == null){
            $password = $request['oldpassword'];
        }else{
            $password = Hash::make($request['password']);
        }

        $deputy_name = Deputy::join('directorates','directorates.deputy_id','=','deputies.deputy_id')
            ->where('directorates.directorate_id',$request['directory_id'])
            ->select('deputy_name')
            ->get();
        $directory_name = Directorate::find($request['directory_id']);

        $update = User::where('id',$id)->update([

            'name' => $request['name'],
            'position' => $request['position'],
            'email' => $request['email'],
            'password' => $password,
            'directory_id' => $request['directory_id'],
            'directory_name' => $directory_name->directorate_name,
            'deputy_name' => $deputy_name[0]->deputy_name
        ]);

        $delete_role = DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user = User::find($id);
        $user->assignRole($request['role_id']);

        if ($update) {
            return redirect()->route('users.index');
        } else {
            return redirect()->back();
        }

    }


    public function destroy($id)
    {
        $finduser = User::find($id);
        $finduser->delete();
        return redirect()->back();
    }
}
