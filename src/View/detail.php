<?php

use App\Site\Repository\UtilisateurRepository;

    echo "<p>Question : ". $question.getIdQuestion() ."</p>";
    echo "<p>Titre : ". $question.getTitre(). "</p>";
    echo "<p>Description : " . $question.getDescription() . "</p>";
    echo "<p>Question de " . UtilisateurRepository::select($question.getIdUtilisateur()) . "</p>";
    echo "<p>Maladie concernée : " . $question.getNomMaladie() . "</p>";
    echo "<p>Réponse : " . $question.getIdReponseA().getDescription() ."</p>";
    echo "<p>Pseudo Utilisateur : " . $question.getPseudoUtilisateur() . "</p>";
    echo "<p>Pseudo Utilisateur Reponse" . $question.getPseudoReponseA() . "</p>";