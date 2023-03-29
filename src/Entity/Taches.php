<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Repository\TachesRepository;
#[ORM\Entity(repositoryClass: TachesRepository::class)]
class Taches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idTache = null;

   #[ORM\Column(length: 100)]
    private ?string $nomTache = null;

    #[ORM\Column]
    private ?int $prioriteTache = null;

    #[ORM\Column(length: 100)]
    private ?string $datepTache = null;

   #[ORM\Column(length: 100)]
    private ?string $datelTache = null;

    #[ORM\Column(length: 100)]
    private ?string $descriptionTache = null;

    #[ORM\Column]
    private ?int $typeTache = null;

    #[ORM\ManyToOne(targetEntity: "Projets", inversedBy: 'Taches')]
    private ?Projets $idProjet = null;

    public function getIdTache(): ?int
    {
        return $this->idTache;
    }

    public function getNomTache(): ?string
    {
        return $this->nomTache;
    }

    public function setNomTache(string $nomTache): self
    {
        $this->nomTache = $nomTache;

        return $this;
    }

    public function getPrioriteTache(): ?int
    {
        return $this->prioriteTache;
    }

    public function setPrioriteTache(int $prioriteTache): self
    {
        $this->prioriteTache = $prioriteTache;

        return $this;
    }

    public function getDatepTache(): ?string
    {
        return $this->datepTache;
    }

    public function setDatepTache(string $datepTache): self
    {
        $this->datepTache = $datepTache;

        return $this;
    }

    public function getDatelTache(): ?string
    {
        return $this->datelTache;
    }

    public function setDatelTache(string $datelTache): self
    {
        $this->datelTache = $datelTache;

        return $this;
    }

    public function getDescriptionTache(): ?string
    {
        return $this->descriptionTache;
    }

    public function setDescriptionTache(string $descriptionTache): self
    {
        $this->descriptionTache = $descriptionTache;

        return $this;
    }

    public function getTypeTache(): ?int
    {
        return $this->typeTache;
    }

    public function setTypeTache(int $typeTache): self
    {
        $this->typeTache = $typeTache;

        return $this;
    }

    public function getIdProjet(): ?Projets
    {
        return $this->idProjet;
    }

    public function setIdProjet(?Projets $idProjet): self
    {
        $this->idProjet = $idProjet;

        return $this;
    }


}
