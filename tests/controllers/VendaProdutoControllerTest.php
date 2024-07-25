<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\VendaProdutoController;
use App\Models\VendaProduto;

class VendaProdutoControllerTest extends TestCase {
    private $db;
    private $controller;

    protected function setUp(): void {
        $config = require 'config/database.php';
        $dsn = "pgsql:host={$config['host']};dbname={$config['dbname']}";
        $this->db = new PDO($dsn, $config['user'], $config['password']);
        $this->controller = new VendaProdutoController($this->db);
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
            'venda_id' => 1,
            'produto_id' => 1,
            'quantidade' => 2,
            'imposto_total' => 1.00
        ];
        ob_start();
        $this->controller->create();
        $output = ob_get_clean();
        $this->assertJson($output);
        $this->assertStringContainsString('success', $output);
    }

    public function testUpdate() {
        $_POST = [
            'venda_id' => 1,
            'produto_id' => 1,
            'quantidade' => 3,
            'imposto_total' => 1.50
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
