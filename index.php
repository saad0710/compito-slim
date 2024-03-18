<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/negozio', function (Request $request, Response $response, $args) {
    $negozio = new Negozio("Negozio di Elettronica", "0123456789", "Via Roma 123", "http://www.negozioelettronica.com", "8938569869432");
    return $response->withJson($negozio);
});

$app->get('/articoli', function (Request $request, Response $response, $args) {
    $articoli = [
        new Articolo(1, "Smartphone", "Descrizione dello smartphone", 500),
        new Articolo(4, "Laptop", "Descrizione del laptop", 800),
        new Articolo(6, "Tablet", "Descrizione del tablet", 300),
        new Articolo(7, "Computer", "Descrizione del computer", 1000)
    ];
    return $response->withJson($articoli);
});

$app->get('/articoli/{id}', function (Request $request, Response $response, $args){
    $id = $args['id'];
    $articolo = new Articolo($id, "Nome Articolo", "Descrizione articolo", 100);
    return $response->withJson($articolo);
});

$app->get('/ordini', function (Request $request, Response $response, $args){
    $ordini = [
        new Ordine(654,"1/1/2024",300),
        new Ordine(123,"2/1/2024",500),
        new Ordine(957,"3/1/2024",100)
    ];
    return $response->withJson($ordini);
});

$app->get('/ordini/{numero_ordine}', function (Request $request, Response $response, $args){
    $numero_ordine = $args['numero_ordine'];
    $ordine = new Articolo($numero_ordine, "Data ordine", 100);
    return $response->withJson($ordine);
});

$app->get('/ordini/{numero_ordine}/articoli_venduti', function (Request $request, Response $response, $args) {
    $numero_ordine = $args['numero_ordine'];
    $articoli_venduti = [
        ["id" => 1, "prezzo_di_vendita" => 500, "quantita_acquistata" => 2],
        ["id" => 2, "prezzo_di_vendita" => 800, "quantita_acquistata" => 1]
    ];
    return $response->withJson($articoli_venduti);
});

$app->get('/ordini/{numero_ordine}/articoli_venduti/{id}', function (Request $request, Response $response, $args) {
    $numero_ordine = $args['numero_ordine'];
    $id = $args['id'];
    $articolo_venduto = ["id" => $id, "prezzo_di_vendita" => 500, "quantita_acquistata" => 2];
    return $response->withJson($articolo_venduto);
});

$app->run();
