<?php

require_once("vendor/autoload.php");
require_once("src/model/Client.php");

class ClientRepository {

    private MongoDB\Client $mongo;

    private string $db = "giantmix";

    private string $collection = "clients";

    public function __construct() {
        try {
            $this->mongo = new MongoDB\Client();
            $db = new MongoDB\Database($this->mongo->getManager(), $this->db);
            $collections = array();
            foreach ($db->listCollectionNames() as $collection_name) {
                array_push($collections, $collection_name);
            }
            if (!in_array($this->collection, $collections)) $db->createCollection($this->collection);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function save(Client $client): string {
        $count = $this->mongo
            ->selectDatabase($this->db)
            ->selectCollection($this->collection)
            ->countDocuments(['mail' => $client->getMail()]);
        try {
            if ($count > 0)
                throw new Exception("User already exists.");
            $result = $this->mongo->selectDatabase($this->db)->selectCollection($this->collection)->insertOne(array(
                "fname" => $client->getFname(),
                "lname" => $client->getLname(),
                "mail" => $client->getMail(),
                "pwd" => $client->getPwd()
            ));
            return $result->getInsertedId();
        } catch (Exception $e) {
            return "ERR: " . $e->getMessage();
        }

    }

    function login(string $mail, string $password): string {
        $user = $this->mongo
            ->selectDatabase($this->db)
            ->selectCollection($this->collection)
            ->findOne(array("mail" => $mail, "pwd" => $password));
        if ($user != null) {
            return (string) $user['_id'];
        } else return "NONE";
    }


}
