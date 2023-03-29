<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommandesRepository;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCommande = null;

    
    #[ORM\Column]
    private ?Date $dateCommande = null;

    
    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'commandes')]
    private ?Utilisateurs $idClient = null; 

    
    #[ORM\ManyToOne(targetEntity: "OffresServices", inversedBy: 'commandes')]
    private ?Utilisateurs $idService = null;

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getIdClient(): ?Utilisateurs
    {
        return $this->idClient;
    }

    public function setIdClient(?Utilisateurs $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdService(): ?OffresServices
    {
        return $this->idService;
    }

    public function setIdService(?OffresServices $idService): self
    {
        $this->idService = $idService;

        return $this;
    }


}
