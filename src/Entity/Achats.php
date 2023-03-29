<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AchatsRepository;

#[ORM\Entity(repositoryClass: AchatsRepository::class)]
class Achats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idAchat = null;

    #[ORM\ManyToOne(targetEntity: "Paniers", inversedBy: 'achats')]
    private ?Paniers $idPanier = null;

    #[ORM\ManyToOne(targetEntity: "Produits", inversedBy: 'achats')]
    private ?Produits $idProduit = null;

    public function getIdAchat(): ?int
    {
        return $this->idAchat;
    }

    public function getIdPanier(): ?Paniers
    {
        return $this->idPanier;
    }

    public function setIdPanier(?Paniers $idPanier): self
    {
        $this->idPanier = $idPanier;

        return $this;
    }

    public function getIdProduit(): ?Produits
    {
        return $this->idProduit;
    }

    public function setIdProduit(?Produits $idProduit): self
    {
        $this->idProduit = $idProduit;

        return $this;
    }


}
