<?php

namespace App\Core;

use App\Controllers\TipoProdutoController;
use App\Controllers\ProdutoController;
use App\Controllers\VendaController;
use App\Controllers\VendaProdutoController;
use Bramus\Router\Router as BramusRouter;

class Router
{
    private $db;
    private $router;

    public function __construct($db)
    {
        $this->db = $db;
        $this->router = new BramusRouter();
        $this->defineRoutes();
    }
    

    private function defineRoutes()
    {
        $this->router->get('/', function() {
            echo 'Hello, world!';
        });
        
        $this->router->get('/tipos_produtos', function() {
            (new TipoProdutoController($this->db))->index();
        });

        $this->router->get('/tipos_produtos/(\d+)', function($id) {
            (new TipoProdutoController($this->db))->show($id);
        });

        $this->router->post('/tipos_produtos', function() {
            (new TipoProdutoController($this->db))->create();
        });

        $this->router->put('/tipos_produtos/(\d+)', function($id) {
            (new TipoProdutoController($this->db))->update($id);
        });

        $this->router->delete('/tipos_produtos/(\d+)', function($id) {
            (new TipoProdutoController($this->db))->delete($id);
        });

        $this->router->get('/produtos', function() {
            (new ProdutoController($this->db))->index();
        });

        $this->router->get('/produtos/(\d+)', function($id) {
            (new ProdutoController($this->db))->show($id);
        });

        $this->router->post('/produtos', function() {
            (new ProdutoController($this->db))->create();
        });

        $this->router->put('/produtos/(\d+)', function($id) {
            (new ProdutoController($this->db))->update($id);
        });

        $this->router->delete('/produtos/(\d+)', function($id) {
            (new ProdutoController($this->db))->delete($id);
        });

        $this->router->get('/vendas', function() {
            (new VendaController($this->db))->index();
        });

        $this->router->get('/vendas/(\d+)', function($id) {
            (new VendaController($this->db))->show($id);
        });

        $this->router->post('/vendas', function() {
            (new VendaController($this->db))->create();
        });

        $this->router->delete('/vendas/(\d+)', function($id) {
            (new VendaController($this->db))->delete($id);
        });

        $this->router->get('/venda_produtos', function() {
            (new VendaProdutoController($this->db))->index();
        });

        $this->router->get('/venda_produtos/(\d+)', function($id) {
            (new VendaProdutoController($this->db))->show($id);
        });

        $this->router->post('/venda_produtos', function() {
            (new VendaProdutoController($this->db))->create();
        });

        $this->router->put('/venda_produtos/(\d+)', function($id) {
            (new VendaProdutoController($this->db))->update($id);
        });

        $this->router->delete('/venda_produtos/(\d+)', function($id) {
            (new VendaProdutoController($this->db))->delete($id);
        });
    }

    public function run()
    {
        $this->router->run();
    }
}
