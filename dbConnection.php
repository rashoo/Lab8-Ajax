<?php
    function connectToDB($dbname) {
        $host = "localhost";
        $username = "resteybar";
        $password = "Kingdomhearts2?";
        $dbname = $dbname;
        $charset = 'utf8mb4';
        /*
        function connectToDB($dbname) {
        $host = "localhost";
        $username = "kuma5922";
        $password = "cst336";
        $dbname = $dbname;
        $charset = 'utf8mb4';
        */
 
        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $username, $password, $opt);
        return $pdo; 
    }
?>