<?php
// Inclure le fichier de configuration
require_once 'config.php';
 
// Définir des variables et initialiser avec des valeurs vides
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Traitement des données de formulaire lorsque le formulaire est soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Valider le nom d'utilisateur
    if(empty(trim($_POST["username"]))){
        $username_err = "Veuillez entrer un nom d'utilisateur.";
    } else{
        // Prépare une instruction select
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Lier les variables à l'instruction préparée en tant que paramètres
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Définir les paramètres
            $param_username = trim($_POST["username"]);
            
            // Tentative d'exécution de l'instruction préparée
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Ce nom d'utilisateur est déjà pris.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oups! Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
            }
        }
         
        // Déclaration Close
        unset($stmt);
    }
    
    // Valider le mot de pass
    if(empty(trim($_POST['password']))){
        $password_err = "Veuillez entrer un mot de passe.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Le mot de passe doit avoir au moins 6 caractères.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Valider le mot de passe de confirmation
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Veuillez confirmer le mot de passe.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Le mot de passe ne correspond pas.';
        }
    }
    
    // Vérifie les erreurs de saisie avant de les insérer dans la base de données
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prépare une instruction d'insertion
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
         
        if($stmt = $pdo->prepare($sql)){
            // Lier les variables à l'instruction préparée en tant que paramètres
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            
            // Définir les paramètres
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Crée un hash de mot de passe
            
            // Tentative d'exécution de l'instruction préparée
            if($stmt->execute()){
                // Rediriger vers la page de connexion
                header("location: login.php");
            } else{
                echo "Quelque chose s'est mal passé. Veuillez réessayer plus tard.";
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
    <title>Inscrivez-vous</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Inscrivez-vous</h2>
        <p>Veuillez remplir ce formulaire pour créer un compte.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Nom d'utilisateur</label>
                <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmer le mot de passe</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Envoyer">
                <input type="reset" class="btn btn-default" value="Réinitialiser">
            </div>
            <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous ici</a>.</p>
        </form>
    </div> 
  
</body>
</html>