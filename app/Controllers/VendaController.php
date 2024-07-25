<?php

namespace App\Controllers;

use App\Models\Venda;

class VendaController {
    private $model;

    public function __construct($db) {
        $this->model = new Venda($db);
    }

    public function index() {
        $vendas = $this->model->getAll();
        echo json_encode($vendas);
    }

    public function show($id) {
        $venda = $this->model->getById($id);
        echo json_encode($venda);
    }

    public function create() {
        $venda = $this->model->create();
        echo json_encode(['status' => 'success', 'id' => $venda['id']]);
    }

    public function delete($id) {
        $this->model->delete($id);
        echo json_encode(['status' => 'success']);
    }
}
