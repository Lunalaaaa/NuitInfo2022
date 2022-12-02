<?
if (\App\Site\Lib\UserConnexion::getInstance()->isConnected()) {
    ?>
    <form method="post" action="./post.php">

    <fieldset>
        <legend>Poster une Question</legend>
        <p>
            <label for="titre">Titre</label>
            <input type="text" placeholder="Titre" name="titre" id="titre" required/>
        </p>
        <p>
            <label for="description">Description</label>
            <input type="text" placeholder="Expliquer votre situation" name="description" id="description"/>
        </p>
        <p>
            <label for="maladie">Maladie</label>
            <select id="maladie", name="maladie">
                <?php
                foreach (\App\Site\Controller\ForumManager::getMaladies() as $maladie) {
                    echo "<option value=\"{$maladie->getIdMaladie()}\">{$maladie->getNomMaladie()}</option>";
                }
                ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
<?php
}
echo '<ul>';
foreach ($tab as $question) {
    echo "<li><a href='./forum.php?post={$question->getIdQuestion()}'>{$question->getPseudoUtilisateur()}: {$question->getTitre()}</a></li>";
}
echo '</ul>';
