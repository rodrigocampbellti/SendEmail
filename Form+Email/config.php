<?php


header('Content-Type: text/html; charset=utf-8');


date_default_timezone_set('America/Sao_Paulo');





// Lê arquivo "ini" e converte em um array:
$db = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/config.ini', true);

// Itera elementos de $db:
// Referências: https://www.php.net/manual/pt_BR/control-structures.foreach.php
foreach ($db as $server => $values) :

    // Se estamos no servidor correto:
    if ($server == $_SERVER['SERVER_NAME']) :

        // Conecta no banco de dados com as credenciais deste servidor:
        $conn = new mysqli($values['hostname'], $values['username'], $values['password'], $values['database']);

        // Trata possíveis exceções:
        if ($conn->connect_error) die("Falha de conexão com o banco e dados: " . $conn->connect_error);

    endif;
endforeach;

// Seta transações com MySQL/MariaDB para UTF-8:
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// Seta dias da semana e meses do MySQL/MariaDB para "português do Brasil":
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');


