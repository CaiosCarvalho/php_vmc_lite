<?php

namespace App\Models;

use PDO;

class VendaProduto {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM venda_produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM venda_produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($venda_id, $produto_id, $quantidade, $imposto_total) {
        $stmt = $this->db->prepare("INSERT INTO venda_produtos (venda_id, produto_id, quantidade, imposto_total) VALUES (:venda_id, :produto_id, :quantidade, :imposto_total)");
        $stmt->bindParam(':venda_id', $venda_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':imposto_total', $imposto_total);
        return $stmt->execute();
    }

    public function update($id, $venda_id, $produto_id, $quantidade, $imposto_total) {
        $stmt = $this->db->prepare("UPDATE venda_produtos SET venda_id = :venda_id, produto_id = :produto_id, quantidade = :quantidade, imposto_total = :imposto_total WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':venda_id', $venda_id);
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':imposto_total', $imposto_total);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM venda_produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
