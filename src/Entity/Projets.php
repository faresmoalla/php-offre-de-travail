<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProjetsRepository;

#[ORM\Entity(repositoryClass: ProjetsRepository::class)]

class Projets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idProjet = null;

    #[ORM\Column(length: 100)]
    private ?string $nomProjet = null;

    #[ORM\Column]
    private ?int $prioriteProjet = null;

    #[ORM\Column(length: 100)]
    private ?string $datepProjet = null;

    #[ORM\Column(length: 100)]
    private ?string $datelProjet =  null;

    #[ORM\Column(length: 100)]
    private ?string $descriptionProjet = null;

    #[ORM\Column]
    private ?float $progressionP =  null;

    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'Projets')]
    private ?Utilisateurs $idFreelancer =  null;

    public function getIdProjet(): ?int
    {
        return $this->idProjet;
    }

    public function getNomProjet(): ?string
    {
        return $this->nomProjet;
    }

    public function setNomProjet(string $nomProjet): self
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    public function getPrioriteProjet(): ?int
    {
        return $this->prioriteProjet;
    }

    public function setPrioriteProjet(int $prioriteProjet): self
    {
        $this->prioriteProjet = $prioriteProjet;

        return $this;
    }

    public function getDatepProjet(): ?string
    {
        return $this->datepProjet;
    }

    public function setDatepProjet(string $datepProjet): self
    {
        $this->datepProjet = $datepProjet;

        return $this;
    }

    public function getDatelProjet(): ?string
    {
        return $this->datelProjet;
    }

    public function setDatelProjet(string $datelProjet): self
    {
        $this->datelProjet = $datelProjet;

        return $this;
    }

    public function getDescriptionProjet(): ?string
    {
        return $this->descriptionProjet;
    }

    public function setDescriptionProjet(string $descriptionProjet): self
    {
        $this->descriptionProjet = $descriptionProjet;

        return $this;
    }

    public function getProgressionP(): ?float
    {
        return $this->progressionP;
    }

    public function setProgressionP(float $progressionP): self
    {
        $this->progressionP = $progressionP;

        return $this;
    }

    public function getIdFreelancer(): ?Utilisateurs
    {
        return $this->idFreelancer;
    }

    public function setIdFreelancer(?Utilisateurs $idFreelancer): self
    {
        $this->idFreelancer = $idFreelancer;

        return $this;
    }


}
