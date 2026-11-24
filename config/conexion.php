<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Carga el archivo .env desde la raíz del proyecto
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Usa las variables con $_ENV
$host = $_ENV['DB_HOST'];
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];

// Ejemplo de conexión PDO
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);