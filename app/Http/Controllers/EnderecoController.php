<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    public function index()
    {
        $enderecos = Endereco::all();
        $total = Endereco::all()->count();
        return view('list-enderecos', compact('enderecos', 'total'));
    }

    public function create()
    {
        return view('include-endereco');
    }

    /**
     *
     * @param
     * @return
     *
     */
    public function store(Request $request)
    {
        $address = new Endereco;
        $address->pessoa_id = $request->pessoa_id;
        $address->cep = $request->cep;
        $address->logradouro = $request->logradouro;
        $address->numero = $request->numero;
        $address->complemento = $request->complemento;
        $address->bairro = $request->bairro;
        $address->cidade_id = $request->cidade_id;
        $address->tipo = $request->tipo;
        $address->save();
        return redirect()->route('address.index')->with('message', 'Endereço criado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $address = Endereco::findOrFail($id);
        return view('alter-endereco', compact('address'));
    }

    public function update(Request $request, $id)
    {
        $address = Endereco::findOrFail($id);
        $address->pessoa_id = $request->pessoa_id;
        $address->cep = $request->cep;
        $address->logradouro = $request->logradouro;
        $address->numero = $request->numero;
        $address->complemento = $request->complemento;
        $address->bairro = $request->bairro;
        $address->cidade_id = $request->cidade_id;
        $address->tipo = $request->tipo;
        $address->save();
        return redirect()->route('address.index')->with('message', ';Endereço alterado com sucesso!');
    }

    public function destroy($id)
    {
        $address = Endereco::findOrFail($id);
        $address->delete();
        return redirect()->route('address.index')->with('message', 'Endereço excluído com sucesso!');
    }
}





