<?php

namespace App\Http\Controllers;
use App\Models\User;
use Faker\Generator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Container\Container;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $faker=Container::getInstance()->make(Generator::class);
        return view('user.admin.create')->with('example',$faker)
        ->with('roles',Role::all('id','name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $this->userRegValidator($req->all())->validate();

        $user = User::create([
            'name' => $req->get('name'),
            'email' => $req->get('email'),
            'password' => Hash::make($req->get('password')),
        ]);
        if ($req->roles) {
            $user->syncRoles($req->roles);
        } 


        return redirect(route('user.create'))->with("success","Usuario Creado Exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        return view('user.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function userRegValidator($data)
    {
        return Validator::make($data,[
            "name"=>'required|string|max:255',
            "email"=>'required|string|email|max:255|unique:users',
            "password"=>['required','string','min:8','confirmed']

        ],[
            "required"=>"Este campo es obligatorio",
            "min"=> "La contraseña debe medir almenos :min caracteres",
            "confirmed"=>"Las contraseñas no coinciden",
            "unique"=>"Este :attribute ya esta en uso",
        ]);
    }
}
