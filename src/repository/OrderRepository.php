<?php

require_once("vendor/autoload.php");
require_once("src/model/Order.php");

class OrderRepository
{

    private MongoDB\Client $mongo;

    private string $db = "giantmix";

    private string $collection = "commandes";

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


    function save(Order $client): string {
        $result = $this->mongo->selectDatabase($this->db)->selectCollection($this->collection)->insertOne(array(
            "fname" => $client->getFname(),
            "lname" => $client->getLname(),
            "mail" => $client->getMail(),
            "date" => $client->getDate(),
            "itemList" => $client->getItemList()
        ));
        var_dump($result);
        return $result->getInsertedId();

    }

    function listOrders(string $mail, string $fname, string $lname): array {
        $result = $this->mongo
            ->selectDatabase($this->db)
            ->selectCollection($this->collection)
            ->find(['mail' => $mail, 'fname' => $fname, 'lname' => $lname]);

        $orders = array();
        foreach ($result as $entry) {
            $order = new Order($entry["fname"], $entry["lname"], $entry["mail"], $entry["date"], (array) $entry["itemList"]);
            //$order.setId($entry['_id']);
            array_push($orders, $order);
        }
        return $orders;

    }


}