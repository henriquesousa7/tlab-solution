<?php

use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id_evento';

    protected $allowedFields = ['descricao', 'inicio', 'termino', 'id_criador'];

    public function getEventos()
    {
        return $this->findAll();
    }

    public function getEvento(string $id) 
    {
        $sql = ['id_evento' => $id];

        return $this->where($sql)->first();
    }
}