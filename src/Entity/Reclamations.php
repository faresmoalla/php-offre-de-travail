<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReclamationsRepository;

#[ORM\Entity(repositoryClass: ReclamationsRepository::class)]

class Reclamations
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idReclamation = null;

    #[ORM\Column(length:1000)]
    private ?string $objectReclamation = null;

    #[ORM\Column(length:1000)]
    private ?string $descriptionReclamation = null;

    #[ORM\Column(length:50)]
    private ?string $categorieReclamation = null;

    #[ORM\Column]
    private ?int $etatReclamation = null;

    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'Reclamations')]
    private ?Utilisateurs $idUtilisateur = null;

    public function getIdReclamation(): ?int
    {
        return $this->idReclamation;
    }

    public function getObjectReclamation(): ?string
    {
        return $this->objectReclamation;
    }

    public function setObjectReclamation(string $objectReclamation): self
    {
        $this->objectReclamation = $objectReclamation;

        return $this;
    }

    public function getDescriptionReclamation(): ?string
    {
        return $this->descriptionReclamation;
    }

    public function setDescriptionReclamation(string $descriptionReclamation): self
    {
        $this->descriptionReclamation = $descriptionReclamation;

        return $this;
    }

    public function getCategorieReclamation(): ?string
    {
        return $this->categorieReclamation;
    }

    public function setCategorieReclamation(string $categorieReclamation): self
    {
        $this->categorieReclamation = $categorieReclamation;

        return $this;
    }

    public function getEtatReclamation(): ?int
    {
        return $this->etatReclamation;
    }

    public function setEtatReclamation(int $etatReclamation): self
    {
        $this->etatReclamation = $etatReclamation;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateurs
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateurs $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }


}
