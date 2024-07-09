<?php

class Producto {
private $id;
private $nombre;
private $descripcion;
private $precio;
private $categoria_id;
private $conn;

public function __construct($conn) {
    $this->conn = $conn;
}

public function setId($id) {
    $this->id = $id;
}

public function getId() {
    return $this->id;
}

public function setNombre($nombre) {
    $this->nombre = $nombre;
}

public function getNombre() {
    return $this->nombre;
}

public function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

public function getDescripcion() {
    return $this->descripcion;
}

public function setPrecio($precio) {
    $this->precio = $precio;
}

public function getPrecio() {
    return $this->precio;
}

public function setCategoriaId($categoria_id) {
    $this->categoria_id = $categoria_id;
}

public function getCategoriaId() {
    return $this->categoria_id;
}

public function insert() {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria_id) VALUES (:nombre, :descripcion, :precio, :categoria_id)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':descripcion', $this->descripcion);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':categoria_id', $this->categoria_id);
    return $stmt->execute();
}

public function select($id) {
       $sql = "SELECT * FROM productos WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update() {
        $sql = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, categoria_id = :categoria_id WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':descripcion', $this->descripcion);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':categoria_id', $this->categoria_id);
    $stmt->bindParam(':id', $this->id);
    return $stmt->execute();
}

public function delete($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    return $stmt->execute();
}
}