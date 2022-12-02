<?php

use App\Model\IInsertable;

class Maladie implements IInsertable {
    private int $idMaladie;
    private string $nomMaladie;
    private string $description;

    /**
     * @param int $idMaladie
     * @param string $nomMaladie
     * @param string|null $description
     */
    public function __construct(int $idMaladie, string $nomMaladie, string $description)
    {
        $this->idMaladie = $idMaladie;
        $this->nomMaladie = $nomMaladie;
        $this->description = $description;
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
     * @return Maladie
     */
    public function setIdMaladie(int $idMaladie): Maladie
    {
        $this->idMaladie = $idMaladie;
        return $this;
    }

    /**
     * @return string
     */
    public function getNomMaladie(): string
    {
        return $this->nomMaladie;
    }

    /**
     * @param string $nomMaladie
     * @return Maladie
     */
    public function setNomMaladie(string $nomMaladie): Maladie
    {
        $this->nomMaladie = $nomMaladie;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getdescription(): string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Maladie
     */
    public function setdescription(string $description): Maladie
    {
        $this->description = $description;
        return $this;
    }

    public function formatTableau(): array
    {
        return [
            'idMaladie' => $this->idMaladie,
            'nomMaladie' => $this->nomMaladie,
            'description' => $this
        ];
    }
}