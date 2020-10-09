<?php

use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id_evento';

    protected $allowedFields = ['descricao', 'inicio', 'termino'];

    public function getEventos()
    {
        return $this->findAll();
    }
}