<?php

namespace App\Site\Model;

class Question implements IInsertable {
    private ?int $idQuestion;
    private string $titre;
    private string $description;
    private int $idUtilisateur;
    private int $idMaladie;
    private ?int $idReponseA;
    private ?string $datePoste;
    private ?string $PseudoUtilisateur;
    private ?string $nomMaladie;
    private ?string $reponseA;
    private ?string $pseudoReponseA;

    /**
     * @param ?int $idQuestion
     * @param string $titre
     * @param string $description
     * @param int $idUtilisateur
     * @param int $idMaladie
     * @param int $idReponseA
     * @param string $datePoste
     */
    public function __construct(?int $idQuestion, string $titre, string $description, int $idUtilisateur, int $idMaladie, ?int $idReponseA = null, ?string $datePoste = null, ?string $pseudoUtilisateur = null, ?string $nomMaladie = null, ?string $reponseA = null, ?string $pseudoReponseA = null)
    {
        $this->idQuestion = $idQuestion;
        $this->titre = $titre;
        $this->description = $description;
        $this->idUtilisateur = $idUtilisateur;
        $this->idMaladie = $idMaladie;
        $this->idReponseA = $idReponseA;
        $this->datePoste = $datePoste;
        $this->PseudoUtilisateur = $pseudoUtilisateur;
        $this->nomMaladie = $nomMaladie;
        $this->reponseA = $reponseA;
        $this->pseudoReponseA = $pseudoReponseA;
    }

    /**
     * @return int
     */
    public function getIdQuestion(): int
    {
        return $this->idQuestion;
    }

    /**
     * @param int $idQuestion
     * @return Question
     */
    public function setIdQuestion(int $idQuestion): Question
    {
        $this->idQuestion = $idQuestion;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     * @return Question
     */
    public function setTitre(string $titre): Question
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Question
     */
    public function setDescription(string $description): Question
    {
        $this->description = $description;
        return $this;
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
     * @return Question
     */
    public function setIdUtilisateur(int $idUtilisateur): Question
    {
        $this->idUtilisateur = $idUtilisateur;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdMaladie(): int
    {
        return $this->idMaladie;
    }

    /**
     * @param int $idMaladie
     * @return Question
     */
    public function setIdMaladie(int $idMaladie): Question
    {
        $this->idMaladie = $idMaladie;
        return $this;
    }

    /**
     * @return int
     */
    public function getIdReponseA(): int
    {
        return $this->idReponseA;
    }

    /**
     * @param int $idReponseA
     * @return Question
     */
    public function setIdReponseA(int $idReponseA): Question
    {
        $this->idReponseA = $idReponseA;
        return $this;
    }

    /**
     * @return string
     */
    public function getDatePoste(): string
    {
        return $this->datePoste;
    }

    /**
     * @return string|null
     */
    public function getPseudoUtilisateur(): ?string
    {
        return $this->PseudoUtilisateur;
    }

    /**
     * @param string|null $PseudoUtilisateur
     * @return Question
     */
    public function setPseudoUtilisateur(?string $PseudoUtilisateur): Question
    {
        $this->PseudoUtilisateur = $PseudoUtilisateur;
        return $this;
    }

    /**
     * @param string $datePoste
     * @return Question
     */
    public function setDatePoste(string $datePoste): Question
    {
        $this->datePoste = $datePoste;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomMaladie(): ?string
    {
        return $this->nomMaladie;
    }

    /**
     * @param string|null $nomMaladie
     * @return Question
     */
    public function setNomMaladie(?string $nomMaladie): Question
    {
        $this->nomMaladie = $nomMaladie;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getReponseA(): ?string
    {
        return $this->reponseA;
    }

    /**
     * @param string|null $reponseA
     * @return Question
     */
    public function setReponseA(?string $reponseA): Question
    {
        $this->reponseA = $reponseA;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPseudoReponseA(): ?string
    {
        return $this->pseudoReponseA;
    }

    /**
     * @param string|null $pseudoReponseA
     * @return Question
     */
    public function setPseudoReponseA(?string $pseudoReponseA): Question
    {
        $this->pseudoReponseA = $pseudoReponseA;
        return $this;
    }




    public function formatTableau(): array
    {
        return [
            'titre' => $this->titre,
            'description' => $this->description,
            'idUtilisateur' => $this->idUtilisateur,
            'idMaladie' => $this->idMaladie,
            'idReponseA' => $this->idReponseA
        ];
    }
}