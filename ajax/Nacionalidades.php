<?php

require_once __DIR__ . '/../config/conexion.php';

if (isset($_GET['getNacionalidades'])) {
    $con = new DB();
    $nacionalidades= $con->select("SELECT * FROM nacionalidades");
    echo json_encode(array('data' => $nacionalidades));

}
