<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    public function list() {
			// $list = DB::select('SELECT * FROM tarefas');
			$list = Tarefa::all();

			return view('tarefas.list', [
				'list' => $list
			]);
    }

    public function add() {
			return view('tarefas.add');
    }

    public function addAction(Request $request) {
			$request->validate([
				'titulo' => [ 'required', 'string' ]
			]);

			$titulo = $request->input('titulo');

			// DB::insert('INSERT INTO tarefas (titulo, resolvido) VALUES (:titulo, :resolvido)', [
			// 	'titulo' => $titulo,
			// 	'resolvido' => 0
			// ]);
			$t = new Tarefa;
			$t->titulo = $titulo;
			$t->resolvido = 0;
			$t->save();

			return redirect()->route('tarefas.list');
    }

    public function edit($id) {
			// $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
			// 	'id' => $id
			// ]);
			$t = Tarefa::find($id);

			if($t) {
				return view('tarefas.edit', [
					'data' => $t
				]);
			}else{
				return redirect()->route('tarefas.list');
			}
    }

    public function editAction(Request $request, $id) {
			$request->validate([
				'titulo' => [ 'required', 'string' ]
			]);

			$titulo = $request->input('titulo');

			// DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
			// 	'titulo' => $titulo,
			// 	'id' => $id
			// ]);
			$t = Tarefa::find($id);
			if($t) {
				$t->titulo = $titulo;
				$t->save();
			}

			return redirect()->route('tarefas.list');
    }

    public function del($id) {
			// $data = DB::delete('DELETE FROM tarefas WHERE id = :id', [
			// 	'id' => $id
			// ]);
			$t = Tarefa::find($id);
			if($t) {
				$t->delete();
			}

			return redirect()->route('tarefas.list');
    }

    public function done($id) {
			// DB::update('UPDATE tarefas SET resolvido = 1 - resolvido WHERE id = :id', [
			// 	'id' => $id
			// ]);
			$t = Tarefa::find($id);
			if($t) {
				$t->resolvido = 1 - $t->resolvido;
				$t->save();
			}

			return redirect()->route('tarefas.list');
    }
}
