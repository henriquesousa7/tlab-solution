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

        if ($this->validate($rules)) 
        {
            $model->insert([
                'usuario' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'senha' => $this->request->getVar('password')
            ]);
            echo view('templates/header');
            echo view('mainSystem/registrarSucesso');
            echo view('templates/footer');
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
}