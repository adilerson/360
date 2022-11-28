<?php

$base_dados  = 'u462112688_360';
$usuario_bd  = 'u462112688_360';
$senha_bd    = 'Tocomfome23!';
$host_db     = 'localhost';
$charset_db  = 'UTF8';
$conexao_pdo = null;

// Concatenação das variáveis para detalhes da classe PDO
$detalhes_pdo  = 'mysql:host=' . $host_db . ';';
$detalhes_pdo .= 'dbname='. $base_dados . ';';
$detalhes_pdo .= 'charset=' . $charset_db . ';';

// Tenta conectar
try {
    // Cria a conexão PDO com a base de dados
    $conexao_pdo = new PDO($detalhes_pdo, $usuario_bd, $senha_bd);
} catch (PDOException $e) {

    print "Erro: " . $e->getMessage() . "<br/>";

    die();
}

?>