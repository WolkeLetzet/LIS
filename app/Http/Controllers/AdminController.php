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




    public function userRoleEdit($id)
    {

        return view('user.admin.roles.edit')->with('user',User::find($id))->with('roles',Role::get('name'));
    }

    public function userRoleUpdate(Request $req,$id)
    {
        $roles = $req->roles;
        $user=User::find($id);

        if($roles){
            $user->syncRoles($roles);
        }else{
            $user->syncRoles([]);
        }

        return redirect(route('user.cursos'))->with('success','Cambios Hechos con Exito');
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
