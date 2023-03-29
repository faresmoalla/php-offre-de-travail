<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoriesProduitsRepository;

#[ORM\Entity(repositoryClass: CategoriesProduitsRepository::class)]
class CategoriesProduits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idCategorieProduit = null;

    #[ORM\Column(length:100)]
    private ?string $nomCategorieProduit = null;

    public function getIdCategorieProduit(): ?int
    {
        return $this->idCategorieProduit;
    }

    public function getNomCategorieProduit(): ?string
    {
        return $this->nomCategorieProduit;
    }

    public function setNomCategorieProduit(string $nomCategorieProduit): self
    {
        $this->nomCategorieProduit = $nomCategorieProduit;

        return $this;
    }


}
