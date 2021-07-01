<?php

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../model/Product.php';

class ProductRepository {

    private array $localhost = ['http://localhost:9200'];

    private Elasticsearch\Client $client;

    public function __construct() {
        $this->client = Elasticsearch\ClientBuilder::create()
            ->setHosts($this->localhost)
            ->build();
    }

    function findAll(): array {
        $products = array();
        $result = $this->client->search([ 'index' => 'giantmix' ]);
        foreach ($result['hits']['hits'] as $entry) {
            array_push($products, $this->map($entry));
        }
        return $products;
    }

    function findProductById($id): Product { // POUR REDIS
        $params = [
            'index' => 'giantmix',
            'id' => $id
        ];
        return $this->map($this->client->get($params));
    }

    function findProductsByKeyword(string $keyword): array {
        $params = [
            'index' => 'giantmix',
            'body' => [
                'query' => [
                    'multi_match' => [
                        "query" => $keyword,
                        "fields" => ["nom", "fabricant", "prix", 'categorie', 'etat'],
                        "fuzziness" => "AUTO"
                    ]
                ]
            ]
        ];

        $products = array();
        $result = $this->client->search($params);
        foreach ($result['hits']['hits'] as $entry) {
            array_push($products, $this->map($entry));
        }
        return $products;
    }


    function findProductsByMultipleCriterias($nom, $fabricant, $prixmin, $prixmax, $categorie, $etat): array {
        $match = $this->toFilterArray($nom, $fabricant, $prixmin, $prixmax, $categorie, $etat);

        $params = [
            'index' => 'giantmix',
            'body'  => [
                'query' => [
                    'bool' => [
                        'must' => $match,
                    ],
                ]
            ]
        ];

        $products = array();
        $result = $this->client->search($params);
        foreach ($result['hits']['hits'] as $entry) {
            array_push($products, $this->map($entry));
        }

        return $products;
    }

    private function map(array $input): Product {
        $source = $input["_source"];
        return new Product(
            $input["_id"],
            $source["nom"],
            $source["fabricant"],
            $source["prix"],
            $source["categorie"],
            $source["etat"]
        );
    }

    private function toFilterArray($nom, $fabricant, $prixmin, $prixmax, $categorie, $etat): array {
        $match = array();

        if ($nom != "")
            array_push($match, ['match' => ['nom' => $nom] ]);
        if ($fabricant != "")
            array_push($match, ['match' => ['fabricant' => $fabricant] ]);
        if ($categorie != "")
            array_push($match, ['match' => ['categorie' => $categorie] ]);
        if ($etat != "")
            array_push($match, ['match' => ['etat' => $etat] ]);
        if ($prixmin != 0)
            array_push($match, [
                'range' => [
                    'prix' => [
                        'gte' => $prixmin
                    ]
                ]
            ]);
        if ($prixmax != 9999)
            array_push($match, [
                'range' => [
                    'prix' => [
                        'lte' => $prixmax
                    ]
                ]
            ]);

        return $match;
    }
}
