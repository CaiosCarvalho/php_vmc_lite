<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\ProdutoController;
use App\Models\Produto;

class ProdutoControllerTest extends TestCase {
    private $db;
    private $controller;

    protected function setUp(): void {
        $config = require 'config/database.php';
        $dsn = "pgsql:host={$config['host']};dbname={$config['dbname']}";
        $this->db = new PDO($dsn, $config['user'], $config['password']);
        $this->controller = new ProdutoController($this->db);
    }

    public function testIndex() {
        ob_start();
        $this->controller->index();
        $output = ob_get_clean();
        $this->assertJson($output);
    }

    public function testShow() {
        ob_start();
        $this->controller->show(1);
        $output = ob_get_clean();
        $this->assertJson($output);
    }

    public function testCreate() {
        $_POST = [
            'nome' => 'Produto Teste',
            'tipo_id' => 1,
            'preco' => 10.00
        ];
        ob_start();
        $this->controller->create();
        $output = ob_get_clean();
        $this->assertJson($output);
        $this->assertStringContainsString('success', $output);
    }
    

    public function testUpdate() {
        $_POST = [
            'nome' => 'Produto Teste Atualizado',
            'tipo_id' => 1,
            'preco' => 15.00
        ];
        ob_start();
        $this->controller->update(1);
        $output = ob_get_clean();
        $this->assertJson($output);
        $this->assertStringContainsString('success', $output);
    }

    public function testDelete() {
        ob_start();
        $this->controller->delete(1);
        $output = ob_get_clean();
        $this->assertJson($output);
        $this->assertStringContainsString('success', $output);
    }
}
