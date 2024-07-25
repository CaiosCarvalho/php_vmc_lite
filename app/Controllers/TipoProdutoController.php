<?php

namespace App\Controllers;

use App\Models\TipoProduto;

class TipoProdutoController {
    private $model;

    public function __construct($db) {
        $this->model = new TipoProduto($db);
    }

    public function index() {
        $tipos = $this->model->getAll();
        echo json_encode($tipos);
    }

    public function show($id) {
        $tipo = $this->model->getById($id);
        echo json_encode($tipo);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $nome = $data['nome'];
        $imposto_percentual = $data['imposto_percentual'];
        $this->model->create($nome, $imposto_percentual);
        echo json_encode(['status' => 'success']);
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $nome = $data['nome'];
        $imposto_percentual = $data['imposto_percentual'];
        $this->model->update($id, $nome, $imposto_percentual);
        echo json_encode(['status' => 'success']);
    }

    public function delete($id) {
        $this->model->delete($id);
        echo json_encode(['status' => 'success']);
    }
}
