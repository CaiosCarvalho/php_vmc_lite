<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\VendaController;
use App\Models\Venda;

class VendaControllerTest extends TestCase {
    private $db;
    private $controller;

    protected function setUp(): void {
        $config = require 'config/database.php';
        $dsn = "pgsql:host={$config['host']};dbname={$config['dbname']}";
        $this->db = new PDO($dsn, $config['user'], $config['password']);
        $this->controller = new VendaController($this->db);
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
        ob_start();
        $this->controller->create();
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
