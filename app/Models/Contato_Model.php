<?php
use CodeIgniter\Model;

class Contato_Model extends Model
{
    protected $table = 'contatos';

    protected $primaryKey = 'id_contato';

    protected $allowedFields = ['nome', 'email','telefone','removido','id_grupo'];



}