<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PaniersRepository;

#[ORM\Entity(repositoryClass: PaniersRepository::class)]

class Paniers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idPanier = null;

    #[ORM\ManyToOne(targetEntity: "Utilisateurs", inversedBy: 'Paniers')]
    private ?Utilisateurs $idClient = null;

    public function getIdPanier(): ?int
    {
        return $this->idPanier;
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


}
