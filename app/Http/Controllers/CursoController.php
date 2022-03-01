<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class CursoController extends Controller
{

    public function index()
    {
        $users=User::available()->get();
        $cursos=Curso::available()->get();
        return view('user.admin.curso.index',compact('users','cursos'));
    }

    public function edit($id,Request $request){
        if($request->search){
            return view('user.admin.curso.edit')->with('user',User::find($id))->with('cursos',Curso::nameQuery($request->search)->get());
        }


        return view('user.admin.curso.edit')->with('user',User::find($id))->with('cursos',Curso::available()->get());

    }

    public function update(Request $request,$id){

        try
        {
            $user=User::findOrFail($id);
            if($request->cursos)
            {
                $user->cursos()->detach();
                foreach ($request->cursos as $curso){
                    $user->cursos()->attach(Curso::find($curso));

                }
            }
        }
        catch (Exception $e)
        {
            return redirect(route('user.cursos'));
        }


        return redirect(route('user.cursos'));
    }


}
