<?php
namespace App\Controllers;
use App\App;
use App\DB\Json;
use App\Services\Auth;
use App\Services\Messages;

class ClientsController {

    public function __construct()
    {
        if (!Auth::get()->isAuth()) {
            App::redirect('login');
            die;
        }
    }
    
    
    public function index()
    {
        $clients = (new Json)->showAll();
        return App::views('clients/index', [
            'title' => 'Clients List',
            'clients' => $clients
        ]);
    }

    public function create()
    {
        
        return App::views('clients/create', [
            'title' => 'New Client'
        ]);
    }

    public function store()
    {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['tt'] = isset($_POST['tt']) ? 1 : 0;
        (new Json)->create($data);
        Messages::msg()->addMessage('New client was created', 'success');
        return App::redirect('clients');
    }

    public function show($id)
    {
        $client = (new Json)->show($id);

        return App::views('clients/show', [
            'title' => 'Client Page',
            'client' => $client
        ]);
    }

    public function edit($id)
    {
        $client = (new Json)->show($id);

        return App::views('clients/edit', [
            'title' => 'Edit Client',
            'client' => $client
        ]);
    }

    public function update($id)
    {
        $data = [];
        $data['name'] = $_POST['name'];
        $data['surname'] = $_POST['surname'];
        $data['tt'] = isset($_POST['tt']) ? 1 : 0;
        (new Json)->update($id, $data); 
        Messages::msg()->addMessage('New client was edited', 'warning');
        return App::redirect('clients');
    }

    public function delete($id)
    {
        (new Json)->delete($id);
        Messages::msg()->addMessage('The client gone', 'warning');
        return App::redirect('clients');
    }




}