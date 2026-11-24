<?php

require_once __DIR__ . '/../config/conexion.php';

if (isset($_GET['getClientes'])) {

    $stmt = $pdo->prepare("SELECT * FROM clientes");
    $stmt->execute();
    $usuarios = $stmt->fetchAll();

    //print_r($usuarios);

    foreach ($usuarios as $usuario) {
        echo $usuario['nombres_cliente'] . "<br>";
    }
}
