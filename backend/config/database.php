
<?php 
$host = 'localhost';
$dbname = 'virtual_docs';
$username = 'root';
$password = '';

//tester la connexion
try{
    $pdo= new PDO("mysql:host=localhost;dbname=virtual_docs","root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
} catch(PDOException $e) {
    die("Erreur de connexion " . $e->getMessage());
}

?> 