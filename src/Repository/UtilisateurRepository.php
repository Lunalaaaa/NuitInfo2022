<?php

use App\Repository\AbstractGetableRepository;

class UtilisateurRepository extends AbstractEditableRepository
{

    protected function getNomTable(): string
    {
        return 'UTILISATEURS';
    }

    protected function builder(array $objetFormatTableau): Utilisateur
    {
        return new Utilisateur(
            $objetFormatTableau['idUtilisateur'],
            $objetFormatTableau['pseudoUtilisateur'],
            $objetFormatTableau['mail'],
            $objetFormatTableau['mdp'],
            $objetFormatTableau['discord'],
            $objetFormatTableau['discordVerification'],
            $objetFormatTableau['dateCreation']
        );
    }

    protected function getNomClePrimaire(): string
    {
        return 'idUtilisateur';
    }

    protected function getNomsColonnes(): array
    {
        return ['idUtilisateur', 'pseudoUtilisateur', 'mail', 'mdp', 'discord', 'discordVerification', 'dateCreation'];
    }
}