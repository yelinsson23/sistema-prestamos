<?php

require_once __DIR__ . '/../config/conexion.php';

if (isset($_GET['getClientes'])) {
    $parametros = $_GET['parametros'];
    $rango_min = $parametros['rangoMin'];
    $rango_max = $parametros['rangoMax'];
    $input = $parametros['input'];
    $estado_civil = $parametros['estado_civil'];
    $estado = $parametros['estado'];
    $nacionalidad = $parametros['nacionalidad'];
    $garante = $parametros['garante'];


    $where = "and t1.limite_credito BETWEEN ? and ? ";

    $parametros_sql = [];
    $param_type = "ii";
    $parametros_sql[] = $rango_min;
    $parametros_sql[] = $rango_max;

    if ($estado != "") {
        $parametros_sql[] = $estado;
        $param_type .= "i";
        $where .= "and t1.estado = ? ";
    }

    if ($estado_civil != "") {
        $parametros_sql[] = $estado_civil;
        $param_type .= "s";
        $where .= "and t1.estado_civil = ? ";
    }

    if ($nacionalidad != "") {
        $parametros_sql[] = $nacionalidad;
        $param_type .= "i";
        $where .= "and t1.nacionalidades_id = ? ";
    }

    if ($input != "") {
        $parametros_sql[] = "%" . $input . "%";
        $param_type .= "s";
        $where .= "and CONCAT_WS(' ', t1.nombres_cliente, t1.apellidos_clientes, t1.numero_documento, t3.numero) LIKE ?";
    }

    if ($garante == 0) {
        $where .= "and t1.limite_credito IS NOT NULL";
    } else if ($garante == 1) {
        // inner join a cliente_garante
    }


    $con = new DB();
    $usuarios = $con->select("SELECT t1.id_cliente,t1.nombres_cliente,t1.apellidos_clientes,t1.numero_documento, t1.estado_civil,t1.limite_credito,t3.numero,t2.descripcion_nacionalidad, t1.estado 
    FROM clientes t1 INNER JOIN nacionalidades t2 on t1.nacionalidades_id=t2.id_nacionalidad INNER JOIN clientes_telefonos t3 on t3.clientes_id=t1.id_cliente 
    WHERE t3.principal=1 $where", $param_type, $parametros_sql);
    echo json_encode(array('data' => $usuarios));
}
