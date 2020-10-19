<?php namespace App\Controllers;

use EventosModel;
use Exception;
use UsuariosModel;

class Eventos extends BaseController 
{

    public function index()
    {
        $this->callView('mainSystem/loginUsuario/login');
    }

    public function loginResponse()
    {
        if(session()->has('usuario'))
        {
            $this->callView('mainSystem/menuEventos');
        } else {    
            helper('form');
            
            $modelUsuarios = new UsuariosModel();

            $rules = [
                'username' => 'required|min_length[6]|max_length[25]',
                'password' => 'required|min_length[8]|max_length[40]'
            ];

            
            if ($this->validate($rules)) {

                $usuario = $this->request->getVar('username');
                $senha = $this->request->getVar('password');

                $data = $modelUsuarios->getUsuario($usuario);

                if ($data) {
                    if(password_verify($senha, $data['senha'])){
                        session()->set([
                            'usuario' => $usuario,
                            'senha' => $data['senha']
                        ]);
                        $this->callView('mainSystem/menuEventos');
                    }else{
                        $this->callView('mainSystem/loginUsuario/loginError');
                    }
                    
                } else {
                    $this->callView('mainSystem/loginUsuario/loginError');
                }
            } else {
                $this->callView('mainSystem/loginUsuario/loginError');
            }
        }
    }

    public function register()
    {
        $this->callView('mainSystem/cadastroUsuario/registrar');
    }

    public function registerResponse()
    {
        helper('form');

        $model = new UsuariosModel();
        
        $rules = [
            'username' => 'required|min_length[6]',
            'email' => 'required|min_length[6]|max_length[50]',
            'password' => 'required|min_length[8]|max_length[255]'
        ];

        if ($this->validate($rules)) {

            try{
                $model->insert([
                    'usuario' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'senha' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
                ]);
                $this->callView('mainSystem/cadastroUsuario/registrarSucesso');
            }catch(Exception $e){
                $this->callView('mainSystem/cadastroUsuario/registrarErro');
            }
        } else {
            $this->callView('mainSystem/cadastroUsuario/registrarErro');
        }
    }
    

    public function listarEventos()
    {
        $model = new EventosModel();
        $data = ['eventos' => $model->getEventos()];

        $this->callView('mainSystem/listaEventos', $data);

    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/eventos');
    }

    public function addEvento()
    {
        $model = new UsuariosModel();
        $usuario = session()->get('usuario'); 
        $senha = session()->get('senha');
        $data['usuario'] = $model->getUsuario($usuario, $senha);

        $this->callView('mainSystem/adicionarEventos/addEvento', $data);
    }

    public function eventoResponse()
    {
        helper('form');
            
        $model = new EventosModel();

        $rules = [
            'descricao' => 'required|min_length[6]|max_length[100]',
        ];

        $desc = $this->request->getVar('descricao');
        $h_inicio = $this->request->getVar('h_inicio');
        $h_termino = $this->request->getVar('h_termino');
        $id_criador = intval($this->request->getVar('id_criador'));

        if($this->validate($rules))
        {

            try {

                $model->insert([
                    'descricao' => $desc,
                    'inicio' => $h_inicio,
                    'termino' => $h_termino,
                    'id_criador' => $id_criador
                ]);
                $this->callView('mainSystem/adicionarEventos/addEventoSuccess');
            
            }catch(Exception $e){
                $this->callView('mainSystem/adicionarEventos/addEventoError');
            }
        } else {

            $this->callView('mainSystem/adicionarEventos/addEventoError');
        }
    }

    public function excluirEvento(string $id_evento = null)
    {
        $model = new EventosModel();
            
        try{

            $model->delete(['id_evento' => $id_evento]);
            $this->callView('mainSystem/removeEventos/removeSuccess');

        }catch(Exception $e){

            $this->callView('mainSystem/removeEventos/removeError');
        }
    }

    public function editarEvento(string $id_evento = null)
    {
        $model = new EventosModel();
        $data['evento'] = $model->getEvento($id_evento);

        $this->callView('mainSystem/editEventos/editEvento', $data);
    }

    public function editResponse()
    {
        $model = new EventosModel();

        $rules = [
            'descricao' => 'required|min_length[6]|max_length[100]',
        ];

        $desc = $this->request->getVar('descricao');
        $h_inicio = $this->request->getVar('h_inicio');
        $h_termino = $this->request->getVar('h_termino');
        $id_evento = intval($this->request->getVar('id_evento'));

        $data = ['descricao' => $desc, 'inicio' => $h_inicio, 'termino' => $h_termino];

        if($this->validate($rules))
        {
            try{

                $model->update($id_evento, $data);

                $this->callView('mainSystem/editEventos/editSuccess');

            }catch(Exception $e){

                $this->callView('mainSystem/editEventos/editError');
            }
        } else {
            $this->callView('mainSystem/editEventos/editError');
        }
    }

    private function callView(string $path, $data = null){
        if($data === null){
            echo view('templates/header');
            echo view($path);
            echo view('templates/footer');
        }else{
            echo view('templates/header');
            echo view($path, $data);
            echo view('templates/footer');
        }
    }
}
