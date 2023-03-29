<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AvisRepository;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{ 
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idAvis = null;


    #[ORM\Column]
    private ?int $nbEtoiles = null;

    
    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'avis')]
    private ?Utilisateurs $client = null; 

   
    #[ORM\ManyToOne(targetEntity: "OffresServices", inversedBy: 'avis')]
    private ?OffresServices $idService = null;

    public function getIdAvis(): ?int
    {
        return $this->idAvis;
    }

    public function getNbEtoiles(): ?int
    {
        return $this->nbEtoiles;
    }

    public function setNbEtoiles(int $nbEtoiles): self
    {
        $this->nbEtoiles = $nbEtoiles;

        return $this;
    }

    public function getClient(): ?Utilisateurs
    {
        return $this->client;
    }

    public function setClient(?Utilisateurs $client): self
    {
        $this->client = $client;

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
