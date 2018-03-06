<?php
// Inclure le fichier de configuration
require_once 'config.php';
 
// Définir des variables et initialiser avec des valeurs vides
$username = $password = "";
$username_err = $password_err = "";
 
// Traitement des données de formulaire lorsque le formulaire est soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Vérifie si le nom d'utilisateur est vide
    if(empty(trim($_POST["username"]))){
        $username_err = 'Veuillez entrer votre nom d \'utilisateur.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Vérifie si le mot de passe est vide
    if(empty(trim($_POST['password']))){
        $password_err = 'Veuillez entrer votre mot de passe.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Valider les informations d'identification
    if(empty($username_err) && empty($password_err)){
        // Prépare une instruction select
        $sql = "SELECT username, password FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Lier les variables à l'instruction préparée en tant que paramètres
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Définir les paramètres
            $param_username = trim($_POST["username"]);
            
            // Tentative d'exécution de l'instruction préparée
            if($stmt->execute()){
                // Vérifie si le nom d'utilisateur existe, si oui, puis vérifie le mot de passe
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $hashed_password = $row['password'];
                        if(password_verify($password, $hashed_password)){
                            /* Le mot de passe est correct, alors démarrez une nouvelle session et
                            enregistrer le nom d'utilisateur à la session */
                            session_start();
                            $_SESSION['username'] = $username;      
                            header("location: admin_dashboard.php");
                        } else{
                            // Affiche un message d'erreur si le mot de passe n'est pas valide
                            $password_err = 'Le mot de passe que vous avez entré n\'était pas valide.';
                        }
                    }
                } else{
                    // Afficher un message d'erreur si le nom d'utilisateur n'existe pas
                    $username_err = 'Aucun compte trouvé avec ce nom d\'utilisateur.';
                }
            } else{
                echo "Oups! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }
        }
        
        // Déclaration Close
        unset($stmt);
    }
    
    // Fermer la connexion
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Connexion</h2>
        <p>Veuillez remplir vos informations d'identification pour vous connecter.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
            <p>Vous n'avez pas de compte? <a href="register.php">Inscrivez-vous maintenant</a>.</p>
        </form>
    </div>
</body>
</html>