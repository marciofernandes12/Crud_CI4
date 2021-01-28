<?php

namespace App\Controllers;

use CodeIgniter\Database\Query;
use CodeIgniter\Controller;
use App\Models\Contato_Model;
use App\Models\Grupo_Model;

class Home extends Controller
{


    public function index()
    {


        return view('welcome_message');

    }

    public function cadastroContato()
    {

        return view('formContato');


    }

    public function cadastroGrupo()
    {
        return view('formGrupo');

    }

    public function cadastrarContato()
    {
        $stringTelefone = "";
        $stringEmail = "";
        $telefones = $this->request->getPostGet('telefoneContato');
        foreach ($telefones as $telefone) {

            $stringTelefone .= $telefone . ";";
        }
        $emails = $this->request->getPostGet('emailContato');
        foreach ($emails as $email) {

            $stringEmail .= $email . ";";
        }


        $modelContato = new \Contato_Model();
        $data = [
            'nome' => $this->request->getVar('nomeContato'),
            'email' => $stringEmail,
            'telefone' => $stringTelefone,
            'id_grupo' => $this->request->getVar('grupoContato'),

        ];
        $modelContato->insert($data);


        return $this->response->redirect(base_url('listagem'));
    }

    public function cadastrarGrupo()
    {
        $modelContato = new \Grupo_Model();
        $data = [
            'nome' => $this->request->getVar('nomeGrupo'),
            'descricao' => $this->request->getVar('descGrupo'),
        ];
        $modelContato->insert($data);
        return $this->response->redirect(base_url('listagem'));
    }

    public function recuperaContato($id_contato = null)
    {
        $modelContato = new \Contato_Model();
        $data['contato'] = $modelContato->where('id_contato', $id_contato)->first();

        return view('editaContato', $data);

    }

    public function recuperaGrupo($id_grupo = null)
    {
        $modelGrupo = new \Grupo_Model();
        $data['grupo'] = $modelGrupo->where('id_grupo', $id_grupo)->first();
        return view('editaGrupo', $data);

    }

    public function editarContato()
    {
        $stringTelefone = "";
        $stringEmail = "";
        $telefones = $this->request->getPostGet('telefoneContato');
        foreach ($telefones as $telefone) {

            $stringTelefone .= $telefone . ";";
        }
        $emails = $this->request->getPostGet('emailContato');
        foreach ($emails as $email) {

            $stringEmail .= $email . ";";
        }


        $modelContato = new \Contato_Model();
        $id_contato = $this->request->getVar('id_contato');
        $data = [
            'nome' => $this->request->getVar('nomeContato'),
            'email' => $stringEmail,
            'telefone' => $stringTelefone
        ];
        $modelContato->update($id_contato, $data);
        return $this->response->redirect(base_url('listagem'));
    }

    public function editarGrupo()
    {

        $modelGrupo = new \Grupo_Model();
        $id_grupo = $this->request->getVar('id_grupo');
        $data = [
            'nome' => $this->request->getVar('nomeGrupo'),
            'descricao' => $this->request->getVar('descGrupo'),

        ];
        $modelGrupo->update($id_grupo, $data);
        return $this->response->redirect(base_url('listagem'));
    }


    public function listar()
    {
        $modelContato = new \Contato_Model();
        $data['contatos'] = $modelContato->findAll();
        $modelGrupo = new \Grupo_Model();
        $data['grupos'] = $modelGrupo->findAll();
        return view('Listagem', $data);

    }

    public function deletarContato($id_contato = null)
    {
        $modelContato = new \Contato_Model();
        $data['contatos'] = $modelContato->where('id_contato', $id_contato)->delete($id_contato);
        return $this->response->redirect(base_url('listagem'));
    }

    public function deletarGrupo($id_grupo = null)
    {
        $modelGrupo = new \Grupo_Model();
        $data['grupos'] = $modelGrupo->where('id_grupo', $id_grupo)->delete($id_grupo);
        return $this->response->redirect(base_url('listagem'));

    }

    public function ajax_load_grupo()
    {
        $modelGrupo = new \Grupo_Model();
        $data = $modelGrupo->findAll();

        echo json_encode($data);


    }

    public function ajax_buscar_contato()
    {
        $input = $this->request->getPostGet('input');


        $modelContato = new \Contato_Model();
        $builder = $modelContato->asArray()->like('nome', "$input")->find();
        echo json_encode($builder);

    }


    //--------------------------------------------------------------------

}
