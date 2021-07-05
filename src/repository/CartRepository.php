<?php

require "vendor/predis/predis/autoload.php";
Predis\Autoloader::register();



class CartRepository {

    private Predis\Client $redis;

    public function __construct() {
        try {
            $this->redis = new Predis\Client(array(
                "scheme" => "tcp",
                "host" => "localhost",
                "port" => 6379
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addProduct($produit) {
        //rechercher dans le panier si y a déjà le produit
        if($this->redis->hexists('panier', $produit) == 1){
            $this->redis->hincrby("panier", $produit, 1);
        }
        else {
            $this->redis->hgetall('panier');
            $this->redis->hset('panier', $produit, 1);
        }
        $this->redis->expire('panier', 300);
    }

    public function increment($produit) {
        if($this->redis->hexists('panier', $produit) == 1){
            $this->redis->hincrby("panier", $produit, 1);
        } else {
            echo "Le produit a expiré.";
        }
    }

    public function decrement($produit) {
        if($this->redis->hexists('panier', $produit) == 1){
            if($this->redis->hget("panier", $produit) == 1) {
                $this->redis->hdel("panier", $produit);
            }
            else {
                $this->redis->hincrby("panier", $produit, -1);
            }
        } else {
            echo "Le produit a expiré.";
        }
    }

    public function delete($produit) {
        if($this->redis->hexists('panier', $produit) == 1){
            $this->redis->hdel("panier", $produit);
        } else {
            echo "Le produit a expiré.";
        }
    }

    public function hkeys($param) {
        return $this->redis->hkeys('panier');
    }

    public function hget($key, $param) {
        return $this->redis->hGet($key, $param);
    }

    public function exists($param) {
        return $this->redis->exists($param);
    }

    public function del($param) {
        return $this->redis->del($param);
    }

    public function hgetall($param) {
        return $this->redis->hgetall($param);
    }


}