<?php

use PHPUnit\Framework\TestCase;
use App\Models\Venda;

class VendaTest extends TestCase {
    private $db;
    private $model;

    protected function setUp(): void {
        $config = require 'config/database.php';
        $dsn = "pgsql:host={$config['host']};dbname={$config['dbname']}";
        $this->db = new PDO($dsn, $config['user'], $config['password']);
        $this->model = new Venda($this->db);
    }

    public function testCreate() {
        $result = $this->model->create();
        $this->assertIsArray($result);
    }

    public function testGetAll() {
        $result = $this->model->getAll();
        $this->assertIsArray($result);
    }

    public function testGetById() {
        $result = $this->model->getById(1);
        $this->assertIsArray($result);
    }

    public function testDelete() {
        $result = $this->model->delete(1);
        $this->assertTrue($result);
    }
}
