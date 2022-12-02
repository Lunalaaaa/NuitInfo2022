<?php

namespace App\Site\Repository;

use App\Site\Model\Utilisateur;

class UtilisateurRepository extends AbstractEditableRepository
{

    protected static function getNomTable(): string
    {
        return 'UTILISATEURS';
    }

    protected static function builder(array $objetFormatTableau): Utilisateur
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

    protected static function getNomClePrimaire(): string
    {
        return 'idUtilisateur';
    }

    protected static function getNomsColonnes(): array
    {
        return ['idUtilisateur', 'pseudoUtilisateur', 'mail', 'mdp', 'discord', 'discordVerification', 'dateCreation'];
    }
}