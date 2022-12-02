<?php
$utilisateur = \App\Site\Lib\UserConnexion::getInstance()->getConnectedUserChannel();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $pagetitle ?? 'Les Randoms'; ?></title>

    </head>
    <header> 
        <nav>
            <?php
                if ($utilisateur) {
                    echo '<p>Connecté en tant que ' . $utilisateur->getPseudoUtilisateur() . ' <a href="./logout.php">se déconnecter</a></p>';
                } else {
                    echo '<p><a href="./login.php">Se connecter</a></p>';
                }
            ?>
            <div>
                <a href = "./">Accueil</a>
            </div>
    
  
                <a href = ""> IST </a>
                    
            

            <div> 
                <a href = "./contraception.php">Contraception</a>
            </div>
        
            <div>
                <a href = "./depistage.php">Dépistage</a>
            </div>
            
            <div>
                <a href = "./forum.php">Forum</a>
            </div>

            <div>
                <a href = "./sites.php">Sites Utiles</a>
            </div> 

        </nav>


        <a href="https://www.umontpellier.fr/"><img id="Logo_Universite" src="Logo_universite1.png" alt="Logo université Montpellier non chargé"></a>
        <a href="https://www.nuitdelinfo.com/"><img id="NDI_logo" src="NDI_logo.jpg" alt="Logo nuit de l'informatique non chargé"></a>

    </header> 


    <body>
        <?php

        require $cheminVueBody;
        ?>
    </body>
</html>