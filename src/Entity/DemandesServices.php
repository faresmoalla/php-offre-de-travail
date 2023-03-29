<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DemandesServicesRepository;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: DemandesServicesRepository::class)]

class DemandesServices
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idDemande = null;
 
    #[ORM\Column(length:100)]
    private ?string $nomDemande = null;

    #[ORM\Column]
    private ?float $budget = null;

    #[ORM\Column(length:1000)]
    private ?string $descriptionDemande = null;

    #[ORM\Column]
    private ?Date $dateLimite = null;
 
    #[ORM\Column]
    private ?float $priorite = null;

    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'demandesServices')]
    private ?Utilisateurs $clientProprietaire = null;

    public function getIdDemande(): ?int
    {
        return $this->idDemande;
    }

    public function getNomDemande(): ?string
    {
        return $this->nomDemande;
    }

    public function setNomDemande(string $nomDemande): self
    {
        $this->nomDemande = $nomDemande;

        return $this;
    }

    public function getBudget(): ?float
    {
        return $this->budget;
    }

    public function setBudget(float $budget): self
    {
        $this->budget = $budget;

        return $this;
    }

    public function getDescriptionDemande(): ?string
    {
        return $this->descriptionDemande;
    }

    public function setDescriptionDemande(string $descriptionDemande): self
    {
        $this->descriptionDemande = $descriptionDemande;

        return $this;
    }

    public function getDateLimite(): ?\DateTimeInterface
    {
        return $this->dateLimite;
    }

    public function setDateLimite(\DateTimeInterface $dateLimite): self
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    public function getPriorite(): ?float
    {
        return $this->priorite;
    }

    public function setPriorite(float $priorite): self
    {
        $this->priorite = $priorite;

        return $this;
    }

    public function getClientProprietaire(): ?Utilisateurs
    {
        return $this->clientProprietaire;
    }

    public function setClientProprietaire(?Utilisateurs $clientProprietaire): self
    {
        $this->clientProprietaire = $clientProprietaire;

        return $this;
    }


}
