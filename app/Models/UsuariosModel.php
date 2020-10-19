<?php

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

    protected $allowedFields = ['usuario', 'senha', 'email'];

    public function getUsuario(string $usuario = null, string $senha = null) 
    {
        if($senha === null){

            $sql = ['usuario' => $usuario];
            return $this->where($sql)->first();
        }

        $sql = ['usuario' => $usuario, 'senha' => $senha];

        return $this->where($sql)->first();
    }
}