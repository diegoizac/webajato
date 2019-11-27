<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;

class PessoaController extends Controller
{
  public function index()
  {
    $pessoas = Pessoa::all();
    $total = Pessoa::all()->count();
    return view('list-pessoas', compact('pessoas', 'total'));
  }

  public function create()
  {
    return view('include-pessoa');
  }
  /**
   *
   *
   *
   * @param
   * @return
   *
   */
  public function store(Request $request)
  {
      $person = $request->all();
      $person['cpf'] = str_replace(' ', '', str_replace('.', '', str_replace('-', '', $request->cpf)));
      $person['rg'] = str_replace(' ', '', str_replace('.', '', str_replace('-', '', $request->rg)));

      Pessoa::create($person);

    return redirect()->route('person.index')->with('message', 'Pessoa criada com sucesso!');
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    $person = Pessoa::findOrFail($id);
    return view('alter-pessoa', compact('person'));
  }

  public function update(Request $request, $id)
  {
    $person = Pessoa::findOrFail($id);
    $person->nome = $request->nome;
    $person->sobrenome = $request->sobrenome;
    $person->cpf = str_replace(' ', '', str_replace('.', '', str_replace('-', '', $request->cpf)));
    $person->rg = str_replace(' ', '', str_replace('.', '', str_replace('-', '', $request->rg)));
    $person->save();
    return redirect()->route('person.index')->with('message', 'Pessoa alterada com sucesso!');
  }

  public function destroy($id)
  {
    $person = Pessoa::findOrFail($id);
    $person->delete();
    return redirect()->route('person.index')->with('message', 'Pessoa excluída com sucesso!');
  }
}
