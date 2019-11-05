<?php

require_once(SITE_ROOT.'app/model/Client.php');

class ClientsController extends Controller
{
 
    /**
     * Lista os client
     */
    public function list()
    {
        $clients = Client::all();
        return $this->view('grade', ['clients' => $clients]);
    }
 
    /**
     * Mostrar formulario para criar um novo client
     */
    public function create()
    {
        return $this->view('form');
    }
 
    /**
     * Mostrar formulário para editar um client
     */
    public function edit($data)
    {
        $id      = (int) $data['id'];
        $client = Client::find($id);
 
        return $this->view('form', ['client' => $client]);
    }
 
    /**
     * Salvar o client submetido pelo formulário
     */
    public function save()
    {
        $client           = new Client;
        $client->name     = $this->request->name;
        $client->phone = $this->request->phone;
        $client->email = $this->request->email;
        if ($client->save()) {
            return $this->list();
        }
    }
 
    /**
     * Atualizar o client conforme dados submetidos
     */
    public function refresh($data)
    {
        $id                = (int) $data['id'];
        $client           = Client::find($id);
        $client->name     = $this->request->name;
        $client->phone = $this->request->phone;
        $client->email = $this->request->email;
        $client->save();
 
        return $this->list();
    }
 
    /**
     * Apagar um client conforme o id informado
     */
    public function delete($data)
    {
        $id      = (int) $data['id'];
        $client = Client::destroy($id);
        return $this->list();
    }
}