<?php

namespace App\Models;

use PDO;

class Produto {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM produtos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nome, $tipo_id, $preco) {
        $stmt = $this->db->prepare("INSERT INTO produtos (nome, tipo_id, preco) VALUES (:nome, :tipo_id, :preco)");
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo_id', $tipo_id);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function update($id, $nome, $tipo_id, $preco) {
        $stmt = $this->db->prepare("UPDATE produtos SET nome = :nome, tipo_id = :tipo_id, preco = :preco WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tipo_id', $tipo_id);
        $stmt->bindParam(':preco', $preco);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
