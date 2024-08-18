<?php

include('db.php'); // Veritabanı bağlantısı

// Kullanıcıyı veritabanına ekler
function getUser($adSoyad, $email, $tel, $yas)
{
    global $db; // Veritabanı bağlantısını kullan

    // Kullanıcı bilgilerini ekle
    $stmt = $db->prepare("INSERT INTO kullanicilar (ad, email, telefon, yas) VALUES (?, ?, ?, ?)");
    $success = $stmt->execute([$adSoyad, $email, $tel, $yas]);

    // Başarı durumunu döndür
    return $success;
}

// Kullanıcıları listeler
function listUsers()
{
    global $db; // Veritabanı bağlantısını kullan
    if ($db === null) {
        throw new Exception("Veritabanı bağlantısı sağlanamadı.");
    }
    $query = "SELECT * FROM kullanicilar";
    $stmt = $db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
