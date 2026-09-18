<?php

require_once "database.php";

session_start();
try {
    $db = new PDO('mysql:host=localhost;dbname=votre_bdd; charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur: ' . $e->getMessage());
}

if ($_SERVER['RESQUET_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $pass = password_hash(trim($_POST['']), PASSWORD_DEFAULT);

    if (!empty($email) && !empty($password)) {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = $db->prepare(' INSERT INTO users (email, password) VALUES(?, ?)');
        try {
            $query->execute([$email, $hashPassword]);
            $_SESSION['user'] = $email; // Connecter directement l'utilisateur
            header('Location: dashboard.php'); // Redirection
            exit;
        } catch (PDOException $e) {
            echo "Erreur : Cet email est peut-être déjà utilisé.";
        }
    }
}

?>

<?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Votre email" required>
    <input type="password" name="password" placeholder="Votre mot de passe" required>
    <button type="submit">S'inscrire</button>
</form>