<?php

use PHPUnit\Framework\TestCase;
use App\Models\Produto;

class ProdutoTest extends TestCase {
    private $db;
    private $model;

    protected function setUp(): void {
        $config = require 'config/database.php';
        $dsn = "pgsql:host={$config['host']};dbname={$config['dbname']}";
        $this->db = new PDO($dsn, $config['user'], $config['password']);
        $this->model = new Produto($this->db);
    }

    public function testCreate() {
        $result = $this->model->create('Produto Teste', 1, 10.00);
        $this->assertTrue($result);
    }

    public function testGetAll() {
        $result = $this->model->getAll();
        $this->assertIsArray($result);
    }

    public function testGetById() {
        $result = $this->model->getById(1);
        $this->assertIsArray($result);
    }

    public function testUpdate() {
        $result = $this->model->update(1, 'Produto Atualizado', 1, 15.00);
        $this->assertTrue($result);
    }

    public function testDelete() {
        $result = $this->model->delete(1);
        $this->assertTrue($result);
    }
}
