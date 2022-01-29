<?php

// Configuration PHP en fonction de l'environnement
include_once 'config.php';

?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Stream : inscription</title>
    <!-- Bootstrap 5.1.x -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Styles CSS custom -->
    <link rel="stylesheet" href="css/register.css">
</head>
<body class="container vh-100">

<!-- Formulaire d'inscription -->
<div class="card mx-auto mt-5 w-75">
    <div class="card-header bg-transparent p-3">Formulaire d'inscription</div>
    <div class="card-body">
        <form action="register_check.php" method="post" class="form-floating">

            <div class="row g-2">
                <div class="col form-floating mb-3">
                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Potter" pattern="[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,32}" required>
                    <label for="last_name">Nom</label>
                    <div class="invalid-feedback">Veuillez renseigner un nom valide</div>
                </div>

                <div class="col form-floating mb-3">
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Harry" pattern="[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,32}" required>
                    <label for="first_name">Prénom</label>
                    <div class="invalid-feedback">Veuillez renseigner un prénom valide</div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="email" name="login" id="login" class="form-control" placeholder="example@example.com" required>
                <label for="login">Email</label>
                <div class="invalid-feedback">Email incorrect</div>
            </div>

            <div class="form-floating mb-3">
                <select name ="address" id="address" class="form-select" aria-label="3 Avenue Chemin de Travers"  required>
                    <option value="" selected disabled> -- </option>
                    <?php

                        try{

                            // Connexion BDD
                            $dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME.'; charset=utf8',
                            USER,
                            PASS,
                            OPTIONS);

                            // Requête SQL à effectuer
                            $sql = "SELECT address_id, CONCAT(address, ', ',city, ' (',country, ') ') AS address
                                    FROM address
                                        INNER JOIN city ON city.city_id = address.city_id
                                        INNER JOIN country ON country.country_id = city.country_id;
                                    ";

                            $options = $dbh -> prepare($sql);   // Préparation de la requête 
                            $options -> execute();  // Exécution de la requête préparée
                            
                            $html = '';
                            foreach($options -> fetchAll(PDO::FETCH_ASSOC) AS $row){   
                                // Conversion des résultats en code HTML 
                                $html .= '<option value="'.$row['address_id'].'">'.$row['address'].'</option>'; 
                            }
                            echo $html; // Affichage des résultats

                        }catch(PDOException $e){
                            echo '<option value="">Probleme</option>';
                        }

                    ?>
                </select>
                <label for="address">Selectionnez une adresse</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}" title="Entre 8 et 20 caractères, contenant au moins un nombre" required>
                <label for="password">Mot de passe</label>
                <div class="invalid-feedback">
                    Votre mot de passe doit être compris entre 8 et 20 caractères, ne pas contenir d'espaces ou d'emoji et contenir au moins un nombre.
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="password" id="password_check" class="form-control" placeholder="Password_check" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}" title="Entre 8 et 20 caractères, contenant au moins un nombre" required>
                <label for="password_check">Confirmez le mot de passe</label>
                <div class="invalid-feedbasck">Les mots de passe ne correspondent pas</div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" value="" id="cguCheck" class="form-check-input" required>
                    <label class="form-check-label" for="cguCheck">
                        J'accepte les termes et conditions d'utilisation
                    </label>
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" id="submitBtn" class="btn btn-outline-primary" >Envoyer</button>
            </div>
        </form>
    
    </div>
    <div class="card-footer text-muted p-3">
        Vous avez déjà un compte ? <a href="login.php">Se connecter</a>
    </div>
</div>


<!-- Script Jquery pour Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<!-- Script Bootstrap 5.1.x -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- Script custom -->
<script src="js/register.js"></script>

</body>
</html>