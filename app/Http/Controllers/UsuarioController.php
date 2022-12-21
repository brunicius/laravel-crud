<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    //
    public function index()
    {
        $usuarios = User::all();
        return view('usuario.list', [
            'usuarios' => $usuarios
        ]);
    }

    public function create()
    {
        return view('nota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'unique:notas'],
            'nota' => ['required'],
        ], [
            'titulo.required' => 'O título é obrigatório.',
            'titulo.unique' => 'A nota já está cadastrada.',
        ]);

        $novaNota = $request->all();
        $notaFoto = $request->file('foto');
        $dir = '';

        if (isset($notaFoto)) {
            $dir = $notaFoto->store('/', 'public');
            $novaNota['foto'] = $dir;
        }

        Nota::create($novaNota);

        return redirect('/notas');
    }

    public function show(Request $request, $id)
    {
        return view('nota.edit', ['nota' => Nota::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => ['required', Rule::unique('notas')->ignore($request['titulo'], 'titulo')],
            'nota' => ['required'],
        ], [
            'titulo.required' => 'O título é obrigatório.',
            'titulo.unique' => 'A nota já está cadastrada.',
        ]);

        $oldNota = Nota::find($id);

        $novaNota = $request->all();
        $notaFoto = $request->file('foto');
        $dir = $oldNota['foto'];

        if (isset($notaFoto)) {
            $dir = $notaFoto->store('/', 'public');
            $novaNota['foto'] = $dir;
        }

        $oldNota->fill($novaNota);

        $oldNota->save();

        return view('nota.list', ['notas' => Nota::all()])->with('message', 'Nota atualizada com sucesso!');
    }

    public function destroy(Request $request, $id)
    {
        Nota::destroy($id);

        return view('nota.list', ['notas' => Nota::all()])->with('message', 'Nota excluída com sucesso!');
    }
}