<?php

namespace Laraerp\Http\Controllers;

use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Contracts\Repositories\PoaEnderecoRepository;
use Laraerp\Http\Requests\EnderecoSalvarRequest;

class EnderecoController extends Controller
{
    /**
     * Repositorio de endereço
     *
     * @var EnderecoRepository
     */
    private $enderecoRepository,$poaenderecoRepository;
    

    /**
     * EnderecoController constructor.
     *
     * @param $enderecoRepository
     */
    public function __construct(EnderecoRepository $enderecoRepository,PoaEnderecoRepository $poaenderecoRepository)
    {
        $this->enderecoRepository = $enderecoRepository;
        $this->poaenderecoRepository = $poaenderecoRepository;
    }

    /**
     * Salva um endereco
     */
    public function salvar(EnderecoSalvarRequest $request) {
        $tipo=$request->get('endereco')['tipo_id'];
        if ($tipo==2){
    	    $this->poaenderecoRepository->save($request->get('endereco'));
        }else{
    	    $this->enderecoRepository->save($request->get('endereco'));
	}
	
        return redirect()->back()->with('alert', 'O endereço foi salvo com sucesso!');
    }

    /**
     * Exclui um endereco
     *
     * @return Response
     */
    public function excluir($id) {
        if(!$this->enderecoRepository->remove($id))
            return redirect()->back()->with('erro', 'O endereço não pode ser removido. Verifique se existe algum dado relacionado a ele.');
        return redirect()->back()->with('alert', 'O endereço foi removido com sucesso');
    }
    public function excluirnap($id) {
        if(!$this->poaenderecoRepository->remove($id))
            return redirect()->back()->with('erro', 'O endereço não pode ser removido. Verifique se existe algum dado relacionado a ele.');
        return redirect()->back()->with('alert', 'O endereço foi removido com sucesso');
    }
}
