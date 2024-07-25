<?php

namespace App\Controllers;

use App\Models\Produto;

class ProdutoController {
    private $model;

    public function __construct($db) {
        $this->model = new Produto($db);
    }

    public function index() {
        $produtos = $this->model->getAll();
        echo json_encode($produtos);
    }

    public function show($id) {
        $produto = $this->model->getById($id);
        echo json_encode($produto);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $nome = $data['nome'];
        $tipo_id = $data['tipo_id'];
        $preco = $data['preco'];
        $this->model->create($nome, $tipo_id, $preco);
        echo json_encode(['status' => 'success']);
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $nome = $data['nome'];
        $tipo_id = $data['tipo_id'];
        $preco = $data['preco'];
        $this->model->update($id, $nome, $tipo_id, $preco);
        echo json_encode(['status' => 'success']);
    }

    public function delete($id) {
        $this->model->delete($id);
        echo json_encode(['status' => 'success']);
    }
}
