<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=panel", "root", "");  
    $db->query("SET CHARSET UTF8");  
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

?>
