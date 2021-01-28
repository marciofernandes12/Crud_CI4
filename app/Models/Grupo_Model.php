<?php
use CodeIgniter\Model;

class Grupo_Model extends Model
{
    protected $table = 'grupos';

    protected $primaryKey = 'id_grupo';

    protected $allowedFields = ['nome', 'descricao'];



}