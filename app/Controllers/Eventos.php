<?php namespace App\Controllers;

use EventosModel;
use UsuariosModel;

class Eventos extends BaseController 
{

    public function index()
    {
        echo view('templates/header');
        echo view('mainSystem/login');
        echo view('templates/footer');
    }

    public function loginResponse()
    {
        if(session()->has('usuario'))
        {
            echo view('templates/header');
            echo view('mainSystem/menuEventos');
            echo view('templates/footer');
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

                if ($modelUsuarios->getUsuario($usuario, $senha)) {
                    session()->set([
                        'usuario' => $usuario,
                        'senha' => $senha
                    ]);
                    echo view('templates/header');
                    echo view('mainSystem/menuEventos');
                    echo view('templates/footer');
                } else {
                    echo view('templates/header');
                    echo view('mainSystem/loginError');
                    echo view('templates/footer');
                }
            } else {
                echo view('templates/header');
                echo view('mainSystem/loginError');
                echo view('templates/footer');
            }
        }
    }

    public function register()
    {
        echo view('templates/header');
        echo view('mainSystem/registrar');
        echo view('templates/footer');
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
            $result = $model->insert([
                'usuario' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'senha' => $this->request->getVar('password')
            ]);
            if($result) {
                echo view('templates/header');
                echo view('mainSystem/registrarSucesso');
                echo view('templates/footer');
            }else{
                echo view('templates/header');
                echo view('mainSystem/registrarErro');
                echo view('templates/footer');
            }
        } else {
            echo view('templates/header');
            echo view('mainSystem/registrarErro');
            echo view('templates/footer');
        }
    }
    

    public function listarEventos()
    {
        $model = new EventosModel();
        $data = ['eventos' => $model->getEventos()];

        echo view('templates/header');
        echo view('mainSystem/listaEventos', $data);
        echo view('templates/footer');
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

        echo view('templates/header');
        echo view('mainSystem/adicionarEventos/addEvento', $data);
        echo view('templates/footer');
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
            $result = $model->insert([
                'descricao' => $desc,
                'inicio' => $h_inicio,
                'termino' => $h_termino,
                'id_criador' => $id_criador
            ]);

            if ($result) {
                echo view('templates/header');
                echo view('mainSystem/adicionarEventos/addEventoSuccess');
                echo view('templates/footer');
            } else {
                echo view('templates/header');
                echo view('mainSystem/adicionarEventos/addEventoError');
                echo view('templates/footer');
            }
        } else {
            echo view('templates/header');
            echo view('mainSystem/adicionarEventos/addEventoError');
            echo view('templates/footer');
        }
    }

    public function excluirEvento(string $id_evento = null)
    {
        $model = new EventosModel();

        if($model->delete(['id_evento' => $id_evento])){
            echo view('templates/header');
            echo view('mainSystem/removeEventos/removeSuccess');
            echo view('templates/footer');
        }else{
            echo view('templates/header');
            echo view('mainSystem/removeEventos/removeError');
            echo view('templates/footer');
        }
    }

    public function editarEvento(string $id_evento = null)
    {
        $model = new EventosModel();
        $data['evento'] = $model->getEvento($id_evento);

        echo view('templates/header');
        echo view('mainSystem/editEventos/editEvento', $data);
        echo view('templates/footer');
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
            
            $result = $model->update($id_evento, $data);

            if ($result) {
                echo view('templates/header');
                echo view('mainSystem/editEventos/editSuccess');
                echo view('templates/footer');
            } else {
                echo view('templates/header');
                echo view('mainSystem/editEventos/editError');
                echo view('templates/footer');
            }
        } else {
            echo view('templates/header');
            echo view('mainSystem/editEventos/editError');
            echo view('templates/footer');
        }
    }
}