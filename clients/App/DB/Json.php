<?php
namespace App\DB;

use Ramsey\Uuid\Uuid;

class Json implements DataBase {

    private $data;
    
    public function __construct()
    {
        if (!file_exists(__DIR__ .'/data.json')) {
            file_put_contents(__DIR__ .'/data.json', json_encode([]));
        }

        $this->data = json_decode(file_get_contents(__DIR__ .'/data.json'), 1);
    }

    public function __destruct()
    {
        file_put_contents(__DIR__ .'/data.json', json_encode($this->data));
    }


    function create(array $clientData) : void
    {
        $id = $uuid = Uuid::uuid4()->toString();
        $clientData['id'] = $id;
        $this->data[] = $clientData;
    }

    function update(int $clientId, array $clientData) : void{}

    function delete(int $clientId) : void{}

    function show(int $clientId) : array{}
    
    function showAll() : array{}

}