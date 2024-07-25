<?php

namespace App\Models;

use PDO;

class TipoProduto {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM tipos_produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tipos_produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $imposto_percentual) {
        $stmt = $this->db->prepare("INSERT INTO tipos_produtos (nome, imposto_percentual) VALUES (:nome, :imposto_percentual)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':imposto_percentual', $imposto_percentual);
        return $stmt->execute();
    }

    public function update($id, $nome, $imposto_percentual) {
        $stmt = $this->db->prepare("UPDATE tipos_produtos SET nome = :nome, imposto_percentual = :imposto_percentual WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':imposto_percentual', $imposto_percentual);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM tipos_produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
