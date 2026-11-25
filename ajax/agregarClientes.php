<?php

require_once __DIR__ . '/../config/conexion.php';

if (isset($_GET['getClientes'])) {
    $con = new DB();
    $usuarios = $con->select("SELECT t1.id_cliente,t1.nombres_cliente,t1.apellidos_clientes,t1.numero_documento, t1.estado_civil,t1.limite_credito,t3.numero,t2.descripcion_nacionalidad, t1.estado 
    FROM clientes t1 INNER JOIN nacionalidades t2 on t1.nacionalidades_id=t2.id_nacionalidad INNER JOIN clientes_telefonos t3 on t3.clientes_id=t1.id_cliente 
    WHERE t3.principal=1;");
    echo json_encode(array('data' => $usuarios));

    //print_r($usuarios);

    // foreach ($usuarios as $usuario) {
    //     echo $usuario['nombres_cliente'] . "<br>";
    // }

}
