<?php

namespace App\Site\Model;

class Depistage implements IInsertable {
    private int $idDepistage;
    private string $nomDepistage;

    /**
     * @param int $idDepistage
     * @param string $nomDepistage
     */
    public function __construct(int $idDepistage, string $nomDepistage)
    {
        $this->idDepistage = $idDepistage;
        $this->nomDepistage = $nomDepistage;
    }

    /**
     * @return int
     */
    public function getIdDepistage(): int
    {
        return $this->idDepistage;
    }

    /**
     * @param int $idDepistage
     * @return Depistage
     */
    public function setIdDepistage(int $idDepistage): Depistage
    {
        $this->idDepistage = $idDepistage;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomDepistage(): string
    {
        return $this->nomDepistage;
    }

    /**
     * @param string $nomDepistage
     * @return Depistage
     */
    public function setNomDepistage(string $nomDepistage): Depistage
    {
        $this->nomDepistage = $nomDepistage;
        return $this;
    }



    public function formatTableau(): array {
        return [
            'idDepistage' => $this->idDepistage,
            'nomDepistage' => $this->nomDepistage
        ];
    }
}