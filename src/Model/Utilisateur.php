<?php
namespace App\Site\Model;
class Utilisateur implements IInsertable{
    private int $idUtilisateur;
    private string $pseudoUtilisateur;
    private string $mail;
    private string $mdp;
    private ?string $discord;
    private ?string $discordVerif;
    private ?string $dateCreation;

    /**
     * @param int $idUtilisateur
     * @param string $pseudoUtilisateur
     * @param string $mail
     * @param string $mdp
     * @param string|null $discord
     * @param string|null $discordVerif
     * @param string|null $dateCreation
     */
    public function __construct(int $idUtilisateur, string $pseudoUtilisateur, string $mail, string $mdp, ?string $discord, ?string $discordVerif, ?string $dateCreation = null)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->pseudoUtilisateur = $pseudoUtilisateur;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->discord = $discord;
        $this->discordVerif = $discordVerif;
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return int
     */
    public function getIdUtilisateur(): int
    {
        return $this->idUtilisateur;
    }

    /**
     * @param int $idUtilisateur
     * @return Utilisateur
     */
    public function setIdUtilisateur(int $idUtilisateur): Utilisateur
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudoUtilisateur(): string
    {
        return $this->pseudoUtilisateur;
    }

    /**
     * @param string $pseudoUtilisateur
     * @return Utilisateur
     */
    public function setPseudoUtilisateur(string $pseudoUtilisateur): Utilisateur
    {
        $this->pseudoUtilisateur = $pseudoUtilisateur;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Utilisateur
     */
    public function setMail(string $mail): Utilisateur
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     * @return Utilisateur
     */
    public function setMdp(string $mdp): Utilisateur
    {
        $this->mdp = $mdp;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscord(): ?string
    {
        return $this->discord;
    }

    /**
     * @param string|null $discord
     * @return Utilisateur
     */
    public function setDiscord(?string $discord): Utilisateur
    {
        $this->discord = $discord;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscordVerif(): ?string
    {
        return $this->discordVerif;
    }

    /**
     * @param string|null $discordVerif
     * @return Utilisateur
     */
    public function setDiscordVerif(?string $discordVerif): Utilisateur
    {
        $this->discordVerif = $discordVerif;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDateCreation(): ?string
    {
        return $this->dateCreation;
    }

    /**
     * @param string|null $dateCreation
     * @return Utilisateur
     */
    public function setDateCreation(?string $dateCreation): Utilisateur
    {
        $this->dateCreation = $dateCreation;
        return $this;
    }


    public function formatTableau(): array
    {
        return [
            'idUtilisateur' => $this->idUtilisateur,
            'pseudoUtilisateur' => $this->pseudoUtilisateur,
            'mail' => $this->mail,
            'mdp' => $this->mdp,
            'discord' => $this->discord,
            'discordVerif' => $this->discordVerif
        ];
    }
}