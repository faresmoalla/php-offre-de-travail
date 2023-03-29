<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EvenementsRepository;

#[ORM\Entity(repositoryClass: EvenementsRepository::class)]
class Evenements
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idEvenement = null;

    #[ORM\Column(length: 100)]
    private ?string $nomEvenement = null;

    #[ORM\Column(length: 100)]
    private ?string $logoEvenement = null;

    #[ORM\Column(length: 1000)]
    private ?string $descEvenement = null;

    #[ORM\Column(length: 100)]
    private ?string $emplacementEvenement = null;

    #[ORM\Column(length: 100)]
    private ?string $dateEvenement = null;

    #[ORM\Column]
    private ?int $nbrPersoEvenement = null;

    #[ORM\Column]
    private ?int $typeEvenement = null;


    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'Evenements')]
    private ?Utilisateurs $idRepresentant = null;

    public function getIdEvenement(): ?int
    {
        return $this->idEvenement;
    }

    public function getNomEvenement(): ?string
    {
        return $this->nomEvenement;
    }

    public function setNomEvenement(string $nomEvenement): self
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    public function getLogoEvenement(): ?string
    {
        return $this->logoEvenement;
    }

    public function setLogoEvenement(string $logoEvenement): self
    {
        $this->logoEvenement = $logoEvenement;

        return $this;
    }

    public function getDescEvenement(): ?string
    {
        return $this->descEvenement;
    }

    public function setDescEvenement(string $descEvenement): self
    {
        $this->descEvenement = $descEvenement;

        return $this;
    }

    public function getEmplacementEvenement(): ?string
    {
        return $this->emplacementEvenement;
    }

    public function setEmplacementEvenement(string $emplacementEvenement): self
    {
        $this->emplacementEvenement = $emplacementEvenement;

        return $this;
    }

    public function getDateEvenement(): ?string
    {
        return $this->dateEvenement;
    }

    public function setDateEvenement(string $dateEvenement): self
    {
        $this->dateEvenement = $dateEvenement;

        return $this;
    }

    public function getNbrPersoEvenement(): ?int
    {
        return $this->nbrPersoEvenement;
    }

    public function setNbrPersoEvenement(int $nbrPersoEvenement): self
    {
        $this->nbrPersoEvenement = $nbrPersoEvenement;

        return $this;
    }

    public function getTypeEvenement(): ?int
    {
        return $this->typeEvenement;
    }

    public function setTypeEvenement(int $typeEvenement): self
    {
        $this->typeEvenement = $typeEvenement;

        return $this;
    }

    public function getIdRepresentant(): ?Utilisateurs
    {
        return $this->idRepresentant;
    }

    public function setIdRepresentant(?Utilisateurs $idRepresentant): self
    {
        $this->idRepresentant = $idRepresentant;

        return $this;
    }
}
