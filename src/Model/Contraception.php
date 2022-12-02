<?php
namespace App\Site\Model;

class Contraception implements IInsertable {
    private int $idContraception;
    private string $contraceptionName;
    private ?bool $sexe;

    public function __construct(int $idContraception, string $contraceptionName, ?bool $sexe)
    {
        $this->idContraception = $idContraception;
        $this->contraceptionName = $contraceptionName;
        $this->sexe = $sexe;
    }

    /**
     * @return int
     */
    public function getIdContraception(): int
    {
        return $this->idContraception;
    }

    /**
     * @param int $idContraception
     * @return Contraception
     */
    public function setIdContraception(int $idContraception): Contraception
    {
        $this->idContraception = $idContraception;
        return $this;
    }

    /**
     * @return string
     */
    public function getContraceptionName(): string
    {
        return $this->contraceptionName;
    }

    /**
     * @param string $contraceptionName
     * @return Contraception
     */
    public function setContraceptionName(string $contraceptionName): Contraception
    {
        $this->contraceptionName = $contraceptionName;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSexe(): ?bool
    {
        return $this->sexe;
    }

    /**
     * @param bool|null $sexe
     * @return Contraception
     */
    public function setSexe(?bool $sexe): Contraception
    {
        $this->sexe = $sexe;
        return $this;
    }


    public function formatTableau(): array
    {
        return ["idContraception" => $this->idContraception, "contraceptionName" => $this->contraceptionName, "sexe" => (($this->sexe) ? 1 : (is_null($this->sexe) ? null : 0))];
    }
}
