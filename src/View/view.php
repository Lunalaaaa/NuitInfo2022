<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $pagetitle; ?></title>

    </head>
    <header> 
        <nav>
            <div>
                <a href = "./index.html">Accueil</a>
            </div>
    
  
                <a href = ""> IST </a>
                    
            

            <div> 
                <a href = "Contraception.html">Contraception</a> 
            </div>
        
            <div>
                <a href = "Dépistage.html">Dépistage</a>
            </div>
            
            <div>
                <a href = "FormulaireQuestion.html">Forum</a>
            </div>

            <div>
                <a href = "Sites_utiles.html">Sites Utiles</a>
            </div> 

        </nav>


        <a href="https://www.umontpellier.fr/"><img id="Logo_Universite" src="Logo_universite1.png" alt="Logo université Montpellier non chargé"></a>
        <a href="https://www.nuitdelinfo.com/"><img id="NDI_logo" src="NDI_logo.jpg" alt="Logo nuit de l'informatique non chargé"></a>

    </header> 


    <body>
        <?php

        require __DIR__ . "/{$cheminVueBody}";
        ?>
    </body>
</html>