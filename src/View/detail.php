<?php

    if ($post->getReponseA()) {
        echo "<p><a href='./forum.php?post={$post->getIdReponseA()}'>{$post->getPseudoReponseA()}: {$post->getReponseA()}</a></p>";
    }
    echo "<h1>{$post->getPseudoUtilisateur()}</h1><h2>{$post->getTitre()} - {$post->getNomMaladie()}</h2><p>{$post->getDescription()}</p>";

    if (\App\Site\Lib\UserConnexion::getInstance()->isConnected()) {
        echo "<form method='post' action='./post.php'>
    <fieldset>
        <legend>Repondre</legend>
        <p>
            <label for='reponse'>Réponse</label> :
            <input type='text' placeholder='Votre réponse' name='reponse' id='reponse' required/>
        </p>
        <p>
            <label for='description'>Description</label> :
            <input type='text' placeholder='Expliquer votre situation' name='description' id='description'/>
        </p>
        <p>
            <input type='submit' value='Envoyer'/>
            <input type='hidden' value='{$post->getIdQuestion()}' name='question'>
        </p>
    </fieldset>
</form>";
    }
    echo '<ul>';
foreach (\App\Site\Controller\ForumManager::getReponses($post->getIdQuestion()) as $reponse) {
    echo "<li><a href='./forum.php?post={$reponse->getIdQuestion()}'>{$reponse->getPseudoUtilisateur()}: {$reponse->getTitre()}</a></li>";
}
echo '</ul>';