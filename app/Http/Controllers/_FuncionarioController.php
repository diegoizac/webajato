<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Http\Request;

use Laraerp\Contracts\Repositories\RoleRepository;
use Laraerp\Contracts\Repositories\FuncionarioRepository;
use Laraerp\Contracts\Repositories\DepartamentoRepository;
use Laraerp\Contracts\Repositories\CargoRepository;
use Laraerp\Contracts\Repositories\SetorRepository;
use Laraerp\Contracts\Repositories\EmpresaRepository;
use Laraerp\Contracts\Repositories\CurriculoRepository;
use Laraerp\Contracts\Repositories\ContatoRepository;
use Laraerp\Contracts\Repositories\EnderecoRepository;
use Laraerp\Contracts\Repositories\CodigosInternosRepository;
use Laraerp\Http\Requests\PessoaSalvarRequest;


class FuncionarioController extends Controller
{
    /**
     * Repositorio de funcionarios
     *
     * @var FuncionarioRepository
     */
    private $funcionarioRepository;

    /**
     * FuncionarioController constructor.
     *
     * @param $funcionarioRepository
     */
    public function __construct(FuncionarioRepository $funcionarioRepository)
    {
        $this->funcionarioRepository = $funcionarioRepository;
    }

    /**
     * Exibe uma lista de funcionarios cadastrados
     *
     * @return View
     */
    public function index(Request $request) {

        //Filtro
        $like = $request->get('like');
        $limit = $request->get('limit', 15);

        //Order
        $order = $request->get('order', 'ASC');
        $by = $request->get('by', 'pessoa.nome');

        //Buscando todos os funcionários
        $funcionarios = $this->funcionarioRepository
            ->order($by, $order)
            ->whereLike($like)
            ->paginate($limit);


        return view('funcionario.index', compact('funcionarios'));
    }

    /**
     * Exibe formulário para criação funcionario
     *
     * @return Response
     */
    public function form(RoleRepository $roleRepository,EmpresaRepository $empresaRepository,DepartamentoRepository $departamentoRepository,CargoRepository $cargoRepository,SetorRepository $setorRepository) {
        $limit=15;
        /*
         * Buscando funcionario pelo ID
         */

        $empresas = $empresaRepository->all();
        $departamentos = $departamentoRepository->all();
        $cargos = $cargoRepository->all();
        $setores = $setorRepository->all();
        $roles = $roleRepository->paginate($limit);

        return view('funcionario.form',compact('roles','empresas','departamentos','cargos','setores'));

    }

    /**
     * Salva um funcionario
     */
//    public function salvar(PessoaSalvarRequest $request, EnderecoRepository $enderecoRepository, ContatoRepository $contatoRepository, FuncionarioRepository $funcionarioRepository, CurriculoRepository $curriculoRepository) {

    public function salvar(PessoaSalvarRequest $request, EnderecoRepository $enderecoRepository, ContatoRepository $contatoRepository, CurriculoRepository $curriculoRepository) {
        /*
         * Parametros
         */
//dd($request->all());
        $params = $request->all();
        $params['empresa_id'] = app('empresa')->id;

        /*
         * Salvando dados do funcionario
         */
//        if (\Utils::isDate($params["data_nascimento"]) !== false) {
//            // valid date
//            $params["data_nascimento"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['data_nascimento']);
//            $params["data_nascimento"]=$params["data_nascimento"]->format("Y-m-d");
//        }else{
//            unset($params["data_nascimento"]);
//        }
        if (\Utils::isDate($params['data_admissao']) !== false) {
            // valid date
            $params['data_admissao']=\Carbon\Carbon::createFromFormat("d/m/Y", $params['data_admissao']);
            $params['data_admissao']=$params['data_admissao']->format("Y-m-d");
        }else{
            unset($params['data_admissao']);
        }
        if (\Utils::isDate($params["data_rescisao"]) !== false) {
            // valid date
            $params["data_rescisao"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['data_rescisao']);
            $params["data_rescisao"]=$params["data_rescisao"]->format("Y-m-d");
        }else{
            unset($params["data_rescisao"]);
        }
        if (\Utils::isDate($params["rg_data_emissao"]) !== false) {
            // valid date
            $params["rg_data_emissao"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['rg_data_emissao']);
            $params["rg_data_emissao"]=$params["rg_data_emissao"]->format("Y-m-d");
        }else{
            unset($params["rg_data_emissao"]);
        }
        if (\Utils::isDate($params["cnh_validade"]) !== false) {
            // valid date
            $params["cnh_validade"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['cnh_validade']);
            $params["cnh_validade"]=$params["cnh_validade"]->format("Y-m-d");
        }else{
            unset($params["cnh_validade"]);
        }
        if (\Utils::isDate($params["data_exame_medico"]) !== false) {
            // valid date
            $params["data_exame_medico"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['data_exame_medico']);
            $params["data_exame_medico"]=$params["data_exame_medico"]->format("Y-m-d");
        }else{
            unset($params["data_exame_medico"]);
        }
            if (\Utils::isDate($params["exame_validade"]) !== false) {
                // valid date
                $params["exame_validade"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['exame_validade']);
                $params["exame_validade"]=$params["exame_validade"]->format("Y-m-d");
            }else{
                unset($params["exame_validade"]);
            }
            if (\Utils::isDate($params["experiencia_inicio"]) !== false) {
                // valid date
                $params["experiencia_inicio"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['experiencia_inicio']);
                $params["experiencia_inicio"]=$params["experiencia_inicio"]->format("Y-m-d");
            }else{
                unset($params["experiencia_inicio"]);
            }
        if (\Utils::isDate($params["experiencia_fim"]) !== false) {
            // valid date
            $params["experiencia_fim"]=\Carbon\Carbon::createFromFormat("d/m/Y", $params['experiencia_fim']);
            $params["experiencia_fim"]=$params["experiencia_fim"]->format("Y-m-d");
        }else{
            unset($params["experiencia_fim"]);
        }
            /*
             * Converte Foto em Binário
             */

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            //$name = uniqid(date('HisYmd')); define nome único
            // Faz o upload:
            $params['foto'] = file_get_contents($request->file('foto'));
        }

        //dd($request);
        //header('content-type:application/pdf');




        $funcionarios = $this->funcionarioRepository->save($params);

        if ($request->hasFile('upload_file') && $request->file('upload_file')->isValid()) {

            $curriculo['upload_file'] = file_get_contents($request->file('upload_file'));
            $curriculo['extensao']=$request->file('upload_file')->getClientOriginalExtension();
            $curriculo['upload_file']=addslashes($curriculo['upload_file']);
            $curriculo['pessoa_id'] = $funcionarios->pessoa_id;
            //dd($curriculo);
            //$curriculoRepository->save($curriculo);
            //dd("auiiiiiiiiiiiiiiiiiiiiiiiiiii");
        }

//dd($params);


        /*
         *
         * Salvando endereço
         */
        if($request->enderecoPreenchido()) {
            $endereco = $request->get('endereco');
            $endereco['pessoa_id'] = $funcionarios->pessoa_id;

//            $enderecoRepository->save($endereco);
        }



        /*
         * Salvando contato
         */
        if($request->contatoPreenchido()) {
            $contato = $request->get('contato');
            $contato['pessoa_id'] = $funcionarios->pessoa_id;

//            $contatoRepository->save($contato);
        }


        /*
         * Salvando Dados Profissionais
         */

          //$user['name']=$params['user']['name'];
    	  //$user['email']=$params['user']['email'];
    	  //$user['pessoa_id']=app('empresa')->id;
          //$usernew=$userRepository->save($user);
          //$params['user_id'] = $usernew->id;
          //salva as permissoes
          //$usernew->roles()->attach($params['tipo']);
          //salva as permissoes
          //$user_roles['role_id']=$params['tipo'];            
         
          //$user_roles['user_id']=$usernew->id;
          //$user_role=$roleuserRepository->save($user_roles); 
        /*
         * Salvando dados do funcionario
         */
         //dd($params);
    //    $funcionarios = $this->funcionarioRepository->save($params);
        /*
         * Redirecionando
         */
        return redirect(route('funcionarios.index', $funcionarios->id))->with('alert', 'O funcionário foi salvo com sucesso!');

    }

    /**
     * Visualiza um funcionário
     *
     * @return Response
     */
    public function ver($id,CodigosInternosRepository $codigosinternosRepository, RoleRepository $roleRepository,EmpresaRepository $empresaRepository,DepartamentoRepository $departamentoRepository,CargoRepository $cargoRepository,SetorRepository $setorRepository) {
        $limit=15;
        /*
         * Buscando cliente pelo ID
         */
        $funcionarios = $this->funcionarioRepository->getById($id);
        $ci = $codigosinternosRepository->whereTipo('05');
        $empresas = $empresaRepository->all();
        $departamentos = $departamentoRepository->all();
        $cargos = $cargoRepository->all();
        $setores = $setorRepository->all();
        $roles = $roleRepository->paginate($limit);
        if(is_null($funcionarios))
            return redirect()->back()->with('erro', 'Funcionário não encontrado');
//        $endereco=$cliente->pessoa->enderecos;
//        dd($endereco);
//        $geocode = app('geocoder')->geocode('rua floriano peixoto 48, sete lagoas')->get();
//
//        dd($geocode);

        return view('funcionario.ver')->with(compact('funcionarios','ci','roles','empresas','departamentos','cargos','setores'));
            // public function ver($id,RoleRepository $roleRepository,EmpresaRepository $empresaRepository,DepartamentoRepository $departamentoRepository,CargoRepository $cargoRepository,SetorRepository $setorRepository) {
            //		$limit=15;
            //        /*
            //         * Buscando funcionario pelo ID
            //         */
            //        $funcionarios = $this->funcionarioRepository->getById($id);
            //        $empresas = $empresaRepository->all();
            //        $departamentos = $departamentoRepository->all();
            //        $cargos = $cargoRepository->all();
            //        $setores = $setorRepository->all();
            //	$roles = $roleRepository->paginate($limit);
            //        if(is_null($funcionarios))
            //            return redirect()->back()->with('erro', 'Funcionario não encontrado');
            //
            //        return redirect(route('funcionarios.ver'))->with(compact('funcionarios','roles','empresas','departamentos','cargos','setores'));
            //    }
    }
    /**
     * Exclui um funcionario
     *
     * @return Response
     */
    public function excluir($id) {

        
        if(!$this->funcionarioRepository->remove($id)){
            return redirect()->back()->with('erro', 'O funcionario não pode ser removido. Verifique se existe algum dado relacionado a ele.');
        }
        return redirect()->back()->with('alert', 'O funcionario foi removido com sucesso');
    }
}

