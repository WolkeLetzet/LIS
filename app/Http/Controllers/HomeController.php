<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    }

    public function guardarNombre(Request $req)
    {
        $req->validate([
            'nombre'=>['required','max:255'],
        ]);
        $user=Auth::user();
        $user->name=$req->nombre;
        $user->save();
        return redirect(route('user.profile'));
    }

    public function savePassword(Request $request) {
        

        $this->validator($request->all())->validate();

        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Contraseña Cambiada con Exito");
    }

    private function validator($data)
    {
       return Validator::make($data,[
            'current-password'=>['required','string','min:8','max:255',function($attribute,$value,$fail){
                if (!(Hash::check($value, Auth::user()->password))){
                    $fail('La contraseña ingresada no coincide con la actual');
                }
            }],
            'new-password'=>['required', 'string', 'min:8','max:255', 'confirmed','different:current-password'],
        ],$messages=[
            'required'=> 'La contraseña es obligatoria',
            'min'=> 'La constraseña de ser de un largo minimo de :min caracteres',
            'max'=> 'La contraseña de ser de un largo maximo de :max caracteres',
            'confirmed'=>'La confirmacion de la nueva contraseña no coincide',
            'different'=> 'La contraseña nueva debe ser diferente que la contraseña actual',

        ]);
    }

    public function showChangePassword() {
        return view('auth.passwords.change');
    }
}
