<?php
// Configuration de la base de données
$host = 'localhost';
$dbname = 'gemini_cafe';
$username = 'root'; // Par défaut sur XAMPP/WAMP
$password = '';     // Par défaut vide sur XAMPP/WAMP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>