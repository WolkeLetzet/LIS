<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Faker\Generator;
use Spatie\Permission\Models\Role;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function userRoleIndex()
    {
        $users=User::available()->get();
        return view('user.admin.roles.index')->with('users',$users);
    }

    public function userRoleEdit($id)
    {

        return view('user.admin.roles.edit')->with('user',User::find($id))->with('roles',Role::get('name'));
    }

    public function userRoleUpdate(Request $req)
    {
        $roles = $req->roles;
        $users=User::all();

        foreach($users as $user) {

            if (array_key_exists($user->email,$roles)) {
                $user->syncRoles($roles[$user->email]);

            }else{
                $user->syncRoles([]);
            }
        }
        return redirect(route('user.roles.index'))->with('success','Cambios Hechos con Exito');
    }

    public function showUserDelete()
    {

        return view('user.admin.delete')->with('users',User::available()->get());
    }
    public function userDelete (Request $req)
    {
        if($req->users){
            foreach($req->users as $id){
                $user=User::find($id);
                $user->estado=false;
                $user->save();
            }
        }

        return redirect()->to(route('user.role.table'));
    }

    public function test(){
        return view('test')->with('roles',Role::get('name'));
    }

}
