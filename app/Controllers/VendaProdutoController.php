<?php

namespace App\Controllers;

use App\Models\VendaProduto;

class VendaProdutoController {
    private $model;

    public function __construct($db) {
        $this->model = new VendaProduto($db);
    }

    public function index() {
        $vendaProdutos = $this->model->getAll();
        echo json_encode($vendaProdutos);
    }

    public function show($id) {
        $vendaProduto = $this->model->getById($id);
        echo json_encode($vendaProduto);
    }

    public function create() {
        $data = json_decode(file_get_contents('php://input'), true);
        $venda_id = $data['venda_id'];
        $produto_id = $data['produto_id'];
        $quantidade = $data['quantidade'];
        $imposto_total = $data['imposto_total'];
        $this->model->create($venda_id, $produto_id, $quantidade, $imposto_total);
        echo json_encode(['status' => 'success']);
    }

    public function update($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $venda_id = $data['venda_id'];
        $produto_id = $data['produto_id'];
        $quantidade = $data['quantidade'];
        $imposto_total = $data['imposto_total'];
        $this->model->update($id, $venda_id, $produto_id, $quantidade, $imposto_total);
        echo json_encode(['status' => 'success']);
    }

    public function delete($id) {
        $this->model->delete($id);
        echo json_encode(['status' => 'success']);
    }
}
