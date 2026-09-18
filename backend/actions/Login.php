<?php
session_start();
require_once "database.php";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!empty($email) && !empty($password)) {
        $query = $db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['email'];
            header('Location: dashboard.php');
            exit;
        } else {
            $erreur = "Email ou mot de passe incorrect.";
        }
    }
}
?>
<?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Votre email" required>
    <input type="password" name="password" placeholder="Votre mot de passe" required>
    <button type="submit" name="login">Sign in</button>
</form>